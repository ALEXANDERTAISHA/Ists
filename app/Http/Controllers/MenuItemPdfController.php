<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\MenuItemPdf;
use Illuminate\Http\Request;

class MenuItemPdfController extends Controller
{
    public function store(Request $request, $menuItemId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf_file' => 'required|file|mimes:pdf|max:20480',
        ]);

        $menuItem = MenuItem::findOrFail($menuItemId);
        $pdfPath = $request->file('pdf_file')->store('menu_pdfs', 'public');

        $menuItem->pdfs()->create([
            'title' => $request->title,
            'pdf_path' => $pdfPath,
        ]);

        return back()->with('success', 'PDF agregado correctamente.');
    }

    public function destroy($menuItemId, $pdfId)
    {
        $pdf = MenuItemPdf::where('menu_item_id', $menuItemId)->findOrFail($pdfId);
        $pdf->delete();
        return back()->with('success', 'PDF eliminado correctamente.');
    }
}
