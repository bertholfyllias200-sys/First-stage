<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCrud extends Component
{
    public $name, $description, $price, $stock = 0;
    public $productId;
    public $isEdit = false;

    public $products = [];

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = Product::latest()->get();
    }

    public function render()
    {
        return view('livewire.product-crud');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'price.required' => 'Le prix est requis.',
            'stock.required' => 'Le stock est requis.',
        ]);

        Product::updateOrCreate(
            ['id' => $this->productId],
            [
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'stock' => $this->stock,
            ]
        );

        $message = $this->isEdit ? 'Produit mis à jour avec succès.' : 'Produit ajouté avec succès.';
        session()->flash('success', $message);

        $this->resetForm();
        $this->loadProducts();
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            session()->flash('error', 'Produit introuvable.');
            return;
        }

        $this->productId = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->isEdit = true;
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            session()->flash('success', 'Produit supprimé.');
        }

        $this->loadProducts();
    }

    public function resetForm()
    {
        $this->reset(['name', 'description', 'price', 'stock', 'productId', 'isEdit']);
    }
}
