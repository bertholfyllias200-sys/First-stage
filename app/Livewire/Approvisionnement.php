<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\StockMovement;
use Livewire\Component;

class Approvisionnement extends Component
{
    public $product_id, $quantity, $note;
    public $products = [];
    public $mouvements = [];

    public function mount()
    {
        $this->products = Product::all();
        $this->mouvements = StockMovement::with('product')->latest()->get();
    }

    public function render()
    {
        return view('livewire.approvisionnement');
    }

    public function approvisionner()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ], [
            'product_id.required' => 'Veuillez sélectionner un produit.',
            'quantity.required' => 'Quantité requise.',
            'quantity.min' => 'Quantité minimale : 1.',
        ]);

        Product::find($this->product_id)->increment('stock', $this->quantity);

        StockMovement::create([
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'type' => 'in',
            'note' => $this->note,
        ]);

        $this->reset(['product_id', 'quantity', 'note']);
        $this->mouvements = StockMovement::with('product')->latest()->get();

        session()->flash('success', 'Stock ajouté avec succès.');
    }
}
