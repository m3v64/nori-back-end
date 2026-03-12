<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Food Delivery App')</title>
  @vite('resources/css/styles.css')
</head>
<body>
  <div class="page-wrapper">
    <!-- Wireframe Nav -->
    <nav class="wireframe-nav">
      <div class="nav-inner">
        <span class="nav-label">Pages:</span>
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Landing</a>
        <a href="{{ route('restaurants.index') }}" class="nav-link {{ request()->routeIs('restaurants.index') ? 'active' : '' }}">Restaurant List</a>
        <a href="{{ route('restaurants.show', 1) }}" class="nav-link {{ request()->routeIs('restaurants.show') ? 'active' : '' }}">Restaurant Detail</a>
        <a href="{{ route('cart') }}" class="nav-link {{ request()->routeIs('cart') ? 'active' : '' }}">Cart</a>
        <a href="{{ route('checkout') }}" class="nav-link {{ request()->routeIs('checkout') ? 'active' : '' }}">Checkout</a>
        <a href="{{ route('order.confirmation') }}" class="nav-link {{ request()->routeIs('order.confirmation') ? 'active' : '' }}">Order Confirm</a>
        <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
        <a href="{{ route('register') }}" class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">Register</a>
        <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a>
      </div>
    </nav>

    <div class="page-main">
      <!-- Top Bar -->
      <div class="top-bar">
        <a href="{{ route('home') }}"><div class="logo-placeholder"></div></a>
        <div class="top-bar-actions">
          <a href="{{ route('login') }}" class="btn btn-secondary btn-sm">Login</a>
          <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign Up</a>
        </div>
      </div>

      @yield('content')
    </div>
  </div>
</body>
</html>
