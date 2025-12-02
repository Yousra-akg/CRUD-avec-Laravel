<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
<div id="app">

    <!-- NAVBAR -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button id="mobile-menu-btn" type="button"
                            class="p-2 rounded-md text-gray-500 hover:bg-gray-200">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor">
                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>

                <!-- Desktop menu -->
                <div class="hidden md:flex items-center">

                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}"
                               class="px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                {{ __('Login') }}
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                {{ __('Register') }}
                            </a>
                        @endif
                    @else

                        <!-- User info -->
                        <div class="flex items-center space-x-3">

                            <span class="text-sm text-gray-700">
                                Bonjour, {{ Auth::user()->name }}
                            </span>

                            @if (Auth::user()->is_admin)
                                <span class="px-2.5 py-0.5 text-xs bg-red-600 text-white rounded-full">
                                    Admin
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 text-xs bg-blue-600 text-white rounded-full">
                                    Auteur
                                </span>
                            @endif
                        </div>

                        <!-- Dropdown -->
                        <div class="ml-4 relative" x-data="{ open:false }">
                            <button @click="open = !open"
                                    class="flex items-center rounded-full focus:outline-none">
                                <div class="h-8 w-8 rounded-full bg-gray-500 flex items-center justify-center">
                                    <span class="text-white text-sm">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </span>
                                </div>
                                <svg class="ml-2 h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 bg-white shadow rounded-md py-1 z-50">

                                <!-- Logout -->
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>

                            </div>
                        </div>

                    @endguest
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-3">

            @guest
                <a href="{{ route('login') }}"
                   class="block px-3 py-2 text-base text-gray-700 hover:bg-gray-100 rounded-md">
                    {{ __('Login') }}
                </a>

                <a href="{{ route('register') }}"
                   class="block px-3 py-2 text-base text-gray-700 hover:bg-gray-100 rounded-md">
                    {{ __('Register') }}
                </a>
            @else
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="block px-3 py-2 text-base text-gray-700 hover:bg-gray-100 rounded-md">
                    {{ __('Logout') }}
                </a>
            @endguest

        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="py-6 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

</div>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>

<!-- Mobile menu script -->
<script>
    document.getElementById("mobile-menu-btn").addEventListener("click", function () {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    });
</script>

</body>
</html>
