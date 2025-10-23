<nav x-data="{ open: false }" class="bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-6">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}">
                    <x-application-mark class="block h-9 w-auto" />
                </a>

                @auth
                    <!-- Navigation Links -->
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    @if(auth()->user()->role === 'admin')
                        <x-nav-link href="{{ route('admin.produits') }}" :active="request()->routeIs('admin.produits')">
                            Produits
                        </x-nav-link>
                        <x-nav-link href="{{ route('admin.approvisionnement') }}" :active="request()->routeIs('admin.approvisionnement')">
                            Approvisionnement
                        </x-nav-link>
                        <x-nav-link href="{{ route('admin.utilisateurs') }}" :active="request()->routeIs('admin.utilisateurs')">
                            Vendeurs
                        </x-nav-link>
                    @endif

                    @if(auth()->user()->role === 'vendeur')
                        <x-nav-link href="{{ route('vendeur.vente') }}" :active="request()->routeIs('vendeur.vente')">
                            Nouvelle Vente
                        </x-nav-link>
                        <x-nav-link href="{{ route('vendeur.historique') }}" :active="request()->routeIs('vendeur.historique')">
                            Historique
                        </x-nav-link>
                    @endif
                @endauth
            </div>

            <!-- Right side -->
            <div class="flex items-center gap-4">
                @auth
                    <span class="text-sm text-gray-600 dark:text-gray-300">
                        Rôle : <strong>{{ auth()->user()->role }}</strong>
                    </span>

                    <!-- Profile Photo -->
                    <div class="relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" />
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">
                                    Bonjour, {{ auth()->user()->name }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    Profil
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        API Tokens
                                    </x-dropdown-link>
                                @endif

                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        Déconnexion
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endauth

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-300 hover:text-gray-600 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none transition">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': ! open }"
                                  class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{ 'hidden': ! open, 'inline-flex': open }"
                                  class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="sm:hidden hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            @auth
                @if(auth()->user()->role === 'admin')
                    <x-responsive-nav-link href="{{ route('admin.produits') }}">
                        Produits
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('admin.approvisionnement') }}">
                        Approvisionnement
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('admin.utilisateurs') }}">
                        Vendeurs
                    </x-responsive-nav-link>
                @endif

                @if(auth()->user()->role === 'vendeur')
                    <x-responsive-nav-link href="{{ route('vendeur.vente') }}">
                        Vente
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('vendeur.historique') }}">
                        Historique
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        @auth
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-white">{{ auth()->user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                <div class="text-xs mt-1 text-indigo-600 dark:text-indigo-400">Rôle : {{ auth()->user()->role }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('profile.show') }}">
                    Profil
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}">
                        API Tokens
                    </x-responsive-nav-link>
                @endif

                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        Déconnexion
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
