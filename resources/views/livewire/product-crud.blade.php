<div class="space-y-6">
    <form wire:submit.prevent="store" class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">{{ $isEdit ? 'Modifier' : 'Ajouter' }} un produit</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input wire:model="name" type="text" class="w-full border p-2" placeholder="Nom" required>
            <input wire:model="price" type="number" class="w-full border p-2" placeholder="Prix" step="0.01" required>
            <input wire:model="stock" type="number" class="w-full border p-2" placeholder="Stock initial" required>
            <textarea wire:model="description" class="w-full border p-2 md:col-span-2" placeholder="Description..."></textarea>
        </div>

        <div class="mt-4">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                {{ $isEdit ? 'Mettre à jour' : 'Créer' }}
            </button>
            @if($isEdit)
                <button wire:click="resetForm" type="button" class="ml-2 text-gray-600 underline">Annuler</button>
            @endif
        </div>
    </form>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Produits en stock</h2>
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->price }} FCFA</td>
                        <td>{{ $p->stock }}</td>
                        <td>
                            <button wire:click="edit({{ $p->id }})" class="text-indigo-600 hover:underline">Modifier</button>
                            <button wire:click="delete({{ $p->id }})" class="text-red-600 hover:underline ml-2">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
