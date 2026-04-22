<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Setting;
use App\Models\Career;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'system_key' => 'nullable|string|max:50',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'career_id' => 'nullable|exists:careers,id',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }

    private function buildParentOptions($items, string $prefix = '', array $excludedIds = []): array
    {
        $options = [];

        foreach ($items as $item) {
            if (!in_array((int) $item->id, $excludedIds, true)) {
                $options[] = [
                    'id' => $item->id,
                    'label' => $prefix . $item->title,
                ];
            }

            if ($item->childrenRecursive && $item->childrenRecursive->count() > 0) {
                $options = array_merge($options, $this->buildParentOptions($item->childrenRecursive, $prefix . '-- ', $excludedIds));
            }
        }

        return $options;
    }

    private function getDescendantIds(MenuItem $item): array
    {
        $ids = [];

        foreach ($item->children as $child) {
            $ids[] = $child->id;
            $ids = array_merge($ids, $this->getDescendantIds($child));
        }

        return $ids;
    }

    private function redirectAfterDashboardAwareAction(Request $request, string $message)
    {
        if ($request->input('_source') === 'dashboard') {
            return redirect()->to(route('admin.dashboard') . '#header-manager')->with('success', $message);
        }

        return redirect()->route('admin.menu-items.index')->with('success', $message);
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            if (!$user || ($user->role ?? null) !== 'admin') {
                return redirect('/login');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $items = MenuItem::whereNull('parent_id')->with('childrenRecursive')->orderBy('order')->get();
        $headerLogoPath = Setting::where('key', 'header_logo_path')->value('value');

        return view('admin.crud.menu_items.index', compact('items', 'headerLogoPath'));
    }

    public function create(Request $request)
    {
        $menuTree = MenuItem::whereNull('parent_id')->with('childrenRecursive')->orderBy('order')->get();
        $parents = $this->buildParentOptions($menuTree);
        $selectedParentId = $request->filled('parent_id') ? (int) $request->input('parent_id') : null;

        // Obtener carreras activas para selección
        $careers = Career::active()->ordered()->get(['id', 'name', 'slug']);

        return view('admin.crud.menu_items.create', compact('parents', 'selectedParentId', 'careers'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = uniqid('menu_pdf_') . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/menu_pdfs', $filename);
            $data['pdf_file'] = str_replace('public/', 'storage/', $path);
        }

        MenuItem::create($data);

        return $this->redirectAfterDashboardAwareAction($request, 'Elemento del menú creado exitosamente.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = MenuItem::findOrFail($id);
        $item->load('childrenRecursive');

        $excludedIds = array_merge([$item->id], $this->getDescendantIds($item));

        $menuTree = MenuItem::whereNull('parent_id')
            ->whereNotIn('id', $excludedIds)
            ->with('childrenRecursive')
            ->orderBy('order')
            ->get();

        $parents = $this->buildParentOptions($menuTree, '', $excludedIds);
        $careers = Career::active()->ordered()->get(['id', 'name', 'slug']);

        return view('admin.crud.menu_items.edit', compact('item', 'parents', 'careers'));
    }

    public function update(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);
        $validated = $this->validatedData($request);

        if (!empty($validated['parent_id'])) {
            $item->load('childrenRecursive');
            $invalidParentIds = array_merge([$item->id], $this->getDescendantIds($item));

            if (in_array((int) $validated['parent_id'], $invalidParentIds, true)) {
                return back()->withErrors([
                    'parent_id' => 'No puedes asignar como padre el mismo elemento ni uno de sus descendientes.',
                ])->withInput();
            }
        }

        // Si el título y la carrera vinculada son iguales, solo mostrar uno en el menú (no duplicar)
        if (!empty($validated['career_id'])) {
            $career = Career::find($validated['career_id']);
            if ($career && trim($validated['title']) === trim($career->name)) {
                $validated['title'] = $career->name;
            }
        }

        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = uniqid('menu_pdf_') . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/menu_pdfs', $filename);
            $validated['pdf_file'] = str_replace('public/', 'storage/', $path);
        }

        $item->update($validated);

        return $this->redirectAfterDashboardAwareAction($request, 'Elemento del menú actualizado exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);
        $item->load('childrenRecursive');

        $descendantIds = $this->getDescendantIds($item);
        if (!empty($descendantIds)) {
            MenuItem::whereIn('id', $descendantIds)->delete();
        }

        $item->delete();

        return $this->redirectAfterDashboardAwareAction($request, 'Elemento del menú eliminado exitosamente.');
    }
}
