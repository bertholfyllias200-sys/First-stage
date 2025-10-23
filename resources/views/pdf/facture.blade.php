<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Facture de Vente</h1>
    <p>Vendeur : {{ $sale->user->name }} ({{ $sale->user->email }})</p>
    <p>Date : {{ $sale->created_at->format('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sale->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->price }} FCFA</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->total }} FCFA</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="3">Total Général</th>
                <th>{{ $sale->total }} FCFA</th>
            </tr>
        </tbody>
    </table>
</body>
</html>
