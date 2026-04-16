@extends('layouts.wireframe')

@section('title', 'Menu - Nori')

@section('content')
      <h2 class="text-3xl font-bold pb-4 border-b-2 border-medium-gray">Our Menu</h2>

      <div class="flex items-center gap-2 text-xs py-4">
        <a href="{{ route('home') }}">Home</a>
        <span class="text-gray-400">&rsaquo;</span>
        <span>Menu</span>
      </div>

      @auth
        <div class="mb-6">
          <a href="{{ route('menu.create') }}" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold bg-primary text-white rounded hover:bg-primary-light hover:text-black no-underline">+ Add Dish</a>
        </div>
      @endauth

      @if($dishes->isEmpty())
        <div class="border border-medium-gray rounded p-12 text-center bg-white">
          <p class="text-dark-gray">No dishes on the menu yet.</p>
        </div>
      @else
        @foreach ($categories as $category => $categoryDishes)
        <section id="{{ Str::slug($category) }}" class="mb-12">
          <h3 class="text-3xl font-bold mb-6">{{ $category }}</h3>
          <div class="flex flex-col gap-4">
            @foreach ($categoryDishes as $dish)
            <div class="flex border border-medium-gray rounded overflow-hidden bg-white">
              <a href="{{ route('menu.show', $dish) }}" class="w-40 min-w-40 min-h-32 no-underline">
                <x-placeholder-image :src="$dish->image" :alt="$dish->name" :width="160" :height="128" class="w-full h-full object-cover text-center" />
              </a>
              <div class="flex-1 flex flex-col justify-center p-4">
                <div class="flex items-center justify-between mb-1">
                  <a href="{{ route('menu.show', $dish) }}" class="no-underline text-inherit hover:underline">
                    <h5 class="text-xl font-semibold">{{ $dish->name }}</h5>
                  </a>
                  <span class="font-bold text-primary text-lg">{{ $dish->formattedPrice() }}</span>
                </div>
                @if($dish->description)
                  <p class="text-xs text-dark-gray mb-1">{{ $dish->description }}</p>
                @endif
                <div class="flex flex-wrap gap-2">
                  @if($dish->ingredients)
                    <span class="text-xs text-dark-gray">{{ $dish->ingredients }}</span>
                  @endif
                  @if($dish->allergies)
                    <span class="inline-flex items-center px-3 py-1 text-[11px] font-semibold rounded-full bg-amber-100 text-amber-800">⚠ {{ $dish->allergies }}</span>
                  @endif
                </div>
                @auth
                  <div class="flex justify-end gap-3 mt-3">
                    <a href="{{ route('menu.edit', $dish) }}" class="inline-flex items-center justify-center h-7 px-3 text-xs font-semibold border-2 border-black rounded hover:bg-light-gray no-underline text-black">Edit</a>
                    <form action="{{ route('menu.destroy', $dish) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="inline-flex items-center justify-center h-7 px-3 text-xs font-semibold bg-danger text-white rounded hover:bg-red-700 cursor-pointer">Delete</button>
                    </form>
                  </div>
                @endauth
              </div>
            </div>
            @endforeach
          </div>
        </section>
        @endforeach
      @endif
@endsection
