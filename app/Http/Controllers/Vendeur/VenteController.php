<?php

namespace App\Http\Controllers\Vendeur;

use App\Http\Controllers\Controller;
use App\Models\Sale;

class VenteController extends Controller
{
    public function historique()
    {
        return view('vendeur.historique', [
            'ventes' => Sale::where('user_id', auth()->id())->latest()->get()
        ]);
    }
}