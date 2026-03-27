@extends('layouts.wireframe')

@section('title', $restaurant->name . ' - Nori')

@section('content')
      <!-- Breadcrumb -->
      <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span class="breadcrumb-separator">&rsaquo;</span>
        <a href="{{ route('restaurants.index') }}">Restaurants</a>
        <span class="breadcrumb-separator">&rsaquo;</span>
        <span>{{ $restaurant->name }}</span>
      </div>

      <!-- Restaurant Hero -->
      <section class="section">
        <div style="border: 2px solid var(--black); border-radius: var(--radius); overflow: hidden;">
          <x-placeholder-image :src="$restaurant->image" :alt="$restaurant->name" :width="1280" :height="350" />
          <div style="padding: var(--space-md);">
            <div class="flex-between mb-sm">
              <div>
                <h2 style="margin-bottom: var(--space-xs);">{{ $restaurant->name }}</h2>
                <p class="body-large text-muted">{{ $restaurant->food_type }} · {{ $restaurant->location }}</p>
              </div>
              <div class="flex gap-sm" style="align-items: flex-start;">
                <span class="badge badge-primary" style="font-size: 16px; padding: 8px 16px;">
                  <x-icon name="star" /> {{ $restaurant->rating }}
                </span>
              </div>
            </div>
            <p class="mb-sm">{{ $restaurant->description }}</p>
            <div class="flex gap-sm">
              <span class="badge"><x-icon name="clock" /> {{ $restaurant->delivery_minutes }} min delivery</span>
              <span class="badge {{ $restaurant->delivery_fee === 0 ? 'badge-success' : '' }}">
                {{ $restaurant->delivery_fee ? '€' . number_format($restaurant->delivery_fee / 100, 2) . ' Delivery Fee' : 'Free Delivery' }}
              </span>
              <span class="badge">{{ $restaurant->reviews->count() }} reviews</span>
              @if($restaurant->tags)
                @foreach (explode(',', $restaurant->tags) as $tag)
                  <span class="badge">{{ trim($tag) }}</span>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </section>

      <div x-data="{ tab: 'menu' }">
      <!-- Tabs -->
      <div class="tabs">
        <div class="tab" :class="{ active: tab === 'menu' }" @click="tab = 'menu'">Menu</div>
        <div class="tab" :class="{ active: tab === 'reviews' }" @click="tab = 'reviews'">Reviews ({{ $restaurant->reviews->count() }})</div>
        <div class="tab" :class="{ active: tab === 'info' }" @click="tab = 'info'">Info</div>
      </div>

      <!-- Main Content -->
        <!-- Menu Tab -->
        <div x-show="tab === 'menu'">
          <div class="two-col">
            <!-- Menu Items -->
            <div>
              <h4 class="mb-md">Full Menu</h4>
              <div class="flex-col gap-sm">
                @foreach ($restaurant->dishes as $dish)
                <div class="card-bordered flex" style="gap: var(--space-sm); overflow: hidden; padding: 0;">
                  <div style="width: 160px; min-width: 160px; min-height: 128px;">
                    <x-placeholder-image :src="$dish->image" :alt="$dish->name" :width="160" :height="128" style="width: 100%; height: 100%; object-fit: cover;" />
                  </div>
                  <div style="padding: var(--space-sm); flex: 1; display: flex; flex-direction: column; justify-content: center;">
                    <div class="flex-between mb-xs">
                      <h5>{{ $dish->name }}</h5>
                      <span class="fw-bold text-primary" style="font-size: 18px;">{{ $dish->formatted_price }}</span>
                    </div>
                    @if($dish->description)
                      <p class="text-small text-muted mb-xs">{{ $dish->description }}</p>
                    @endif
                    <div class="flex-between" style="align-items: flex-end;">
                      <div class="flex gap-xs" style="flex-wrap: wrap;">
                        @if($dish->ingredients)
                          <span class="text-small text-muted">{{ Str::limit($dish->ingredients, 60) }}</span>
                        @endif
                        @if($dish->allergies)
                          <span class="badge badge-warning" style="font-size: 11px;">⚠ {{ $dish->allergies }}</span>
                        @endif
                      </div>
                      <button class="btn btn-primary btn-sm">Add to Cart</button>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>

            <!-- Cart Sidebar -->
            <aside>
              <div class="card" style="position: sticky; top: 16px;">
                <h4 class="mb-sm">Your Order</h4>
                <hr class="divider">
                <div class="flex-center" style="padding: var(--space-xl) 0; color: var(--gray);">
                  <p class="text-small">Your cart is empty. Add items from the menu.</p>
                </div>
                <hr class="divider">
                <div class="flex-between mb-xs">
                  <span class="text-small text-muted">Subtotal</span>
                  <span class="fw-semi">€0.00</span>
                </div>
                <div class="flex-between mb-xs">
                  <span class="text-small text-muted">Delivery Fee</span>
                  <span class="fw-semi">{{ $restaurant->formatted_delivery_fee }}</span>
                </div>
                <hr class="divider">
                <div class="flex-between mb-md">
                  <span class="fw-bold">Total</span>
                  <span class="fw-bold text-primary">{{ $restaurant->formatted_delivery_fee }}</span>
                </div>
                <a href="{{ route('checkout') }}" class="btn btn-primary btn-md btn-full">Go to Checkout</a>
              </div>
            </aside>
          </div>
        </div>

        <!-- Reviews Tab -->
        <div x-show="tab === 'reviews'" style="display: none;">
          <div style="max-width: 800px;">
            <!-- Rating Summary -->
            <div class="card mb-lg">
              <div class="flex gap-lg" style="align-items: center;">
                <div class="text-center" style="min-width: 120px;">
                  <div style="font-size: 48px; font-weight: 800; color: var(--primary);">{{ $restaurant->rating }}</div>
                  <div class="flex-center gap-xs mb-xs">
                    @for ($i = 1; $i <= 5; $i++)
                      <x-icon name="star" />
                    @endfor
                  </div>
                  <p class="text-small text-muted">{{ $restaurant->reviews->count() }} reviews</p>
                </div>
                <div style="flex: 1;">
                  @for ($stars = 5; $stars >= 1; $stars--)
                    @php
                      $count = $restaurant->reviews->where('rating', $stars)->count();
                      $total = $restaurant->reviews->count();
                      $percent = $total > 0 ? round(($count / $total) * 100) : 0;
                    @endphp
                    <div class="flex gap-sm mb-xs" style="align-items: center;">
                      <span class="text-small fw-semi" style="width: 50px;">{{ $stars }} star{{ $stars !== 1 ? 's' : '' }}</span>
                      <div style="flex: 1; height: 8px; background: var(--light-gray); border-radius: 4px; overflow: hidden;">
                        <div class="rating-bar-fill" style="width: {{ $percent }}%;"></div>
                      </div>
                      <span class="text-small text-muted" style="width: 30px; text-align: right;">{{ $count }}</span>
                    </div>
                  @endfor
                </div>
              </div>
            </div>

            <!-- Individual Reviews -->
            <div class="flex-col gap-sm">
              @forelse ($restaurant->reviews as $review)
              <div class="card-bordered">
                <div class="flex-between mb-xs">
                  <div class="flex gap-sm" style="align-items: center;">
                    <div class="placeholder-avatar" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 16px; color: var(--dark-gray);">
                      {{ $review->user ? strtoupper(substr($review->user->name, 0, 1)) : '?' }}
                    </div>
                    <div>
                      <span class="fw-semi">{{ $review->user?->name ?? 'Anonymous' }}</span>
                      <p class="text-small text-muted">{{ $review->created_at->diffForHumans() }}</p>
                    </div>
                  </div>
                  <div class="flex gap-xs">
                    @for ($i = 1; $i <= 5; $i++)
                      <span style="color: {{ $i <= $review->rating ? 'var(--warning)' : 'var(--gray)' }};">
                        <x-icon name="star" />
                      </span>
                    @endfor
                  </div>
                </div>
                <p class="text-small">{{ $review->message }}</p>
              </div>
              @empty
              <div class="card-bordered text-center" style="padding: var(--space-xl);">
                <p class="text-muted">No reviews yet. Be the first to review this restaurant!</p>
              </div>
              @endforelse
            </div>
          </div>
        </div>

        <!-- Info Tab -->
        <div x-show="tab === 'info'" style="display: none;">
          <div style="max-width: 600px;">
            <div class="card">
              <h4 class="mb-md">Restaurant Information</h4>

              <div class="flex gap-sm mb-md" style="align-items: flex-start;">
                <x-icon name="map-pin" />
                <div>
                  <span class="fw-semi">Location</span>
                  <p class="text-small text-muted">{{ $restaurant->location }}</p>
                </div>
              </div>

              <div class="flex gap-sm mb-md" style="align-items: flex-start;">
                <x-icon name="clock" />
                <div>
                  <span class="fw-semi">Delivery Time</span>
                  <p class="text-small text-muted">{{ $restaurant->delivery_minutes }} minutes</p>
                </div>
              </div>

              <div class="flex gap-sm mb-md" style="align-items: flex-start;">
                <x-icon name="star" />
                <div>
                  <span class="fw-semi">Rating</span>
                  <p class="text-small text-muted">{{ $restaurant->rating }} / 5 ({{ $restaurant->reviews->count() }} reviews)</p>
                </div>
              </div>

              <div class="flex gap-sm" style="align-items: flex-start;">
                <x-icon name="globe" />
                <div>
                  <span class="fw-semi">Cuisine</span>
                  <p class="text-small text-muted">{{ $restaurant->food_type }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
