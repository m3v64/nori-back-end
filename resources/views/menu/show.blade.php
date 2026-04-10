@extends('layouts.wireframe')

@section('title', $menu->name . ' - Nori')

@section('content')
      <!-- Breadcrumb -->
      <div class="breadcrumb">
        <a href="{{ route('menu.index') }}">Menu</a>
        <span class="breadcrumb-separator">&rsaquo;</span>
        <span>{{ $menu->name }}</span>
      </div>

      <section class="section">
        <div class="card-bordered" style="max-width: 800px;">
          <div style="display: flex; gap: var(--space-md);">
            <div style="width: 280px; min-width: 280px; min-height: 200px;">
              <x-placeholder-image :src="$menu->image" :alt="$menu->name" :width="280" :height="200" style="width: 100%; height: 100%; object-fit: cover; border-radius: var(--radius);" />
            </div>
            <div style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
              <div class="flex-between mb-sm">
                <h2>{{ $menu->name }}</h2>
                <span class="fw-bold text-primary" style="font-size: 24px;">€{{ number_format($menu->price / 100, 2) }}</span>
              </div>

              @if($menu->description)
                <p class="text-muted mb-sm">{{ $menu->description }}</p>
              @endif

              @if($menu->ingredients)
                <div class="mb-sm">
                  <span class="fw-semi">Ingredients</span>
                  <p class="text-small text-muted">{{ $menu->ingredients }}</p>
                </div>
              @endif

              @if($menu->allergies)
                <div class="mb-sm">
                  <span class="fw-semi">Allergies</span>
                  <span class="badge badge-warning">⚠ {{ $menu->allergies }}</span>
                </div>
              @endif

              @auth
                <div class="flex gap-sm" style="margin-top: var(--space-md);">
                  <a href="{{ route('menu.edit', $menu) }}" class="btn btn-secondary btn-sm">Edit</a>
                  <form action="{{ route('menu.destroy', $menu) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </div>
              @endauth
            </div>
          </div>
        </div>
      </section>
@endsection
