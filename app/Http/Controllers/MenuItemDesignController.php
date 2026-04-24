<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\MenuItemPdf;
use Illuminate\Http\Request;

class MenuItemDesignController extends Controller
{
    public function edit($menuItemId, $pdfId)
    {
        $menuItem = MenuItem::findOrFail($menuItemId);
        $pdf = MenuItemPdf::findOrFail($pdfId);

        return view('admin.crud.menu_items.designs.edit', compact('menuItem', 'pdf'));
    }

    public function update(Request $request, $menuItemId, $pdfId)
    {
        $pdf = MenuItemPdf::findOrFail($pdfId);

        $request->validate([
            'title' => 'required|string|max:255',
            'main_description' => 'nullable|string',
            'main_description_2' => 'nullable|string',
            'main_image' => 'nullable|image|max:4096',
            'pdf_file' => 'nullable|file|mimes:pdf|max:20480',
            'is_active' => 'nullable|boolean',
        ]);

        $pdf->title = $request->title;
        $pdf->main_description = $request->main_description;
        $pdf->main_description_2 = $request->main_description_2;
        $pdf->is_active = $request->boolean('is_active', true);

        if ($request->hasFile('main_image')) {
            $pdf->main_image_path = $request->file('main_image')->store('menu_designs_images', 'public');
        }

        if ($request->hasFile('pdf_file')) {
            $pdf->pdf_path = $request->file('pdf_file')->store('menu_designs', 'public');
        }

        $pdf->save();

        return redirect()->route('admin.menu-items.index')->with('success', 'Diseño actualizado correctamente.');
    }

    public function create($menuItemId)
    {
        $menuItem = MenuItem::findOrFail($menuItemId);
        $menuTree = MenuItem::whereNull('parent_id')->with('childrenRecursive')->orderBy('order')->get();
        $parents = $this->buildParentOptions($menuTree);

        return view('admin.crud.menu_items.designs.create', compact('menuItem', 'parents'));
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

    public function store(Request $request, $menuItemId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf_files' => 'nullable|array',
            'pdf_files.*' => 'nullable|file|mimes:pdf|max:20480',
            'parent_id' => 'required|exists:menu_items,id',
            'main_description' => 'nullable|string',
            'main_description_2' => 'nullable|string',
            'main_image' => 'nullable|image|max:4096',
            'is_active' => 'nullable|boolean',
        ]);

        $menuItem = MenuItem::findOrFail($request->parent_id);
        $mainImagePath = null;

        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('menu_designs_images', 'public');
        }

        $pdfFiles = $request->file('pdf_files', []);

        if (!empty($pdfFiles)) {
            foreach ($pdfFiles as $file) {
                if (!$file) {
                    continue;
                }

                $menuItem->pdfs()->create([
                    'title' => $request->title,
                    'pdf_path' => $file->store('menu_designs', 'public'),
                    'main_description' => $request->main_description,
                    'main_description_2' => $request->main_description_2,
                    'main_image_path' => $mainImagePath,
                    'is_active' => $request->boolean('is_active', true),
                ]);
            }
        } else {
            $menuItem->pdfs()->create([
                'title' => $request->title,
                'pdf_path' => null,
                'main_description' => $request->main_description,
                'main_description_2' => $request->main_description_2,
                'main_image_path' => $mainImagePath,
                'is_active' => $request->boolean('is_active', true),
            ]);
        }

        return redirect()->route('admin.menu-items.index')->with('success', 'Diseños agregados correctamente.');
    }
}
