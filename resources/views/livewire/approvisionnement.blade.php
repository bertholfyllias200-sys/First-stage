<div class="space-y-6">
    <form wire:submit.prevent="approvisionner" class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Approvisionnement</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <select wire:model="product_id" class="w-full border p-2" required>
                <option value="">-- Produit --</option>
                @foreach ($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>

            <input wire:model="quantity" type="number" min="1" class="w-full border p-2" placeholder="Quantité" required>

            <input wire:model="note" type="text" class="w-full border p-2" placeholder="Note (optionnel)">
        </div>

        <div class="mt-4">
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Approvisionner</button>
        </div>
    </form>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Historique des approvisionnements</h2>

        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Note</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mouvements as $m)
                    <tr>
                        <td>{{ $m->product->name }}</td>
                        <td>+{{ $m->quantity }}</td>
                        <td>{{ $m->note ?? '-' }}</td>
                        <td>{{ $m->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
