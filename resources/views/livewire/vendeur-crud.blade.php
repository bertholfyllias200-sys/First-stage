<div class="space-y-6">
    <!-- Formulaire -->
    <form wire:submit.prevent="store" class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">{{ $isEdit ? 'Modifier' : 'Ajouter' }} un vendeur</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label>Nom</label>
                <input wire:model="name" type="text" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label>Email</label>
                <input wire:model="email" type="email" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label>Mot de passe {{ $isEdit ? '(laisser vide si inchangé)' : '' }}</label>
                <input wire:model="password" type="password" class="w-full border rounded p-2">
            </div>
        </div>

        <div class="mt-4">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">
                {{ $isEdit ? 'Mettre à jour' : 'Créer' }}
            </button>
            @if($isEdit)
                <button wire:click="resetForm" type="button" class="ml-2 text-gray-600 underline">Annuler</button>
            @endif
        </div>
    </form>

    <!-- Liste des vendeurs -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Liste des vendeurs</h2>
        <table class="w-full table-auto text-left">
            <thead class="text-gray-600 bg-gray-50">
                <tr>
                    <th class="p-2">Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendeurs as $v)
                    <tr class="border-t">
                        <td class="p-2">{{ $v->name }}</td>
                        <td>{{ $v->email }}</td>
                        <td>
                            <button wire:click="edit({{ $v->id }})" class="text-indigo-600 hover:underline">Modifier</button>
                            <button wire:click="delete({{ $v->id }})" class="ml-2 text-red-500 hover:underline">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
