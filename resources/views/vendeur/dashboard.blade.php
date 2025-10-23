<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-white tracking-wide" x-init="gsap.from($el, { opacity: 0, x: -20, duration: 0.8 })">
            Créer une vente
        </h2>
    </x-slot>

    <div class="p-6 space-y-10">
        <!-- Composant Livewire : Formulaire de vente -->
        <div
            class="bg-white dark:bg-gray-800 shadow rounded-xl p-6 transition duration-500"
            x-init="gsap.from($el, { opacity: 0, y: 30, duration: 0.8, delay: 0.2 })"
        >
            @livewire('vente-component')
        </div>

        <!-- Composant Livewire : Graphique des ventes -->
        <div
            class="bg-white dark:bg-gray-800 shadow rounded-xl p-6 transition duration-500"
            x-init="gsap.from($el, { opacity: 0, y: 30, duration: 0.8, delay: 0.4 })"
        >
            <h3 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-200">Statistiques de ventes</h3>
            @livewire('vente-chart')
        </div>
    </div>
</x-app-layout>


