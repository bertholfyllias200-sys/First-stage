<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SmartStock') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- GSAP for animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 transition-colors duration-300">

    <x-banner />

    <!-- Dark Mode Toggle Button (top right corner) -->
    <div class="fixed top-4 right-4 z-50">
        <button @click="darkMode = !darkMode"
            class="bg-white dark:bg-gray-700 shadow px-3 py-2 rounded-full text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600 transition">
            <span x-text="darkMode ? '☀️ Light' : '🌙 Dark'"></span>
        </button>
    </div>

    <div class="min-h-screen transition-all duration-300">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div x-init="gsap.from($el, { opacity: 0, y: -30, duration: 0.8 })">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="transition-opacity duration-500" x-init="gsap.from($el, { opacity: 0, y: 20, duration: 0.6 })">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    @stack('scripts')

    @livewireScripts
</body>
</html>
