<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class VenteComponent extends Component
{
    public $product_id;
    public $quantity = 1;
    public $cart = [];

    public function render()
    {
        return view('livewire.vente-component', [
            'products' => Product::where('stock', '>', 0)->orderBy('name')->get(),
        ]);
    }

    public function addToCart()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ], [
            'product_id.required' => 'Sélectionnez un produit.',
            'quantity.min' => 'La quantité doit être au moins 1.',
        ]);

        $product = Product::find($this->product_id);

        if (!$product) {
            session()->flash('error', 'Produit introuvable.');
            return;
        }

        if ($product->stock < $this->quantity) {
            session()->flash('error', 'Stock insuffisant pour ce produit.');
            return;
        }

        $exists = false;

        foreach ($this->cart as &$item) {
            if ($item['id'] === $product->id) {
                $item['quantity'] += $this->quantity;
                $item['total'] = $item['quantity'] * $item['price'];
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $this->cart[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $this->quantity,
                'total' => $product->price * $this->quantity,
            ];
        }

        $this->reset(['product_id', 'quantity']);
    }

    public function removeFromCart($id)
    {
        $this->cart = array_filter($this->cart, fn ($item) => $item['id'] !== $id);
    }

    public function getTotal()
    {
        return collect($this->cart)->sum('total');
    }

    public function validateSale()
    {
        if (empty($this->cart)) {
            session()->flash('error', 'Le panier est vide.');
            return;
        }

        DB::transaction(function () {
            $sale = Sale::create([
                'user_id' => auth()->id(),
                'total' => $this->getTotal(),
            ]);

            foreach ($this->cart as $item) {
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['total'],
                ]);

                Product::where('id', $item['id'])->decrement('stock', $item['quantity']);
            }

            $this->cart = [];

            session()->flash('success', 'Vente validée avec succès.');

            redirect()->route('facture.pdf', $sale->id)->send(); // Forcer la redirection propre
        });
    }
}
