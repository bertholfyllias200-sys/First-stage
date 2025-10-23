@extends('layouts.guest')

@section('content')
    <div class="w-full max-w-md p-6 bg-white dark:bg-gray-800 shadow-xl rounded-lg"
         x-init="gsap.from($el, { opacity: 0, y: 40, duration: 0.8 })">
        <h2 class="text-2xl font-bold text-center text-indigo-600 dark:text-indigo-400 mb-6">Créer un compte</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Nom</label>
                <input id="name" type="text" name="name" required autofocus
                       class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" required
                       class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                       class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white" />
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium">Rôle</label>
                <select name="role" id="role"
                        class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">
                    <option value="vendeur">Vendeur</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="flex justify-between items-center">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded transition">
                    S'inscrire
                </button>
                <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline">
                    Déjà un compte ?
                </a>
            </div>
        </form>
    </div>
@endsection
