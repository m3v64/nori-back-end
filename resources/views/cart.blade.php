@extends('layouts.wireframe')

@section('title', 'Shopping Cart - Food Delivery App')

@section('content')
      <h2 class="page-title">Shopping Cart Page</h2>

      <!-- Breadcrumb -->
      <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span class="breadcrumb-separator">&rsaquo;</span>
        <span>Shopping Cart</span>
      </div>

      <div class="two-col">
        <!-- Left Column - Cart Items -->
        <div>
          <div class="section">
            <h3 style="margin-bottom: var(--space-md);">Your Cart</h3>
            <div class="flex-between" style="padding: var(--space-xs) 0; border-bottom: 2px solid var(--medium-gray); margin-bottom: var(--space-sm);">
              <span class="fw-semi">Product</span>
              <span class="fw-semi">Price</span>
            </div>

            @php
              $cartItems = [
                ['name' => 'Margherita Pizza', 'desc' => 'Classic pizza with fresh mozzarella', 'from' => 'Restaurant Name', 'qty' => 1, 'price' => '$12.99'],
                ['name' => 'Caesar Salad', 'desc' => 'Crispy romaine with parmesan', 'from' => 'Restaurant Name', 'qty' => 2, 'price' => '$19.98'],
                ['name' => 'Tiramisu', 'desc' => 'Classic Italian dessert with espresso', 'from' => 'Restaurant Name', 'qty' => 1, 'price' => '$8.99'],
              ];
            @endphp

            @foreach ($cartItems as $item)
            <div class="flex gap-sm" style="padding: var(--space-sm) 0; border-bottom: 1px solid var(--medium-gray); align-items: center;">
              <div style="width: 96px; height: 96px; min-width: 96px; background: var(--medium-gray); border-radius: var(--radius);"></div>
              <div style="flex: 1;">
                <div class="flex-between mb-xs">
                  <span class="fw-semi body-large">{{ $item['name'] }}</span>
                  <button style="background: none; border: none; cursor: pointer; font-size: 18px; color: var(--gray);">&times;</button>
                </div>
                <div class="text-small text-muted mb-xs">{{ $item['desc'] }}</div>
                <div class="text-small text-muted mb-sm">From: {{ $item['from'] }}</div>
                <div class="flex-between">
                  <div class="qty-controls">
                    <button class="qty-btn">-</button>
                    <span class="qty-value">{{ $item['qty'] }}</span>
                    <button class="qty-btn">+</button>
                  </div>
                  <span class="fw-bold body-large">{{ $item['price'] }}</span>
                </div>
              </div>
            </div>
            @endforeach

            <a href="{{ route('restaurants.index') }}" class="btn btn-secondary btn-md btn-full mt-md">Continue Shopping</a>
          </div>

          <!-- Promo Code -->
          <div class="section">
            <h5 style="margin-bottom: var(--space-sm);">Promo Code</h5>
            <div class="flex gap-sm">
              <input type="text" class="form-input" placeholder="Enter promo code..." style="flex: 1;">
              <button class="btn btn-secondary btn-md">Apply</button>
            </div>
          </div>
        </div>

        <!-- Right Column - Order Summary -->
        <aside>
          <div class="card" style="position: sticky; top: 16px;">
            <h4 style="margin-bottom: var(--space-md);">Order Summary</h4>

            <div class="form-group mb-md">
              <label class="form-label">Delivery Location</label>
              <select class="form-select">
                <option>Home - 123 Main St</option>
                <option>Office - 456 Work Ave</option>
              </select>
            </div>

            <div class="form-group mb-md">
              <label class="form-label">Estimated Delivery</label>
              <div class="card-bordered" style="padding: var(--space-sm);">
                <div class="text-small text-muted">Estimated delivery time: 25-35 min</div>
                <div class="text-small text-muted">Your order will be delivered by a driver</div>
              </div>
            </div>

            <div class="flex-between mb-xs">
              <span class="text-muted">Subtotal</span>
              <span>$41.96</span>
            </div>
            <div class="flex-between mb-xs">
              <span class="text-muted">Delivery Fee</span>
              <span>$2.99</span>
            </div>
            <div class="flex-between mb-xs">
              <span class="text-muted">Tax</span>
              <span>$3.60</span>
            </div>
            <div class="flex-between mb-sm">
              <span class="text-muted">Discount</span>
              <span style="color: var(--success);">-$0.00</span>
            </div>
            <hr class="divider">
            <div class="flex-between mb-lg">
              <span class="fw-bold body-large">Total</span>
              <span class="fw-bold body-large">$48.55</span>
            </div>

            <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg btn-full mb-sm">Proceed to Checkout</a>
            <div class="text-center text-small text-muted"><x-icon name="lock" /> Secure checkout</div>
          </div>
        </aside>
      </div>

      <!-- Recommended Section -->
      <section class="section mt-xl">
        <h4 class="section-title">You May Also Like</h4>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-sm);">
          @php $recs = [['w1'=>'wp-70','w2'=>'wp-50','p'=>'$11.99'],['w1'=>'wp-65','w2'=>'wp-45','p'=>'$9.99'],['w1'=>'wp-72','w2'=>'wp-55','p'=>'$14.99'],['w1'=>'wp-68','w2'=>'wp-48','p'=>'$7.99']]; @endphp
          @foreach ($recs as $rec)
          <div class="card-bordered">
            <div class="placeholder-img"></div>
            <div class="placeholder-lg mt-xs {{ $rec['w1'] }}"></div>
            <div class="placeholder-sm mt-xs {{ $rec['w2'] }}"></div>
            <div class="fw-bold mt-xs">{{ $rec['p'] }}</div>
          </div>
          @endforeach
        </div>
      </section>
@endsection
