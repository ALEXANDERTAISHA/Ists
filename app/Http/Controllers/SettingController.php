<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        // Carga todas las configuraciones y las convierte en un array simple de clave => valor
        $settings = Setting::all()->pluck('value', 'key');

        return view('admin.settings.index', [
            'title' => 'Configuración General - ISTS Admin',
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'institute_name' => 'nullable|string|max:255',
            'institute_motto' => 'nullable|string|max:255',
            'contact_address' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_hours' => 'nullable|string|max:255',
            'contact_whatsapp' => 'nullable|string|max:255',
            'contact_whatsapp_message' => 'nullable|string|max:500',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
            'social_telegram' => 'nullable|url',
            'social_youtube' => 'nullable|url',
            'biblioteca_url' => 'nullable|url',
            'seguimiento_graduados_url' => 'nullable|url',
        ];

        $validatedData = $request->validate($rules);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Configuración guardada exitosamente.');
    }

    public function updateHeaderBrand(Request $request)
    {
        $validated = $request->validate([
            'header_logo' => 'required|image|mimes:png,jpg,jpeg,svg,webp',
        ]);

        $currentPath = Setting::where('key', 'header_logo_path')->value('value');
        if ($currentPath && str_starts_with($currentPath, '/uploads/branding/')) {
            $absoluteOldPath = public_path(ltrim($currentPath, '/'));
            if (File::exists($absoluteOldPath)) {
                File::delete($absoluteOldPath);
            }
        }

        $destination = public_path('uploads/branding');
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        $file = $validated['header_logo'];
        $filename = 'header-logo-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($destination, $filename);

        Setting::updateOrCreate(
            ['key' => 'header_logo_path'],
            ['value' => '/uploads/branding/' . $filename]
        );

        return redirect()->to(route('admin.dashboard') . '#header-manager')->with('success', 'Logo del header actualizado exitosamente.');
    }

    public function biblioteca()
    {
        $bibliotecaUrl = Setting::where('key', 'biblioteca_url')->value('value');

        return view('admin.settings.biblioteca', [
            'title' => 'Configurar Biblioteca - ISTS Admin',
            'bibliotecaUrl' => $bibliotecaUrl,
        ]);
    }

    public function updateBiblioteca(Request $request)
    {
        $validated = $request->validate([
            'biblioteca_url' => 'required|url|max:500',
        ]);

        Setting::updateOrCreate(
            ['key' => 'biblioteca_url'],
            ['value' => $validated['biblioteca_url']]
        );

        return redirect()->route('admin.settings.biblioteca')->with('success', 'Enlace de Biblioteca guardado exitosamente.');
    }

    public function graduados()
    {
        $graduadosUrl = Setting::where('key', 'seguimiento_graduados_url')->value('value');

        return view('admin.settings.graduados', [
            'title' => 'Configurar Seguimiento a Graduados - ISTS Admin',
            'graduadosUrl' => $graduadosUrl,
        ]);
    }

    public function updateGraduados(Request $request)
    {
        $validated = $request->validate([
            'seguimiento_graduados_url' => 'required|url|max:500',
        ]);

        Setting::updateOrCreate(
            ['key' => 'seguimiento_graduados_url'],
            ['value' => $validated['seguimiento_graduados_url']]
        );

        return redirect()->route('admin.settings.graduados')->with('success', 'Enlace de Seguimiento a Graduados guardado exitosamente.');
    }
}
