<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800">Gestion des vendeurs</h2>
    </x-slot>

    <div class="p-6">
        @livewire('vendeur-crud')
    </div>
     <div class="p-6">
        @livewire('product-crud')
    </div>
        <div class="p-6">
        @livewire('approvisionnement')
    </div>
</x-app-layout>

