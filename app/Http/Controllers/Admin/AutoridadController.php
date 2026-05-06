<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Autoridad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Importar la clase Str

class AutoridadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autoridades = Autoridad::orderBy("orden")->get();
        return view("admin.autoridades.index", compact("autoridades"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.autoridades.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|string|max:255",
            "cargo" => "required|string|max:255",
            "categoria" => "nullable|string|max:255",
            "biografia" => "nullable|string",
            "foto_path" => "nullable|image|mimes:jpeg,png,jpg,gif,svg",
            "pdf_path" => "nullable|mimes:pdf,doc,docx|max:10240", // Max 10MB
            "orden" => "required|integer",
        ]);

        $data = $request->only([
            "nombre",
            "cargo",
            "categoria",
            "biografia",
            "orden",
        ]);

        // Generar slug único
        $data["slug"] = $this->generateUniqueSlug($request->nombre);

        if ($request->hasFile("foto_path")) {
            $data["foto_path"] = $request
                ->file("foto_path")
                ->store("autoridades/fotos", "public");
        }

        if ($request->hasFile("pdf_path")) {
            $data["pdf_path"] = $request
                ->file("pdf_path")
                ->store("autoridades/pdfs", "public");
        }

        Autoridad::create($data);

        return redirect()
            ->route("admin.autoridades.index")
            ->with("success", "Autoridad creada exitosamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function show(Autoridad $autoridad)
    {
        // No es necesario para el admin, redirigir a editar.
        return redirect()->route("admin.autoridades.edit", $autoridad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function edit(Autoridad $autoridad)
    {
        return view("admin.autoridades.edit", compact("autoridad"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autoridad $autoridad)
    {
        $request->validate([
            "nombre" => "required|string|max:255",
            "cargo" => "required|string|max:255",
            "categoria" => "nullable|string|max:255",
            "biografia" => "nullable|string",
            "foto_path" => "nullable|image|mimes:jpeg,png,jpg,gif,svg",
            "pdf_path" => "nullable|mimes:pdf,doc,docx|max:10240",
            "orden" => "required|integer",
        ]);

        $data = $request->only([
            "nombre",
            "cargo",
            "categoria",
            "biografia",
            "orden",
        ]);

        // Generar slug único si el nombre ha cambiado
        if ($request->nombre !== $autoridad->nombre) {
            $data["slug"] = $this->generateUniqueSlug(
                $request->nombre,
                $autoridad->id,
            );
        } else {
            $data["slug"] = $autoridad->slug; // Mantener el slug existente si el nombre no cambió
        }

        if ($request->hasFile("foto_path")) {
            // Eliminar foto anterior del disco público
            $this->deleteAuthorityFile($autoridad->foto_path, "uploads/images");

            $data["foto_path"] = $request
                ->file("foto_path")
                ->store("autoridades/fotos", "public");
        }

        if ($request->hasFile("pdf_path")) {
            $this->deleteAuthorityFile($autoridad->pdf_path, "uploads/pdfs");

            $data["pdf_path"] = $request
                ->file("pdf_path")
                ->store("autoridades/pdfs", "public");
        }

        $autoridad->update($data);

        return redirect()
            ->route("admin.autoridades.index")
            ->with("success", "Autoridad actualizada exitosamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autoridad $autoridad)
    {
        $this->deleteAuthorityFile($autoridad->foto_path, "uploads/images");
        $this->deleteAuthorityFile($autoridad->pdf_path, "uploads/pdfs");

        $autoridad->delete();

        return redirect()
            ->route("admin.autoridades.index")
            ->with("success", "Autoridad eliminada exitosamente.");
    }

    /**
     * Genera un slug único para la autoridad.
     *
     * @param string $title
     * @param int|null $exceptId ID de la autoridad a excluir para evitar conflictos consigo mismo
     * @return string
     */
    protected function generateUniqueSlug(
        string $title,
        ?int $exceptId = null,
    ): string {
        $originalSlug = Str::slug($title);
        $slug = $originalSlug;
        $count = 1;

        while (
            Autoridad::where("slug", $slug)
                ->when($exceptId, function ($query) use ($exceptId) {
                    return $query->where("id", "!=", $exceptId);
                })
                ->exists()
        ) {
            $count++;
            $slug = $originalSlug . "-" . $count;
        }

        return $slug;
    }

    protected function deleteAuthorityFile(?string $value, ?string $legacyDirectory = null): void
    {
        if (empty($value) || filter_var($value, FILTER_VALIDATE_URL)) {
            return;
        }

        $path = ltrim((string) $value, "/");

        if (str_starts_with($path, "storage/")) {
            $path = substr($path, strlen("storage/"));
        }

        if (Storage::disk("public")->exists($path)) {
            Storage::disk("public")->delete($path);
            return;
        }

        $publicPaths = [public_path($path)];

        if ($legacyDirectory) {
            $publicPaths[] = public_path($legacyDirectory . "/" . $path);
        }

        foreach ($publicPaths as $publicPath) {
            if (file_exists($publicPath) && is_file($publicPath)) {
                unlink($publicPath);
                return;
            }
        }
    }
}
