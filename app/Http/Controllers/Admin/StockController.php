<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockMovement;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return view('admin.stock.index', [
            'movements' => StockMovement::latest()->with('product')->get(),
        ]);
    }
}
