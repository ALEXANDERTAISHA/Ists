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

        $mainDesign = $menuItem->pdfs->first(function ($pdf) {
            return (bool) $pdf->is_active;
        });

        $childrenWithPdfs = $menuItem->childrenRecursive->filter(function ($child) {
            return $child->hasBrowsableDesignContent();
        })->values();

        $pdfs = $menuItem->pdfs->filter(function ($pdf) {
            return (bool) $pdf->is_active && filled($pdf->pdf_path);
        })->values();

        return view('public.menu_designs.show', compact('menuItem', 'childrenWithPdfs', 'pdfs', 'mainDesign'));
    }
}
