<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
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

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind & App -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 font-sans antialiased transition-colors duration-300">

    <!-- Dark Mode Switch -->
    <div class="fixed top-4 right-4 z-50">
        <button @click="darkMode = !darkMode"
                class="bg-white dark:bg-gray-700 shadow px-3 py-2 rounded-full text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600 transition">
            <span x-text="darkMode ? '☀️ Light' : '🌙 Dark'"></span>
        </button>
    </div>

    <!-- Page Content -->
    <main class="min-h-screen flex items-center justify-center px-4"
          x-init="gsap.from($el, { opacity: 0, y: 30, duration: 0.8 })">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
