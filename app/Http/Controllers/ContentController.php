<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\ContentImage;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    protected $contentModel;

    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware("is_admin");
        // Asegurar que $this->contentModel se inicialice correctamente.
        // Intentamos primero el modelo namespaced de Laravel, luego el modelo legacy sin namespace
        if (!$this->contentModel) {
            // Si existe un modelo PSR-4 con namespace App\Models\Content
            if (class_exists(\App\Models\Content::class)) {
                $this->contentModel = new \App\Models\Content();
            } else {
                // Intentar cargar el archivo legacy directamente si existe
                $legacyPath = app_path("Models/Content.php");
                if (file_exists($legacyPath)) {
                    // Requerir el archivo para que la clase global Content esté disponible
                    require_once $legacyPath;
                    if (class_exists("Content")) {
                        $this->contentModel = new \Content();
                    }
                }
            }
        }
    }

    public function index(Request $request)
    {
        try {
            $category = $request->route()->defaults["category"] ?? null;

            if ($category === "transparency" || $category === "tramites") {
                // Para transparencia y trámites, mostrar jerarquía con paginación
                $page = (int) $request->query("page", 1);
                $perPage = 10;

                $allItems = \Illuminate\Support\Facades\DB::table("contents")
                    ->where("category", $category)
                    ->orderBy("parent_id", "asc")
                    ->orderBy("created_at", "desc")
                    ->get()
                    ->map(fn($r) => (array) $r)
                    ->toArray();

                $parents = [];
                $childrenByParent = [];
                foreach ($allItems as $item) {
                    if ($item["parent_id"] === null) {
                        $parents[] = $item;
                    } else {
                        $childrenByParent[$item["parent_id"]][] = $item;
                    }
                }

                // Crear paginador manualmente
                $total = count($parents);
                $paginatedParents = array_slice(
                    $parents,
                    ($page - 1) * $perPage,
                    $perPage,
                );
                $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
                    $paginatedParents,
                    $total,
                    $perPage,
                    $page,
                    [
                        "path" => $request->url(),
                        "query" => $request->query(),
                    ],
                );

                // Aplanar jerarquía recursiva de los padres paginados para renderizar subniveles ilimitados
                $flatItems = [];
                $appendChildren = function (array $nodes, int $depth = 0) use (&$appendChildren, &$flatItems, $childrenByParent) {
                    foreach ($nodes as $node) {
                        $node["depth"] = $depth;
                        $node["has_children"] = !empty($childrenByParent[$node["id"]] ?? []);
                        $flatItems[] = $node;

                        $children = $childrenByParent[$node["id"]] ?? [];
                        if (!empty($children)) {
                            $appendChildren($children, $depth + 1);
                        }
                    }
                };

                $appendChildren($paginatedParents, 0);

                $title = "Gestión de Contenidos - ISTS Admin";
                if ($category === "documentos") {
                    $title = "Gestión de Documentos - ISTS Admin";
                } elseif ($category === "transparency") {
                    $title = "Gestión de Transparencia - ISTS Admin";
                }

                return view("admin.crud.contents.list", [
                    "title" => $title,
                    "items" => $paginator,
                    "flatItems" => $flatItems,
                    "category" => $category,
                    "is_hierarchical" => true,
                ]);
            } else {
                // Para otros contenidos, paginación normal
                $page = (int) $request->query("page", 1);
                $perPage = 10;

                $query = \Illuminate\Support\Facades\DB::table("contents");

                if ($category) {
                    // Si se está viendo una categoría específica (ej. 'tramites'), filtrar por ella
                    $query->where("category", $category);
                } else {
                    // Si es la lista general de contenidos, excluir las categorías especiales
                    $query
                        ->whereNotIn("category", ["transparency", "documentos"])
                        ->whereNull("parent_id");
                }

                $total = $query->count();
                $items = $query
                    ->orderBy("created_at", "desc")
                    ->skip(($page - 1) * $perPage)
                    ->take($perPage)
                    ->get()
                    ->map(fn($r) => (array) $r)
                    ->toArray();

                $paginator = new LengthAwarePaginator(
                    $items,
                    $total,
                    $perPage,
                    $page,
                    [
                        "path" => $request->url(),
                        "query" => $request->query(),
                    ],
                );

                $title = "Gestión de Contenidos - ISTS Admin";
                if ($category === "documentos") {
                    $title = "Gestión de Documentos - ISTS Admin";
                }

                return view("admin.crud.contents.list", [
                    "title" => $title,
                    "items" => $paginator,
                    "category" => $category,
                    "is_hierarchical" => false,
                ]);
            }
        } catch (\Exception $e) {
            Log::error("ContentController@index: " . $e->getMessage());
            return view("admin.error", [
                "title" => "Error",
                "error" => "Error al cargar contenidos",
            ]);
        }
    }

    public function create(Request $request)
    {
        $category = $request->query("category");
        $parents = [];
        if ($category === "transparency" || $category === "documentos") {
            $parents = $this->contentModel->getByCategoryAndParent($category);
        }

        $title = "Crear Contenido - ISTS Admin";
        if ($category === "tramites") {
            $title = "Crear Trámite - ISTS Admin";
        } elseif ($category === "transparency") {
            $title = "Crear Reglamento - ISTS Admin";
        }

        return view("admin.crud.contents.create", [
            "title" => $title,
            "parents" => $parents,
            "category" => $category,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"     => "required|string|max:255",
            "category"  => "required|string|max:255",
            "description" => "nullable|string",
            "content"   => "nullable|string",
            "image_url" => "nullable|image|mimes:jpeg,png,jpg,gif,svg",
            "file_url"  => "nullable|file|mimes:pdf",
            "url"       => "nullable|url",
            "is_external" => "nullable|boolean",
            "status"    => "nullable|in:published,draft,archived",
            "parent_id" => "nullable|exists:contents,id",
        ]);

        try {
            // Archivos: guardar antes de construir el data array
            $imageUrl = null;
            if ($request->hasFile("image_url")) {
                $img = $request->file("image_url");
                $imgName = uniqid() . '-' . preg_replace('/[^A-Za-z0-9_.-]/', '', $img->getClientOriginalName());
                $img->move(public_path("uploads/images/contents"), $imgName);
                $imageUrl = "/uploads/images/contents/" . $imgName;
            }

            $fileUrl = null;
            if ($request->hasFile("file_url")) {
                $pdf = $request->file("file_url");
                $pdfName = uniqid() . '-' . preg_replace('/[^A-Za-z0-9_.-]/', '', $pdf->getClientOriginalName());
                if (!is_dir(public_path("uploads/pdfs"))) {
                    mkdir(public_path("uploads/pdfs"), 0755, true);
                }
                $pdf->move(public_path("uploads/pdfs"), $pdfName);
                $fileUrl = "/uploads/pdfs/" . $pdfName;
            }

            $data = [
                "title"       => $request->input("title"),
                "slug"        => $this->generateSlug($request->input("title")),
                "category"    => $request->input("category"),
                "description" => $request->input("description"),
                "content"     => $request->input("content"),
                "url"         => $request->input("url"),
                "is_external" => $request->has("is_external") ? 1 : 0,
                "status"      => $request->input("status", "draft"),
                "featured"    => 0,
                "parent_id"   => $request->input("parent_id") ?: null,
                "image_url"   => $imageUrl,
                "file_url"    => $fileUrl,
                "created_at"  => now(),
                "updated_at"  => now(),
            ];

            \Illuminate\Support\Facades\DB::table("contents")->insert($data);

            // Automatización: crear submenú en menu_items si es un documento
            if ($data["category"] === "documentos") {
                // Buscar el menú principal "DOCUMENTOS"
                $parentMenu = \App\Models\MenuItem::whereRaw('upper(title) = ?', ['DOCUMENTOS'])->first();
                if ($parentMenu) {
                    // Crear submenú con el título del documento y url pública
                    $url = '/documentos'; // URL base
                    // Si el contenido tiene slug, se puede usar para una URL más específica
                    if (!empty($data['slug'])) {
                        $url = '/documentos/' . $data['slug'];
                    }
                    \App\Models\MenuItem::create([
                        'title' => $data['title'],
                        'url' => $url,
                        'parent_id' => $parentMenu->id,
                        'order' => 99, // al final, o puedes calcular el siguiente
                        'is_active' => 1,
                        'category' => 'documentos',
                    ]);
                }
            }

            $route = "admin." . ($data["category"] === "transparency" ? "transparency.index" : "contents.index");
            return redirect()->route($route)->with("success", "Contenido creado exitosamente.");
        } catch (\Exception $e) {
            Log::error("ContentController@store: " . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(["error" => "Error interno: " . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $item = $this->contentModel->findById((int) $id);
        if (!$item) {
            return redirect()
                ->route("admin.contents.index")
                ->withErrors(["error" => "Contenido no encontrado"]);
        }
        $item["images"] = ContentImage::where("content_id", $id)
            ->get()
            ->toArray();

        $parents = [];
        if (
            $item["category"] === "transparency" ||
            $item["category"] === "documentos"
        ) {
            $parents = $this->contentModel->getByCategoryAndParent(
                $item["category"],
            );
        }

        $children = [];
        if (
            !$item["parent_id"] &&
            ($item["category"] === "transparency" ||
                $item["category"] === "documentos")
        ) {
            $children = \Illuminate\Support\Facades\DB::table("contents")
                ->where("parent_id", $item["id"])
                ->orderBy("created_at", "desc")
                ->get()
                ->map(fn($r) => (array) $r)
                ->toArray();
        }

        return view("admin.crud.contents.edit", [
            "title" => "Editar Contenido - ISTS Admin",
            "item" => $item,
            "parents" => $parents,
            "children" => $children,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Contenidos especiales con slug protegido
        $protectedSlugs = ["linea-de-tiempo", "mision-y-vision", "organigrama"];
        $currentItem = $this->contentModel->findById((int) $id);
        $isProtectedSlug = $currentItem && in_array($currentItem["slug"], $protectedSlugs);

        // Usar la categoría del request, o la del contenido actual si no viene
        $category = $request->input('category') ?? ($currentItem["category"] ?? null);
        $rules = [
            "title" => "required|string|min:3",
            "slug" => $isProtectedSlug
                ? "nullable"
                : "nullable|string|unique:contents,slug," . $id,
            "url" => "nullable|url",
            "is_external" => "nullable|boolean",
            "category" => "nullable|string",
            "parent_id" => "nullable|exists:contents,id",
            "image_file" => "nullable|file|image",
            "pdf_files" => "nullable|array",
            "pdf_files.*" => "nullable|file|mimes:pdf",
            "external_pdf_url" => "nullable|url",
            "featured" => "nullable|boolean",
        ];
        if ($category === 'tramites') {
            $rules["description"] = "nullable|string";
            $rules["content"] = "nullable|string";
        } else {
            $rules["description"] = "nullable|string";
            $rules["content"] = "nullable|string";
        }

        $validated = $request->validate($rules);

        try {
            $item = $this->contentModel->findById((int) $id);
            if (!$item) {
                return redirect()
                    ->route("admin.contents.index")
                    ->withErrors(["error" => "Contenido no encontrado"]);
            }

            if ($request->hasFile("image_files")) {
                foreach ($request->file("image_files") as $file) {
                    $filename =
                        uniqid() .
                        "-" .
                        preg_replace(
                            "/[^A-Za-z0-9_.-]/",
                            "",
                            $file->getClientOriginalName(),
                        );
                    $destination = public_path("uploads/images/contents");
                    if (!is_dir($destination)) {
                        mkdir($destination, 0755, true);
                    }
                    $file->move($destination, $filename);
                    $imagePath = "/uploads/images/contents/" . $filename;

                    ContentImage::create([
                        "content_id" => $id,
                        "image_path" => $imagePath,
                    ]);
                }
            }

            // Handle image upload
            if ($request->hasFile("image_file")) {
                $file = $request->file("image_file");
                $filename =
                    uniqid() .
                    "-" .
                    preg_replace(
                        "/[^A-Za-z0-9_.-]/",
                        "",
                        $file->getClientOriginalName(),
                    );
                $destination = public_path("uploads/images/contents");
                if (!is_dir($destination)) {
                    mkdir($destination, 0755, true);
                }
                $file->move($destination, $filename);
                $imagePath = "/uploads/images/contents/" . $filename;
                $this->contentModel->updateImage($id, $imagePath);
                $item["image_url"] = $imagePath; // Update for data array
            }

            $fileUrl = $item["file_url"] ?? null;
            // Si se ingresa un enlace externo válido, se prioriza
            if (
                $request->filled("file_url") &&
                filter_var($request->input("file_url"), FILTER_VALIDATE_URL)
            ) {
                $fileUrl = $request->input("file_url");
            } elseif ($request->hasFile("file_url_upload")) {
                $file = $request->file("file_url_upload");
                $filename =
                    uniqid() .
                    "-" .
                    preg_replace(
                        "/[^A-Za-z0-9_.-]/",
                        "",
                        $file->getClientOriginalName(),
                    );
                $destination = public_path("uploads/pdfs");
                if (!is_dir($destination)) {
                    mkdir($destination, 0755, true);
                }
                $file->move($destination, $filename);
                $fileUrl = "/uploads/pdfs/" . $filename;
            }

            // Si es un contenido con slug protegido, mantener el slug original
            if ($isProtectedSlug) {
                $slug = $item["slug"];
            } else {
                // Usar el slug proporcionado, o generar uno nuevo si cambió el título
                if ($request->filled("slug")) {
                    $slug = $validated["slug"];
                } else {
                    $slug =
                        $item["title"] !== $validated["title"]
                            ? $this->generateSlug($validated["title"])
                            : $item["slug"];
                }
            }

            // Decodificar entidades HTML para evitar doble escapado
            $data = [
                "title" => html_entity_decode(
                    $validated["title"],
                    ENT_QUOTES | ENT_HTML5,
                    "UTF-8",
                ),
                "slug" => $slug,
                "url" => $validated["url"] ?? null,
                "is_external" => $request->has('is_external') ? 1 : 0,
                "description" => html_entity_decode(
                    $validated["description"] ?? '',
                    ENT_QUOTES | ENT_HTML5,
                    "UTF-8",
                ),
                "content" => html_entity_decode(
                    $validated["content"] ?? '',
                    ENT_QUOTES | ENT_HTML5,
                    "UTF-8",
                ),
                "category" =>
                    $request->input("category")
                        ?: ($currentItem["category"] ?? ($request->input("parent_id") ? "transparency" : null)),
                "parent_id" => $request->input("parent_id"),
                "status" => $request->input("status", "published"), // Publicar por defecto
                "featured" => (int) $request->boolean("featured"),
                "image_url" => $item["image_url"],
                "file_url" => $fileUrl,
            ];

            // rowCount() puede retornar 0 si no hay cambios, pero eso NO es error
            $this->contentModel->updateContent((int) $id, $data);

            return redirect()
                ->route("admin.contents.edit", $id)
                ->with("success", "Contenido actualizado exitosamente");
        } catch (\Exception $e) {
            Log::error("ContentController@update: " . $e->getMessage());
            return back()
                ->withInput()
                ->withErrors([
                    "error" =>
                        "Error interno del servidor: " . $e->getMessage(),
                ]);
        }
    }

    public function destroy($id)
    {
        try {
            $images = ContentImage::where("content_id", $id)->get();
            foreach ($images as $image) {
                Storage::disk("public")->delete(
                    str_replace("/storage", "", $image->image_path),
                );
                $image->delete();
            }

            $item = $this->contentModel->findById((int) $id);
            $category = $item["category"] ?? null;
            $route = "admin.contents.index";
            if ($category === "transparency") {
                $route = "admin.transparency.index";
            } elseif ($category === "documentos") {
                $route = "admin.documentos.index";
            } elseif ($category === "news") {
                $route = "admin.news.index";
            }

            $deleted = $this->contentModel->deleteContent((int) $id);
            if ($deleted) {
                return redirect()
                    ->route($route)
                    ->with("success", "Contenido eliminado exitosamente");
            }
            return redirect()
                ->route($route)
                ->withErrors(["error" => "Error al eliminar el contenido"]);
        } catch (\Exception $e) {
            Log::error("ContentController@destroy: " . $e->getMessage());
            return redirect()
                ->route("admin.contents.index")
                ->withErrors(["error" => "Error interno del servidor"]);
        }
    }

    public function destroyImage($contentId, $imageId)
    {
        try {
            $image = ContentImage::where("content_id", $contentId)
                ->where("id", $imageId)
                ->first();
            if ($image) {
                Storage::disk("public")->delete(
                    str_replace("/storage", "", $image->image_path),
                );
                $image->delete();
                return back()->with(
                    "success",
                    "Imagen eliminada exitosamente.",
                );
            }
            return back()->withErrors(["error" => "Imagen no encontrada."]);
        } catch (\Exception $e) {
            Log::error("ContentController@destroyImage: " . $e->getMessage());
            return back()->withErrors([
                "error" => "Error interno del servidor.",
            ]);
        }
    }

    private function generateSlug($title)
    {
        $slug = Str::slug($title);

        $original = $slug;
        $counter = 1;
        // Protegemos contra $this->contentModel nulo y comprobamos si el método slugExists existe
        while (
            $this->contentModel &&
            method_exists($this->contentModel, "slugExists") &&
            $this->contentModel->slugExists($slug)
        ) {
            $slug = $original . "-" . $counter;
            $counter++;
        }

        return $slug;
    }

    public function rector()
    {
        try {
            $content = \Illuminate\Support\Facades\DB::table("contents")
                ->where("category", "rector")
                ->first();

            if (!$content) {
                // Crear contenido por defecto si no existe
                $contentId = \Illuminate\Support\Facades\DB::table(
                    "contents",
                )->insertGetId([
                    "title" => "Mensaje del Rector",
                    "description" =>
                        "Bienvenidos al Instituto Superior Tecnológico Sucúa...",
                    "category" => "rector",
                    "status" => "published",
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
                $content = (object) [
                    "id" => $contentId,
                    "title" => "Mensaje del Rector",
                    "description" =>
                        "Bienvenidos al Instituto Superior Tecnológico Sucúa...",
                    "category" => "rector",
                    "status" => "published",
                ];
            }

            return view("admin.crud.contents.edit", [
                "title" => "Editar Mensaje del Rector - ISTS Admin",
                "content" => $content,
                "category" => "rector",
            ]);
        } catch (\Exception $e) {
            Log::error("ContentController@rector: " . $e->getMessage());
            return view("admin.error", [
                "title" => "Error",
                "error" => "Error al cargar mensaje del rector",
            ]);
        }
    }

    public function showTransparency()
    {
        $items = \Illuminate\Support\Facades\DB::table("contents")
            ->where("category", "transparency")
            ->orderBy("parent_id", "asc")
            ->orderBy("created_at", "desc")
            ->paginate(10); // Implementar paginación

        return view("public.transparency.index", [
            "title" => "Transparencia",
            "items" => $items,
        ]);
    }
}
