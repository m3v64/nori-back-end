@extends('layouts.wireframe')

@section('title', $dish->name . ' - Nori')

@section('content')
      <!-- Breadcrumb -->
      <div class="flex items-center gap-2 text-xs py-4">
        <a href="{{ route('menu.index') }}">Menu</a>
        <span class="text-gray-400">&rsaquo;</span>
        <span>{{ $dish->name }}</span>
      </div>

      <section class="mb-12">
        <div class="border border-medium-gray rounded p-4 bg-white max-w-3xl">
          <div class="flex gap-6">
            <div class="w-70 min-w-70 min-h-50">
              <x-placeholder-image :src="$dish->image" :alt="$dish->name" :width="280" :height="200" class="w-full h-full object-cover rounded" />
            </div>
            <div class="flex-1 flex flex-col justify-center">
              <div class="flex items-center justify-between mb-4">
                <h2 class="text-4xl font-bold">{{ $dish->name }}</h2>
                <span class="font-bold text-primary text-2xl">€{{ number_format($dish->price / 100, 2) }}</span>
              </div>

              <p class="text-dark-gray mb-1">{{ $dish->category }}</p>

              @if($dish->description)
                <p class="text-dark-gray mb-4">{{ $dish->description }}</p>
              @endif

              @if($dish->ingredients)
                <div class="mb-4">
                  <span class="font-semibold">Ingredients</span>
                  <p class="text-xs text-dark-gray">{{ $dish->ingredients }}</p>
                </div>
              @endif

              @if($dish->allergies)
                <div class="mb-4">
                  <span class="font-semibold">Allergies</span>
                  <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800">⚠ {{ $dish->allergies }}</span>
                </div>
              @endif

              @auth
                <div class="flex gap-4 mt-6">
                  <a href="{{ route('menu.edit', $dish) }}" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold border-2 border-black rounded hover:bg-light-gray no-underline text-black">Edit</a>
                  <form action="{{ route('menu.destroy', $dish) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold bg-danger text-white rounded hover:bg-red-700 cursor-pointer">Delete</button>
                  </form>
                </div>
              @endauth
            </div>
          </div>
        </div>
      </section>
@endsection
