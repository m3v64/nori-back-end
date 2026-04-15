<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-white text-black font-[Inter,sans-serif] text-sm leading-relaxed">
        <div class="max-w-7xl mx-auto p-8">
            <!-- Top Bar -->
            <div class="flex items-center justify-between py-4 border-b-2 border-black">
                <div class="flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight text-black no-underline">Nori</a>
                    <nav class="flex items-center gap-2">
                        <a href="{{ route('home') }}" class="px-3 py-1.5 text-sm font-semibold no-underline {{ request()->routeIs('home') ? 'text-primary font-bold' : 'text-dark-gray hover:text-primary' }}">Home</a>
                        <a href="{{ route('menu.index') }}" class="px-3 py-1.5 text-sm font-semibold no-underline {{ request()->routeIs('menu.*') ? 'text-primary font-bold' : 'text-dark-gray hover:text-primary' }}">Menu</a>
                        <a href="{{ route('contact') }}" class="px-3 py-1.5 text-sm font-semibold no-underline {{ request()->routeIs('contact') ? 'text-primary font-bold' : 'text-dark-gray hover:text-primary' }}">Contact</a>
                    </nav>
                </div>
                <div class="flex gap-4">
                    @auth
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold text-dark-gray no-underline hover:text-primary">{{ Auth::user()->name }}</a>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold bg-primary text-white rounded hover:bg-primary-light hover:text-black no-underline">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold border-2 border-black rounded hover:bg-light-gray cursor-pointer">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold border-2 border-black rounded hover:bg-light-gray no-underline">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold bg-primary text-white rounded hover:bg-primary-light hover:text-black no-underline">Sign Up</a>
                        @endif
                    @endauth
                </div>
            </div>

            @yield('content')
        </div>
    </body>
</html>
