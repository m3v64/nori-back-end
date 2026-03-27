@extends('layouts.wireframe')

@section('title', 'Restaurants - Nori')

@section('content')
      <h2 class="page-title">Restaurants</h2>

      <!-- Breadcrumb -->
      <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span class="breadcrumb-separator">&rsaquo;</span>
        <span>Restaurants</span>
      </div>

      <!-- Search Bar -->
      <div class="search-bar mb-lg" style="width: 100%;">
        <span class="search-icon"><x-icon name="search" /></span>
        <input type="text" placeholder="Search restaurants, cuisines, dishes..." style="width: 100%;">
      </div>

      <!-- Main Content: Sidebar + Listings -->
      <div class="two-col-sidebar-left">
        <!-- Left Sidebar - Filters -->
        <aside>
          <div class="card" style="position: sticky; top: 16px;">
            <h4 style="margin-bottom: var(--space-md);">Filters</h4>

            <!-- Cuisine Type -->
            <div class="mb-lg">
              <h5 style="margin-bottom: var(--space-sm);">Cuisine</h5>
              <div class="flex-col gap-xs">
                <label class="check-group"><input type="checkbox"> Japanese</label>
                <label class="check-group"><input type="checkbox"> Sushi</label>
                <label class="check-group"><input type="checkbox"> Hawaiian Fusion</label>
                <label class="check-group"><input type="checkbox"> Izakaya</label>
                <label class="check-group"><input type="checkbox"> Vegan</label>
              </div>
            </div>

            <!-- Rating -->
            <div class="mb-lg">
              <h5 style="margin-bottom: var(--space-sm);">Rating</h5>
              <div class="flex-col gap-xs">
                <label class="check-group"><input type="checkbox"> 4+ Stars</label>
                <label class="check-group"><input type="checkbox"> 3+ Stars</label>
              </div>
            </div>

            <!-- Delivery Fee -->
            <div>
              <h5 style="margin-bottom: var(--space-sm);">Delivery Fee</h5>
              <div class="flex-col gap-xs">
                <label class="check-group"><input type="checkbox"> Free</label>
                <label class="check-group"><input type="checkbox"> Under €3</label>
                <label class="check-group"><input type="checkbox"> Under €5</label>
              </div>
            </div>
          </div>
        </aside>

        <!-- Right Content - Restaurant Cards -->
        <div>
          <!-- Results Header -->
          <div class="flex-between mb-md">
            <span class="body-large fw-semi">{{ $restaurants->count() }} restaurants</span>
            <div class="flex gap-sm" style="align-items: center;">
              <span class="text-small text-muted">Sort by</span>
              <select class="form-select" style="width: 192px;">
                <option>Rating</option>
                <option>Delivery Time</option>
                <option>Price</option>
              </select>
            </div>
          </div>

          <!-- Restaurant Cards -->
          <div class="flex-col gap-sm">
            @foreach ($restaurants as $restaurant)
            <a href="{{ route('restaurants.show', $restaurant) }}" class="card-bordered flex" style="gap: var(--space-sm); overflow: hidden; padding: 0; text-decoration: none; color: inherit;">
              <div style="width: 256px; min-width: 256px; min-height: 192px;">
                <x-placeholder-image :src="$restaurant->image" :alt="$restaurant->name" style="width: 100%; height: 100%; object-fit: cover;" />
              </div>
              <div style="padding: var(--space-sm); flex: 1; display: flex; flex-direction: column; justify-content: center;">
                <div class="flex-between mb-xs">
                  <h5>{{ $restaurant->name }}</h5>
                  <span class="badge badge-primary"><x-icon name="star" /> {{ $restaurant->rating }}</span>
                </div>
                <p class="text-small text-muted mb-sm">{{ $restaurant->description }}</p>
                <div class="flex gap-xs mb-sm">
                  <span class="badge">{{ $restaurant->food_type }}</span>
                  <span class="badge"><x-icon name="map-pin" /> {{ $restaurant->location }}</span>
                </div>
                <div class="flex gap-xs mb-sm">
                  <span class="badge {{ $restaurant->delivery_fee === 0 ? 'badge-success' : '' }}" style="font-size: 11px;">
                    {{ $restaurant->delivery_fee ? '€'.number_format($restaurant->delivery_fee / 100, 2).' Delivery' : 'Free Delivery' }}
                  </span>
                  <span class="badge" style="font-size: 11px;"><x-icon name="clock" /> {{ $restaurant->delivery_minutes }} min</span>
                  <span class="badge" style="font-size: 11px;">{{ $restaurant->reviews_count }} reviews</span>
                </div>
                <div class="flex-between" style="align-items: flex-end;">
                  @if($restaurant->tags)
                    <div class="flex gap-xs">
                      @foreach (array_slice(explode(',', $restaurant->tags), 0, 3) as $tag)
                        <span class="text-small text-muted">{{ trim($tag) }}</span>
                      @endforeach
                    </div>
                  @endif
                  <span class="btn btn-primary btn-sm">View Menu</span>
                </div>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
@endsection
