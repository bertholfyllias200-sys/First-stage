<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generate($id)
    {
        $sale = Sale::with('items.product', 'user')->findOrFail($id);
        $pdf = Pdf::loadView('pdf.facture', compact('sale'));

        return $pdf->download('facture_vente_' . $sale->id . '.pdf');
    }
}
