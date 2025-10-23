@extends('layouts.guest')

@section('content')
    <div class="w-full max-w-md p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-center text-indigo-600 dark:text-indigo-400 mb-6">Connexion</h2>

        <!-- Formulaire ici -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" required autofocus
                       class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Mot de passe</label>
                <input id="password" type="password" name="password" required
                       class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white" />
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium">Rôle</label>
                <select name="role" id="role" class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">
                    <option value="vendeur">Vendeur</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="flex justify-between items-center">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded transition">
                    Se connecter
                </button>
                <a href="{{ route('register') }}" class="text-sm text-indigo-600 hover:underline">Créer un compte</a>
            </div>
        </form>
    </div>
@endsection
