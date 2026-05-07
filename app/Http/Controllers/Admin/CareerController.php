<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\AcademicSection;
use App\Support\PublicFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::ordered()->get();
        return view("admin.careers.index", compact("careers"));
    }

    public function create()
    {
        $academicSections = AcademicSection::ordered()->get();
        return view("admin.careers.create", compact("academicSections"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "academic_section_id" => "nullable|exists:academic_sections,id",
            "name" => "required|string|max:255",
            "slug" => "nullable|string|max:255|unique:careers,slug",
            "description" => "nullable|string",
            "full_description" => "nullable|string",
            "professional_profile" => "nullable|string",
            "coordinator" => "nullable|string|max:255",
            "coordinator_email" => "nullable|email|max:255",
            "image" => "nullable|image|mimes:jpeg,jpg,png,webp",
            "image_2" => "nullable|image|mimes:jpeg,jpg,png,webp",
            "curriculum_pdf" => "nullable|file|mimes:pdf,doc,docx",
            "sort_order" => "nullable|integer",
            "cover_image" => "nullable|image|mimes:jpeg,jpg,png,webp",
        ]);
        // Manejar la carga de imagen de portada
        if ($request->hasFile("cover_image")) {
            $file = $request->file("cover_image");
            $filename = time() . '_cover_' . $file->getClientOriginalName();
            $destDir = public_path('storage/careers');
            if (!is_dir($destDir)) { mkdir($destDir, 0755, true); }
            $file->move($destDir, $filename);
            $validated["cover_image"] = 'careers/' . $filename;
        }

        // Generar slug si no se proporciona
        if (empty($validated["slug"])) {
            $validated["slug"] = Str::slug($validated["name"]);
        }

        // Manejar la carga de imagen principal
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = time() . '_' . $file->getClientOriginalName();
            $destDir = public_path('storage/careers');
            if (!is_dir($destDir)) { mkdir($destDir, 0755, true); }
            $file->move($destDir, $filename);
            $validated["image_path"] = 'careers/' . $filename;
        }

        // Manejar la carga de imagen secundaria
        if ($request->hasFile("image_2")) {
            $file = $request->file("image_2");
            $filename = time() . '_img2_' . $file->getClientOriginalName();
            $destDir = public_path('storage/careers');
            if (!is_dir($destDir)) { mkdir($destDir, 0755, true); }
            $file->move($destDir, $filename);
            $validated["image_path_2"] = 'careers/' . $filename;
        }

        // Manejar la carga de PDF de malla curricular
        if ($request->hasFile("curriculum_pdf")) {
            $file = $request->file("curriculum_pdf");
            $filename = time() . '_' . $file->getClientOriginalName();
            $destDir = public_path('uploads/careers/curriculum');
            if (!is_dir($destDir)) { mkdir($destDir, 0755, true); }
            $file->move($destDir, $filename);
            $validated["curriculum_pdf"] = '/uploads/careers/curriculum/' . $filename;
        }

        // Asegurar valores por defecto
        $validated["is_active"] = $request->has("is_active") ? true : false;
        $validated["sort_order"] = $validated["sort_order"] ?? 0;

        Career::create($validated);

        return redirect()
            ->route("admin.careers.index")
            ->with("success", "Carrera creada exitosamente.");
    }

    public function edit(Career $career)
    {
        $academicSections = AcademicSection::ordered()->get();
        return view(
            "admin.careers.edit",
            compact("career", "academicSections"),
        );
    }

    public function update(Request $request, Career $career)
    {
        try {
            $validated = $request->validate([
                "academic_section_id" => "nullable|exists:academic_sections,id",
                "name" => "required|string|max:255",
                "slug" =>
                    "nullable|string|max:255|unique:careers,slug," .
                    $career->id,
                "description" => "nullable|string",
                "full_description" => "nullable|string",
                "professional_profile" => "nullable|string",
                "coordinator" => "nullable|string|max:255",
                "coordinator_email" => "nullable|email|max:255",
                "image" => "nullable|image|mimes:jpeg,jpg,png,webp",
                "image_2" => "nullable|image|mimes:jpeg,jpg,png,webp",
                "curriculum_pdf" => "nullable|file|mimes:pdf,doc,docx",
                "sort_order" => "nullable|integer",
                "cover_image" => "nullable|image|mimes:jpeg,jpg,png,webp",
            ]);

            // Manejar la carga de imagen de portada
            if ($request->hasFile("cover_image")) {
                if ($request->file("cover_image")->isValid()) {
                    if ($career->cover_image && file_exists(public_path('storage/' . $career->cover_image))) {
                        @unlink(public_path('storage/' . $career->cover_image));
                    }
                    $file = $request->file("cover_image");
                    $filename = time() . '_cover_' . $file->getClientOriginalName();
                    $destDir = public_path('storage/careers');
                    if (!is_dir($destDir)) { mkdir($destDir, 0755, true); }
                    $file->move($destDir, $filename);
                    $validated["cover_image"] = 'careers/' . $filename;
                }
            }

            // Generar slug si no se proporciona
            if (empty($validated["slug"])) {
                $validated["slug"] = Str::slug($validated["name"]);
            }

            // Manejar la carga de imagen principal
            if ($request->hasFile("image")) {
                \Log::info("Subiendo imagen principal para carrera: " . $career->name);
                if ($request->file("image")->isValid()) {
                    // Eliminar imagen anterior si existe
                    if ($career->image_path && file_exists(public_path('storage/' . $career->image_path))) {
                        @unlink(public_path('storage/' . $career->image_path));
                    }
                    $file = $request->file("image");
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $destDir = public_path('storage/careers');
                    if (!is_dir($destDir)) { mkdir($destDir, 0755, true); }
                    $file->move($destDir, $filename);
                    $validated["image_path"] = 'careers/' . $filename;
                    \Log::info("Imagen principal guardada en: " . $validated["image_path"]);
                } else {
                    \Log::error("Imagen principal no válida");
                    return redirect()->back()->with("error", "El archivo de imagen principal no es válido.")->withInput();
                }
            }

            // Manejar la carga de imagen secundaria
            if ($request->hasFile("image_2")) {
                \Log::info("Subiendo imagen secundaria para carrera: " . $career->name);
                if ($request->file("image_2")->isValid()) {
                    // Eliminar imagen anterior si existe
                    if ($career->image_path_2 && file_exists(public_path('storage/' . $career->image_path_2))) {
                        @unlink(public_path('storage/' . $career->image_path_2));
                    }
                    $file = $request->file("image_2");
                    $filename = time() . '_img2_' . $file->getClientOriginalName();
                    $destDir = public_path('storage/careers');
                    if (!is_dir($destDir)) { mkdir($destDir, 0755, true); }
                    $file->move($destDir, $filename);
                    $validated["image_path_2"] = 'careers/' . $filename;
                    \Log::info("Imagen secundaria guardada en: " . $validated["image_path_2"]);
                } else {
                    \Log::error("Imagen secundaria no válida");
                    return redirect()->back()->with("error", "El archivo de imagen secundaria no es válido.")->withInput();
                }
            }

            // Manejar la carga de PDF de malla curricular
            if ($request->hasFile("curriculum_pdf")) {
                \Log::info(
                    "Subiendo PDF de malla curricular para carrera: " .
                        $career->name,
                );

                if ($request->file("curriculum_pdf")->isValid()) {
                    // Eliminar PDF anterior si existe
                    PublicFile::delete($career->curriculum_pdf);

                    $file = $request->file("curriculum_pdf");
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $destDir = public_path('uploads/careers/curriculum');
                    if (!is_dir($destDir)) { mkdir($destDir, 0755, true); }
                    $file->move($destDir, $filename);
                    $validated["curriculum_pdf"] = '/uploads/careers/curriculum/' . $filename;
                    \Log::info(
                        "PDF de malla curricular guardado en: " . $validated["curriculum_pdf"],
                    );
                } else {
                    \Log::error("PDF de malla curricular no válido");
                    return redirect()
                        ->back()
                        ->with("error", "El archivo PDF no es válido.")
                        ->withInput();
                }
            }

            $validated["is_active"] = $request->has("is_active") ? true : false;

            $career->update($validated);

            $message = "Carrera actualizada exitosamente";
            if (
                $request->hasFile("image") ||
                $request->hasFile("image_2") ||
                $request->hasFile("curriculum_pdf")
            ) {
                $message .= " (con archivos)";
            }

            return redirect()
                ->route("admin.careers.index")
                ->with("success", $message);
        } catch (\Exception $e) {
            \Log::error("Error actualizando carrera: " . $e->getMessage());
            return redirect()
                ->back()
                ->with(
                    "error",
                    "Error al actualizar la carrera: " . $e->getMessage(),
                )
                ->withInput();
        }
    }

    public function destroy(Career $career)
    {
        // Eliminar imagen si existe
        if ($career->image_path) {
            Storage::disk("public")->delete($career->image_path);
        }

        $career->delete();

        return redirect()
            ->route("admin.careers.index")
            ->with("success", "Carrera eliminada exitosamente.");
    }
}
