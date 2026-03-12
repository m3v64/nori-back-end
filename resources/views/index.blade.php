@extends('layouts.app')

@section('title', 'Landing Page - Food Delivery App')

@section('content')
      <h2 class="page-title">Landing Page</h2>

      <!-- Hero Section -->
      <section class="section">
        <div style="background: var(--light-gray); border: 2px solid var(--black); border-radius: var(--radius); padding: var(--space-xl); text-align: center;">
          <div class="placeholder" style="width: 70%; max-width: 862px; height: 48px; margin: 0 auto var(--space-md);"></div>
          <div class="placeholder" style="width: 45%; max-width: 574px; height: 24px; margin: 0 auto var(--space-lg);"></div>
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
        <div class="placeholder" style="width: 192px; height: 24px; margin-bottom: var(--space-md);"></div>
        <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: var(--space-sm);">
          @for ($i = 0; $i < 6; $i++)
          <div class="card-bordered text-center" style="padding: var(--space-md);">
            <div class="placeholder-icon" style="margin: 0 auto var(--space-xs);"></div>
            <div class="placeholder-sm" style="width: 64px; margin: 0 auto;"></div>
          </div>
          @endfor
        </div>
      </section>

      <!-- Featured Restaurants Section -->
      <section class="section">
        <div class="placeholder" style="width: 224px; height: 24px; margin-bottom: var(--space-md);"></div>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-sm);">
          @php
            $restaurants = [
              ['w' => 'wp-70', 'sw' => 'wp-46', 'rating' => '4.5', 'time' => '25 min'],
              ['w' => 'wp-65', 'sw' => 'wp-50', 'rating' => '4.2', 'time' => '30 min'],
              ['w' => 'wp-60', 'sw' => 'wp-48', 'rating' => '4.8', 'time' => '20 min'],
              ['w' => 'wp-72', 'sw' => 'wp-44', 'rating' => '4.0', 'time' => '35 min'],
              ['w' => 'wp-68', 'sw' => 'wp-52', 'rating' => '4.6', 'time' => '15 min'],
              ['w' => 'wp-66', 'sw' => 'wp-42', 'rating' => '4.3', 'time' => '28 min'],
            ];
          @endphp
          @foreach ($restaurants as $r)
          <div class="card-bordered">
            <div class="placeholder-img"></div>
            <div class="placeholder-lg mb-xs {{ $r['w'] }}"></div>
            <div class="placeholder-sm mb-xs {{ $r['sw'] }}"></div>
            <div class="flex gap-xs">
              <span class="badge"><x-icon name="star" /> {{ $r['rating'] }}</span>
              <span class="badge"><x-icon name="clock" /> {{ $r['time'] }}</span>
            </div>
          </div>
          @endforeach
        </div>
      </section>

      <!-- Popular Dishes Section -->
      <section class="section">
        <div class="placeholder" style="width: 192px; height: 24px; margin-bottom: var(--space-md);"></div>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-sm);">
          @php
            $dishes = [
              ['w' => 'wp-70', 'sw' => 'wp-46', 'rating' => '4.7', 'time' => '22 min'],
              ['w' => 'wp-65', 'sw' => 'wp-50', 'rating' => '4.4', 'time' => '18 min'],
              ['w' => 'wp-60', 'sw' => 'wp-48', 'rating' => '4.9', 'time' => '12 min'],
            ];
          @endphp
          @foreach ($dishes as $d)
          <div class="card-bordered">
            <div class="placeholder-img"></div>
            <div class="placeholder-lg mb-xs {{ $d['w'] }}"></div>
            <div class="placeholder-sm mb-xs {{ $d['sw'] }}"></div>
            <div class="flex gap-xs">
              <span class="badge"><x-icon name="star" /> {{ $d['rating'] }}</span>
              <span class="badge"><x-icon name="clock" /> {{ $d['time'] }}</span>
            </div>
          </div>
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
