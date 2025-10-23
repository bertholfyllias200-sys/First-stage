<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-white dark:from-gray-900 dark:to-gray-800">
    <div
        x-data
        x-init="gsap.from($el, { opacity: 0, y: 30, duration: 0.7 })"
        class="w-full max-w-md bg-white dark:bg-gray-900 shadow-lg rounded-xl p-8 transition-all duration-300"
    >
        <!-- Logo ou titre -->
        <div class="flex justify-center mb-6">
            <a href="/">
                <svg class="h-10 w-auto text-indigo-600 dark:text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <!-- Icône stylisée du logo -->
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m4 0v-6a6 6 0 00-12 0v6" />
                </svg>
            </a>
        </div>

        <!-- Slot Livewire / Blade -->
        {{ $slot }}
    </div>
</div>
