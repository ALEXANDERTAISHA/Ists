<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;

class PublicMenuDesignController extends Controller
{
    /**
     * Muestra los diseños asociados a un menú o submenú.
     */
    public function show($id)
    {
        $menuItem = MenuItem::with(['pdfs', 'childrenRecursive'])->findOrFail($id);
        $menuPathTitle = $this->buildMenuPathTitle($menuItem);

        $mainDesign = $menuItem->pdfs->first(function ($pdf) {
            return (bool) $pdf->is_active;
        });

        $childrenWithPdfs = $menuItem->childrenRecursive->filter(function ($child) {
            return $child->hasBrowsableDesignContent();
        })->values();

        $pdfs = $menuItem->pdfs->filter(function ($pdf) {
            return (bool) $pdf->is_active && filled($pdf->pdf_path);
        })->values();

        return view('public.menu_designs.show', compact('menuItem', 'menuPathTitle', 'childrenWithPdfs', 'pdfs', 'mainDesign'));
    }

    private function buildMenuPathTitle(MenuItem $menuItem): string
    {
        $items = collect();
        $current = $menuItem;

        while ($current) {
            $items->prepend($this->formatMenuTitle($current->title));
            $current = $current->parent;
        }

        return $items->implode('/');
    }

    private function formatMenuTitle(string $title): string
    {
        $trimmedTitle = trim($title);

        if ($trimmedTitle === mb_strtoupper($trimmedTitle, 'UTF-8') && mb_strlen($trimmedTitle, 'UTF-8') > 6) {
            return mb_convert_case($trimmedTitle, MB_CASE_TITLE, 'UTF-8');
        }

        return $trimmedTitle;
    }
}
