@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-white to-gray-100 flex flex-col">
    <!-- Navbar -->
    <header class="flex justify-between items-center px-6 py-4 shadow bg-white">
        <div>
            <x-logo-smartstock />
        </div>
        <nav class="space-x-4">
            <a href="{{ route('register') }}" class="text-indigo-600 font-medium hover:underline">Inscription</a>
            <a href="{{ route('login') }}" class="text-indigo-600 font-medium hover:underline">Connexion</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <main class="flex-grow flex flex-col justify-center items-center text-center px-6">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Bienvenue sur <span class="text-indigo-600">SmartStock</span></h1>
        <p class="text-gray-600 text-lg mb-6">La solution intuitive pour gérer votre stock et vos ventes en temps réel.</p>
        <div class="space-x-4">
            <a href="{{ route('register') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700 transition">Commencer</a>
            <a href="{{ route('login') }}" class="px-6 py-2 border border-indigo-600 text-indigo-600 rounded-md hover:bg-indigo-50 transition">Se connecter</a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 text-gray-500 text-sm">
        © {{ date('Y') }} SmartStock. Tous droits réservés.
    </footer>
</div>
@endsection
