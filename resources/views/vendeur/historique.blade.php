<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800">Historique des ventes</h2>
    </x-slot>

    <div class="p-6 bg-white rounded shadow">
        @if($sales->isEmpty())
            <p class="text-gray-600">Aucune vente effectuée pour le moment.</p>
        @else
            <table class="w-full text-left table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr class="border-t">
                            <td>{{ $sale->id }}</td>
                            <td>{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $sale->total }} FCFA</td>
                            <td>
                                <a href="{{ route('facture.pdf', $sale->id) }}"
                                   class="text-indigo-600 hover:underline"
                                   target="_blank">Télécharger la facture</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
