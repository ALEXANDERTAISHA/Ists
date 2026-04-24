<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\AcademicSection;
use App\Models\Career;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class HeaderComposer
{
    public function compose(View $view)
    {
        $academicSections = AcademicSection::where("is_active", true)
            ->with([
                "careers" => function ($query) {
                    $query->where("is_active", true)->ordered();
                },
            ])
            ->ordered()
            ->get();

        $allCareers = Career::where("is_active", true)->ordered()->get();

        $carrerasPresenciales = Career::where("is_active", true)
            ->where("modality", "presencial")
            ->ordered()
            ->get();

        $carrerasDuales = Career::where("is_active", true)
            ->where("modality", "dual")
            ->ordered()
            ->get();

        // Carreras destacadas para mostrar directamente en el menu
        $carrerasDestacadas = Career::where("is_active", true)
            ->where("modality", "presencial")
            ->whereIn("slug", ["desarrollo-software", "contabilidad-y-asesoria-tributaria", "agroecologia"])
            ->ordered()
            ->get();

        $courses = DB::table("contents")
            ->where("category", "course")
            ->where("status", "published")
            ->get();

        $transparencyContents = DB::table("contents")
            ->where("category", "transparency")
            ->whereNull("parent_id")
            ->where("status", "published")
            ->orderBy("created_at", "desc")
            ->get()
            ->map(function ($item) {
                $item->children = DB::table("contents")
                    ->where("parent_id", $item->id)
                    ->where("status", "published")
                    ->orderBy("created_at", "desc")
                    ->get()
                    ->map(function ($child) {
                        return (array) $child;
                    })
                    ->toArray();
                return (array) $item;
            })
            ->toArray();

        $documentos = DB::table("contents")
            ->where("category", "documentos")
            ->whereNull("parent_id")
            ->where("status", "published")
            ->orderBy("created_at", "desc")
            ->get()
            ->map(function ($item) {
                return (array) $item;
            })
            ->toArray();

        $headerLogoPath = Setting::where('key', 'header_logo_path')->value('value');

        $view->with(
            compact(
                "academicSections",
                "allCareers",
                "carrerasPresenciales",
                "carrerasDuales",
                "carrerasDestacadas",
                "courses",
                "transparencyContents",
                "documentos",
                "headerLogoPath",
            ),
        );
    }
}
