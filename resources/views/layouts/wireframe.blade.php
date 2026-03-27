<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Scripts -->
        @vite(['resources/css/styles.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="page-wrapper">
            <!-- Top Bar -->
            <div class="page-main">
                <div class="top-bar">
                    <div class="flex gap-lg" style="align-items: center;">
                        <a href="{{ route('home') }}" style="text-decoration: none; color: var(--black);">
                            <span style="font-size: 1.5rem; font-weight: 800; letter-spacing: -0.5px;">Nori</span>
                        </a>
                        <nav class="flex gap-sm" style="align-items: center;">
                            <a href="{{ route('home') }}" class="btn btn-text btn-sm" style="padding: 6px 12px; {{ request()->routeIs('home') ? 'color: var(--primary); font-weight: 700;' : 'color: var(--dark-gray);' }}">Home</a>
                            <a href="{{ route('restaurants.index') }}" class="btn btn-text btn-sm" style="padding: 6px 12px; {{ request()->routeIs('restaurants.*') ? 'color: var(--primary); font-weight: 700;' : 'color: var(--dark-gray);' }}">Restaurants</a>
                            <a href="{{ route('cart') }}" class="btn btn-text btn-sm" style="padding: 6px 12px; {{ request()->routeIs('cart') ? 'color: var(--primary); font-weight: 700;' : 'color: var(--dark-gray);' }}">Cart</a>
                        </nav>
                    </div>
                    <div class="top-bar-actions">
                        @auth
                            <a href="{{ route('profile.edit') }}" class="btn btn-text btn-sm" style="color: var(--dark-gray);">{{ Auth::user()->name }}</a>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-secondary btn-sm">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign Up</a>
                            @endif
                        @endauth
                    </div>
                </div>

                @yield('content')
            </div>
        </div>
    </body>
</html>
