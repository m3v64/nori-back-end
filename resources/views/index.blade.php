@use('App\Models\Dish')

@extends('layouts.wireframe')

@section('title', 'Nori - Japanese Restaurant')

@php
    $featuredDishes = Dish::take(3)->get();
    $categories = Dish::distinct()->pluck('category');
@endphp

@section('content')
      <h2 class="text-3xl font-bold mb-8 pb-4 border-b-2 border-medium-gray">Welcome to Nori</h2>

      <!-- Hero Section -->
      <section class="mb-12">
        <div class="bg-light-gray border-2 border-black rounded p-12 text-center">
          <h1 class="text-5xl font-bold mb-6">Authentic Japanese Cuisine</h1>
          <p class="text-base text-dark-gray mb-8">From ramen to sushi, experience the finest Japanese flavors in Amsterdam.</p>
          <div class="flex items-center justify-center gap-4">
            <a href="{{ route('menu.index') }}" class="inline-flex items-center justify-center h-14 px-8 text-lg font-semibold bg-primary text-white rounded hover:bg-primary-light hover:text-black no-underline">View Our Menu</a>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center h-14 px-8 text-lg font-semibold border-2 border-black rounded hover:bg-light-gray no-underline text-black">Contact Us</a>
          </div>
        </div>
      </section>

      <!-- Categories Section -->
      <section class="mb-12">
        <h4 class="text-2xl font-bold mb-6">Our Cuisine</h4>
        @php
          $categoryIcons = [
              'Ramen' => 'bowl',
              'Sushi' => 'fish',
              'Appetizers' => 'salad',
              'Main Dishes' => 'flame',
              'Sides' => 'leaf',
              'Desserts' => 'cake',
          ];
        @endphp
        <div class="flex flex-wrap gap-3">
          @foreach ($categories as $category)
          <a href="{{ route('menu.index') }}#{{ Str::slug($category) }}" class="inline-flex items-center gap-2 border border-medium-gray rounded-full px-5 py-2 no-underline text-inherit bg-white hover:bg-light-gray">
            <x-icon :name="$categoryIcons[$category] ?? 'utensils'" class="w-4 h-4 text-primary" />
            <span class="text-sm font-semibold">{{ $category }}</span>
          </a>
          @endforeach
        </div>
      </section>

      <!-- Featured Dishes Section -->
      <section class="mb-12">
        <div class="flex items-center justify-between mb-6">
          <h4 class="text-2xl font-bold">Featured Dishes</h4>
          <a href="{{ route('menu.index') }}" class="text-primary font-semibold hover:underline">View All →</a>
        </div>
        <div class="grid grid-cols-3 gap-4">
          @foreach ($featuredDishes as $dish)
          <a href="{{ route('menu.show', $dish) }}" class="border border-medium-gray rounded p-4 no-underline text-inherit bg-white hover:bg-light-gray">
            <x-placeholder-image :src="$dish->image" :alt="$dish->name" class="w-full rounded mb-4" />
            <h5 class="text-xl font-semibold mb-1">{{ $dish->name }}</h5>
            <p class="text-xs text-dark-gray mb-1">{{ $dish->category }}</p>
            <div class="flex items-center justify-between">
              <span class="font-bold text-primary">€{{ number_format($dish->price / 100, 2) }}</span>
              @if($dish->allergies)
                <span class="inline-flex items-center px-3 py-1 text-[11px] font-semibold rounded-full bg-amber-100 text-amber-800">⚠ {{ $dish->allergies }}</span>
              @endif
            </div>
          </a>
          @endforeach
        </div>
      </section>

      <!-- About Section -->
      <section class="mb-12">
        <div class="border-2 border-black rounded text-center p-12">
          <h3 class="text-3xl font-bold mb-6">About Nori</h3>
          <p class="text-base text-dark-gray max-w-xl mx-auto mb-6">
            Located in the heart of Amsterdam, Nori brings you authentic Japanese cuisine crafted with the freshest ingredients.
            Our chefs combine traditional techniques with modern creativity to deliver an unforgettable dining experience.
          </p>
          <a href="{{ route('contact') }}" class="inline-flex items-center justify-center h-11 px-6 text-base font-semibold border-2 border-black rounded hover:bg-light-gray no-underline text-black">Get in Touch</a>
        </div>
      </section>

      <!-- Footer -->
      <footer class="bg-light-gray border-t-2 border-black pt-8 mt-12">
        <div class="grid grid-cols-4 gap-8 max-w-7xl mx-auto px-8">
          <div class="flex flex-col gap-2">
            <h5 class="text-xl font-semibold mb-4">Nori</h5>
            <a href="{{ route('home') }}" class="text-xs text-dark-gray">Home</a>
            <a href="{{ route('menu.index') }}" class="text-xs text-dark-gray">Menu</a>
            <a href="{{ route('contact') }}" class="text-xs text-dark-gray">Contact</a>
          </div>
          <div class="flex flex-col gap-2">
            <h5 class="text-xl font-semibold mb-4">Hours</h5>
            <span class="text-xs text-dark-gray">Mon-Fri: 11:00-22:00</span>
            <span class="text-xs text-dark-gray">Sat-Sun: 12:00-23:00</span>
          </div>
          <div class="flex flex-col gap-2">
            <h5 class="text-xl font-semibold mb-4">Location</h5>
            <span class="text-xs text-dark-gray">Amsterdam Centrum</span>
            <span class="text-xs text-dark-gray">Netherlands</span>
          </div>
          <div class="flex flex-col gap-2">
            <h5 class="text-xl font-semibold mb-4">Follow Us</h5>
            <a href="#" class="text-xs text-dark-gray">Instagram</a>
            <a href="#" class="text-xs text-dark-gray">Facebook</a>
          </div>
        </div>
      </footer>
@endsection
