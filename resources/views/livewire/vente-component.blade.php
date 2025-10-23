<div class="space-y-6">
    <form wire:submit.prevent="addToCart" class="bg-white p-6 rounded shadow dark:bg-gray-800 transition" x-init="gsap.from($el, {opacity: 0, y: 30, duration: 0.6})">
        <h2 class="text-lg font-bold mb-4 text-gray-800 dark:text-white">Nouvelle Vente</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300">Produit</label>
                <select wire:model="product_id" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white" required>
                    <option value="">-- Choisir un produit --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name }} (Stock: {{ $product->stock }}) - {{ $product->price }} FCFA
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300">Quantité</label>
                <input wire:model="quantity" type="number" min="1"
                       class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="self-end">
                <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Ajouter</button>
            </div>
        </div>
    </form>

    <div class="bg-white p-6 rounded shadow dark:bg-gray-800 transition" x-init="gsap.from($el, {opacity: 0, y: 30, duration: 0.6, delay: 0.2})">
        <h2 class="text-lg font-bold mb-4 text-gray-800 dark:text-white">Panier</h2>

        @if ($cart)
            <table class="w-full text-left table-auto">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white">
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 dark:text-gray-100">
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['price'] }} FCFA</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['total'] }} FCFA</td>
                            <td>
                                <button wire:click="removeFromCart({{ $item['id'] }})"
                                        class="text-red-500 hover:underline">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 text-right">
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">Total : {{ $this->getTotal() }} FCFA</p>
                <button wire:click="validateSale"
                        class="mt-2 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Valider la vente
                </button>
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-300">Aucun produit dans le panier.</p>
        @endif
    </div>
</div>