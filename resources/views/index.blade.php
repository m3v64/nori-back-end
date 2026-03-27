@extends('layouts.wireframe')

@section('title', 'Nori - Japanese Food Delivery')

@section('content')
      <h2 class="page-title">Discover Japanese Cuisine</h2>

      <!-- Hero Section -->
      <section class="section">
        <div style="background: var(--light-gray); border: 2px solid var(--black); border-radius: var(--radius); padding: var(--space-xl); text-align: center;">
          <h1 style="margin-bottom: var(--space-md);">Delicious Japanese Food, Delivered</h1>
          <p class="body-large" style="margin-bottom: var(--space-lg); color: var(--dark-gray);">From ramen to sushi, discover the best Japanese restaurants near you.</p>
          <!-- Search Bar -->
          <div style="max-width: 672px; margin: 0 auto;">
            <div class="search-bar" style="height: 56px;">
              <span class="search-icon"><x-icon name="search" /></span>
              <input type="text" placeholder="Search for restaurants, cuisines, or dishes...">
              <button class="search-btn">Search</button>
            </div>
          </div>
        </div>
      </section>

      <!-- Categories Section -->
      <section class="section">
        <h4 style="margin-bottom: var(--space-md);">Browse by Category</h4>
        <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: var(--space-sm);">
          @php
            $categories = [
              ['name' => 'Ramen', 'icon' => 'bowl'],
              ['name' => 'Sushi', 'icon' => 'fish'],
              ['name' => 'Poke Bowls', 'icon' => 'salad'],
              ['name' => 'Tempura', 'icon' => 'utensils'],
              ['name' => 'Izakaya', 'icon' => 'sake'],
              ['name' => 'Vegan', 'icon' => 'leaf'],
            ];
          @endphp
          @foreach ($categories as $category)
          <a href="{{ route('restaurants.index') }}" class="card-bordered text-center" style="padding: var(--space-md); text-decoration: none; color: inherit;">
            <div style="font-size: 24px; margin-bottom: var(--space-xs); color: var(--primary);"><x-icon :name="$category['icon']" /></div>
            <div class="fw-semi" style="font-size: 14px;">{{ $category['name'] }}</div>
          </a>
          @endforeach
        </div>
      </section>

      <!-- Featured Restaurants Section -->
      <section class="section">
        <div class="flex-between" style="margin-bottom: var(--space-md);">
          <h4>Featured Restaurants</h4>
          <a href="{{ route('restaurants.index') }}" class="btn btn-text">View All →</a>
        </div>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-sm);">
          @foreach ($featuredRestaurants as $restaurant)
          <a href="{{ route('restaurants.show', $restaurant) }}" class="card-bordered" style="text-decoration: none; color: inherit;">
            <x-placeholder-image :src="$restaurant->image" :alt="$restaurant->name" class="card-img" />
            <h5 class="mb-xs">{{ $restaurant->name }}</h5>
            <p class="caption text-muted mb-xs">{{ $restaurant->food_type }} · {{ $restaurant->location }}</p>
            <div class="flex gap-xs">
              <span class="badge"><x-icon name="star" /> {{ $restaurant->rating }}</span>
              <span class="badge"><x-icon name="clock" /> {{ $restaurant->delivery_minutes }} min</span>
              <span class="badge">{{ $restaurant->delivery_fee ? '€'.number_format($restaurant->delivery_fee / 100, 2) : 'Free delivery' }}</span>
            </div>
          </a>
          @endforeach
        </div>
      </section>

      <!-- Popular Dishes Section -->
      <section class="section">
        <h4 style="margin-bottom: var(--space-md);">Popular Dishes</h4>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-sm);">
          @foreach ($popularDishes as $dish)
          <a href="{{ route('restaurants.show', $dish->restaurant) }}" class="card-bordered" style="text-decoration: none; color: inherit;">
            <x-placeholder-image :src="$dish->image" :alt="$dish->name" class="card-img" />
            <h5 class="mb-xs">{{ $dish->name }}</h5>
            <p class="caption text-muted mb-xs">{{ $dish->restaurant->name }}</p>
            <div class="flex-between">
              <span class="fw-bold text-primary">{{ $dish->formatted_price }}</span>
              <span class="badge"><x-icon name="star" /> {{ $dish->restaurant->rating }}</span>
            </div>
          </a>
          @endforeach
        </div>
      </section>

      <!-- Footer -->
      <footer class="footer">
        <div class="footer-grid">
          <div class="footer-col">
            <h5>Company</h5>
            <a href="#">About Us</a>
            <a href="#">Careers</a>
          </div>
          <div class="footer-col">
            <h5>Support</h5>
            <a href="#">Help Center</a>
            <a href="#">Contact Us</a>
          </div>
          <div class="footer-col">
            <h5>Legal</h5>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
          </div>
          <div class="footer-col">
            <h5>Follow Us</h5>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
          </div>
        </div>
      </footer>
@endsection
