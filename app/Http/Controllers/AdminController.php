<?php

namespace App\Http\Controllers;

use App\Models\AcademicSection;
use App\Models\CampusItem;
use App\Models\Career;
use App\Models\MenuItem;
use App\Models\News;
use App\Models\QA;
use App\Models\Setting;
use App\Models\Teacher;
use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        // Requiere autenticación
        $this->middleware("auth");

        // Comprueba que el usuario tenga rol admin. Ajustar si su modelo usa otra propiedad.
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if (!$user || ($user->role ?? null) !== "admin") {
                // Redirige a la ruta estándar de login
                return redirect(url("/login"));
            }
            return $next($request);
        });
    }

    public function index()
    {
        // Redirige al dashboard administrativo
        return redirect()->route("admin.dashboard");
    }

    public function dashboard()
    {
        $academicSections = AcademicSection::withCount([
            "careers" => function ($query) {
                $query->where("is_active", true);
            },
        ])
            ->ordered()
            ->get();

        $careers = Career::where('is_active', true)->ordered()->get();
        $teachersCount = Teacher::count();
        $campusItems = CampusItem::active()->ordered()->get();
        $menuItems = MenuItem::with(['children' => function ($query) {
            $query->orderBy('order');
        }])->whereNull('parent_id')->orderBy('order')->get();
        $headerLogoPath = Setting::where('key', 'header_logo_path')->value('value');
        $allMenuParents = MenuItem::whereNull('parent_id')->orderBy('order')->get();

        $visitSections = \App\Models\VisitSection::all()->keyBy('slug');

        $totalNews = News::count();
        $totalContents = (new \App\Models\Content())->count();
        $totalUsers = (new \App\Models\User())->count();
        $totalViews = DB::table('site_stats')->where('id', 1)->value('total_visits');
        $qasCount = QA::count();
        $updatesActiveCount = Update::active()->count();
        $documentosCount = DB::table('contents')->where('category', 'documentos')->count();
        $stats = [
            'recent_contents' => DB::table('contents')->orderByDesc('created_at')->limit(5)->get()->map(fn($row) => (array) $row)->toArray(),
            'recent_news' => News::orderByDesc('published_at')->limit(5)->get()->map(fn($row) => $row->toArray())->toArray(),
        ];

        return view("admin.dashboard", [
            "title" => "Dashboard - ISTS Admin",
            "academicSections" => $academicSections,
            "careers" => $careers,
            "teachersCount" => $teachersCount,
            "campusItems" => $campusItems,
            "visitSections" => $visitSections,
            "totalNews" => $totalNews,
            "totalContents" => $totalContents,
            "totalUsers" => $totalUsers,
            "totalViews" => $totalViews,
            "qasCount" => $qasCount,
            "updatesActiveCount" => $updatesActiveCount,
            "documentosCount" => $documentosCount,
            "stats" => $stats,
            "menuItems" => $menuItems,
            "allMenuParents" => $allMenuParents,
            "headerLogoPath" => $headerLogoPath,
        ]);
    }

    public function createContent()
    {
        return view("admin.crud.contents.create", [
            "title" => "Crear Contenido - ISTS Admin",
        ]);
    }

    public function createNews()
    {
        return view("admin.crud.news.create", [
            "title" => "Crear Noticia - ISTS Admin",
            "type" => "news",
        ]);
    }

    public function contents()
    {
        return redirect(url("/contents"));
    }

    public function news()
    {
        return redirect(url("/news"));
    }

    public function users()
    {
        return redirect(url("/users"));
    }

    public function settings()
    {
        return view("admin.settings", [
            "title" => "Configuración - ISTS Admin",
        ]);
    }
}
