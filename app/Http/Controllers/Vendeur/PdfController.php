<?php

namespace App\Http\Controllers\Vendeur;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function facture($id)
    {
        $sale = Sale::with('items.product')->findOrFail($id);

        $pdf = Pdf::loadView('pdf.facture', compact('sale'));
        return $pdf->download('facture_vente_'.$sale->id.'.pdf');
    }
}