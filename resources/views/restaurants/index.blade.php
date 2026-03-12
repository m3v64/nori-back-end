@extends('layouts.app')

@section('title', 'Restaurant Listing - Food Delivery App')

@section('content')
      <h2 class="page-title">Restaurant Listing Page</h2>

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
                <label class="check-group"><input type="checkbox"> Italian</label>
                <label class="check-group"><input type="checkbox"> Chinese</label>
                <label class="check-group"><input type="checkbox"> Mexican</label>
                <label class="check-group"><input type="checkbox"> Indian</label>
              </div>
            </div>

            <!-- Dietary -->
            <div class="mb-lg">
              <h5 style="margin-bottom: var(--space-sm);">Dietary</h5>
              <div class="flex-col gap-xs">
                <label class="check-group"><input type="checkbox"> Vegetarian</label>
                <label class="check-group"><input type="checkbox"> Vegan</label>
                <label class="check-group"><input type="checkbox"> Gluten-Free</label>
                <label class="check-group"><input type="checkbox"> Halal</label>
                <label class="check-group"><input type="checkbox"> Kosher</label>
              </div>
            </div>

            <!-- Rating -->
            <div class="mb-lg">
              <h5 style="margin-bottom: var(--space-sm);">Rating</h5>
              <div class="flex-col gap-xs">
                <label class="check-group"><input type="checkbox"> 4+ Stars</label>
                <label class="check-group"><input type="checkbox"> 3+ Stars</label>
                <label class="check-group"><input type="checkbox"> 2+ Stars</label>
              </div>
            </div>

            <!-- Delivery Fee -->
            <div>
              <h5 style="margin-bottom: var(--space-sm);">Delivery Fee</h5>
              <div class="flex-col gap-xs">
                <label class="check-group"><input type="checkbox"> Free</label>
                <label class="check-group"><input type="checkbox"> Under $3</label>
                <label class="check-group"><input type="checkbox"> Under $5</label>
              </div>
            </div>
          </div>
        </aside>

        <!-- Right Content - Restaurant Cards -->
        <div>
          <!-- Results Header -->
          <div class="flex-between mb-md">
            <span class="body-large fw-semi">234 restaurants</span>
            <div class="flex gap-sm" style="align-items: center;">
              <span class="text-small text-muted">Sort by</span>
              <select class="form-select" style="width: 192px;">
                <option>Recommended</option>
                <option>Rating</option>
                <option>Delivery Time</option>
                <option>Price</option>
              </select>
            </div>
          </div>

          <!-- Restaurant Cards -->
          <div class="flex-col gap-sm">
            @php
              $cards = [
                ['nw' => 'w-192', 'dw' => 'wp-80', 'rating' => '4.5', 'tags' => ['Italian', 'Pizza', '$$'], 'delivery' => 'Free Delivery', 'delivery_class' => 'badge-success', 'time' => '30 min'],
                ['nw' => 'w-180', 'dw' => 'wp-75', 'rating' => '4.2', 'tags' => ['Chinese', 'Noodles', '$'], 'delivery' => '$2.99 Delivery', 'delivery_class' => '', 'time' => '25 min'],
                ['nw' => 'w-200', 'dw' => 'wp-70', 'rating' => '4.8', 'tags' => ['Mexican', 'Tacos', '$$'], 'delivery' => 'Free Delivery', 'delivery_class' => 'badge-success', 'time' => '20 min'],
                ['nw' => 'w-170', 'dw' => 'wp-65', 'rating' => '4.0', 'tags' => ['Indian', 'Curry', '$$'], 'delivery' => '$1.99 Delivery', 'delivery_class' => '', 'time' => '35 min'],
                ['nw' => 'w-190', 'dw' => 'wp-72', 'rating' => '4.6', 'tags' => ['Japanese', 'Sushi', '$$$'], 'delivery' => 'Free Delivery', 'delivery_class' => 'badge-success', 'time' => '40 min'],
                ['nw' => 'w-185', 'dw' => 'wp-68', 'rating' => '4.3', 'tags' => ['American', 'Burgers', '$'], 'delivery' => '$3.99 Delivery', 'delivery_class' => '', 'time' => '15 min'],
                ['nw' => 'w-175', 'dw' => 'wp-78', 'rating' => '4.7', 'tags' => ['Thai', 'Pan-Asian', '$$'], 'delivery' => 'Free Delivery', 'delivery_class' => 'badge-success', 'time' => '28 min'],
                ['nw' => 'w-195', 'dw' => 'wp-60', 'rating' => '4.1', 'tags' => ['Mediterranean', 'Healthy', '$$'], 'delivery' => '$2.49 Delivery', 'delivery_class' => '', 'time' => '32 min'],
              ];
            @endphp

            @foreach ($cards as $card)
            <div class="card-bordered flex" style="gap: var(--space-sm); overflow: hidden; padding: 0;">
              <div style="width: 256px; min-width: 256px; min-height: 192px; background: var(--medium-gray);"></div>
              <div style="padding: var(--space-sm); flex: 1; display: flex; flex-direction: column; justify-content: center;">
                <div class="flex-between mb-xs">
                  <div class="placeholder-lg {{ $card['nw'] }}"></div>
                  <span class="badge badge-primary"><x-icon name="star" /> {{ $card['rating'] }}</span>
                </div>
                <div class="placeholder-sm mb-sm {{ $card['dw'] }}"></div>
                <div class="flex gap-xs mb-sm">
                  @foreach ($card['tags'] as $tag)
                  <span class="badge">{{ $tag }}</span>
                  @endforeach
                </div>
                <div class="flex gap-xs mb-sm">
                  <span class="badge {{ $card['delivery_class'] }}" style="font-size: 11px;">{{ $card['delivery'] }}</span>
                  <span class="badge" style="font-size: 11px;">{{ $card['time'] }}</span>
                </div>
                <div class="flex-between" style="align-items: flex-end;">
                  <div class="placeholder-sm" style="width: 128px;"></div>
                  <a href="{{ route('restaurants.show', 1) }}" class="btn btn-primary btn-sm">View Menu</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>

          <!-- Pagination -->
          <div class="pagination">
            <button class="page-btn">&larr;</button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn">4</button>
            <button class="page-btn">&rarr;</button>
          </div>
        </div>
      </div>
@endsection
