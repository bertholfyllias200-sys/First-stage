<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.produits.index', [
            'products' => Product::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($data);

        return back()->with('success', 'Produit ajouté');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Produit supprimé');
    }
}
