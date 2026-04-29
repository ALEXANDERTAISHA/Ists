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
            'pdf_file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $menuItem = MenuItem::findOrFail($menuItemId);
        $pdfPath = $request->file('pdf_file')->store('menu_pdfs', 'public');

        $menuItem->pdfs()->create([
            'title' => $request->title,
            'pdf_path' => $pdfPath,
        ]);

        return back()->with('success', 'Documento agregado correctamente.');
    }

    public function update(Request $request, $menuItemId, $pdfId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $pdf = MenuItemPdf::where('menu_item_id', $menuItemId)->findOrFail($pdfId);
        $pdf->title = $request->title;
        $pdf->save();

        return back()->with('success', 'Nombre del documento actualizado correctamente.');
    }

    public function destroy($menuItemId, $pdfId)
    {
        $pdf = MenuItemPdf::where('menu_item_id', $menuItemId)->findOrFail($pdfId);
        $pdf->delete();
        return back()->with('success', 'Documento eliminado correctamente.');
    }
}
