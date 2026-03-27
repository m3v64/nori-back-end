@extends('layouts.wireframe')

@section('title', 'Order Confirmation - Food Delivery App')

@section('content')
      <h2 class="page-title">Order Confirmation Page</h2>

      <!-- Success Banner -->
      <section class="section">
        <div style="background: var(--light-gray); border: 2px solid var(--black); border-radius: var(--radius); padding: var(--space-xl); text-align: center;">
          <div style="width: 96px; height: 96px; border-radius: 50%; background: var(--success); display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-md); font-size: 48px; color: var(--white);"><x-icon name="check" /></div>
          <h2 style="margin-bottom: var(--space-sm);">Order Confirmed!</h2>
          <p class="body-large text-muted" style="margin-bottom: var(--space-sm);">Thank you for your order</p>
          <p class="fw-semi" style="margin-bottom: var(--space-xs);">Order #FD-2026-0001</p>
          <p class="text-small text-muted">February 27, 2026 at 12:30 PM</p>
        </div>
      </section>

      <div class="two-col">
        <!-- Left Column -->
        <div>
          <!-- Delivery Details -->
          <div class="section">
            <h4 class="section-title">Delivery Details</h4>
            <div class="card-bordered p-md">
              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md);">
                <div>
                  <div class="text-small text-muted mb-xs">Delivery Address</div>
                  <div class="fw-semi">123 Main Street, Apt 4B</div>
                </div>
                <div>
                  <div class="text-small text-muted mb-xs">Estimated Delivery</div>
                  <div class="fw-semi">25-35 minutes</div>
                </div>
                <div>
                  <div class="text-small text-muted mb-xs">Contact Number</div>
                  <div class="fw-semi">(555) 123-4567</div>
                </div>
                <div>
                  <div class="text-small text-muted mb-xs">Delivery Method</div>
                  <div class="fw-semi">Standard Delivery</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Order Tracking -->
          <div class="section">
            <h4 class="section-title">Order Tracking</h4>
            <div class="card-bordered p-md">
              <div class="timeline">
                @php
                  $steps = [
                    ['icon' => '&#x2713;', 'class' => 'filled', 'title' => 'Order Placed', 'desc' => 'Your order has been confirmed', 'time' => '12:30 PM'],
                    ['icon' => '&#x2713;', 'class' => 'filled', 'title' => 'Preparing', 'desc' => 'Restaurant is preparing your food', 'time' => '12:35 PM'],
                    ['icon' => '3', 'class' => 'outline', 'title' => 'On the Way', 'desc' => 'Driver is picking up your order', 'time' => '~12:50 PM'],
                    ['icon' => '4', 'class' => 'outline', 'title' => 'Delivered', 'desc' => 'Estimated arrival at your door', 'time' => '~1:05 PM'],
                  ];
                @endphp
                @foreach ($steps as $step)
                <div class="timeline-step">
                  <div class="timeline-dot {{ $step['class'] }}">{!! $step['icon'] !!}</div>
                  <div class="timeline-content">
                    <div class="fw-semi">{{ $step['title'] }}</div>
                    <div class="text-small text-muted">{{ $step['desc'] }}</div>
                  </div>
                  <span class="timeline-time">{{ $step['time'] }}</span>
                </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Order Items -->
          <div class="section">
            <h4 class="section-title">Order Items</h4>
            <div class="card-bordered p-md">
              @php
                $items = [
                  ['name' => 'Margherita Pizza', 'desc' => 'Classic with fresh mozzarella', 'note' => 'Extra cheese', 'qty' => 1, 'price' => '$12.99'],
                  ['name' => 'Caesar Salad', 'desc' => 'Romaine, parmesan, croutons', 'note' => 'Dressing on the side', 'qty' => 2, 'price' => '$19.98'],
                  ['name' => 'Tiramisu', 'desc' => 'Classic Italian dessert', 'note' => 'Espresso and mascarpone', 'qty' => 1, 'price' => '$8.99'],
                ];
              @endphp
              @foreach ($items as $index => $item)
              <div @class(['flex', 'gap-sm', 'mb-md' => $index < count($items) - 1, 'order-item-divider' => $index < count($items) - 1]) style="align-items: center;">
                <div style="width: 80px; height: 80px; min-width: 80px; background: var(--medium-gray); border-radius: var(--radius);"></div>
                <div style="flex: 1;">
                  <div class="fw-semi">{{ $item['name'] }}</div>
                  <div class="text-small text-muted">{{ $item['desc'] }}</div>
                  <div class="text-small text-muted">{{ $item['note'] }}</div>
                </div>
                <div class="text-right">
                  <span class="badge mb-xs">Qty: {{ $item['qty'] }}</span>
                  <div class="fw-bold">{{ $item['price'] }}</div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Right Column -->
        <aside>
          <!-- Delivery Address Card -->
          <div class="card-bordered p-md mb-md">
            <h5 style="margin-bottom: var(--space-sm);">Delivery Address</h5>
            <div class="text-small mb-xs">123 Main Street</div>
            <div class="text-small mb-sm">Apt 4B, New York, NY 10001</div>
            <div class="text-small text-muted mb-xs">Contact</div>
            <div class="text-small">(555) 123-4567</div>
          </div>

          <!-- Order Summary Card -->
          <div class="card-bordered p-md mb-md">
            <h5 style="margin-bottom: var(--space-sm);">Order Summary</h5>
            <div class="flex-between mb-xs">
              <span class="text-small text-muted">Subtotal</span>
              <span class="text-small">$41.96</span>
            </div>
            <div class="flex-between mb-xs">
              <span class="text-small text-muted">Delivery Fee</span>
              <span class="text-small">$2.99</span>
            </div>
            <div class="flex-between mb-sm">
              <span class="text-small text-muted">Tax</span>
              <span class="text-small">$3.60</span>
            </div>
            <hr class="divider">
            <div class="flex-between mb-sm">
              <span class="fw-bold">Total</span>
              <span class="fw-bold">$48.55</span>
            </div>
            <div class="text-small text-muted">Paid with Credit Card ending in 4242</div>
          </div>

          <!-- Action Buttons -->
          <div class="flex-col gap-sm mb-md">
            <button class="btn btn-primary btn-md btn-full">Track Order</button>
            <button class="btn btn-secondary btn-md btn-full">View Receipt</button>
            <a href="{{ route('restaurants.index') }}" class="btn btn-secondary btn-md btn-full">Reorder</a>
          </div>

          <!-- Help Card -->
          <div class="card-bordered p-md">
            <h5 style="margin-bottom: var(--space-xs);">Need Help?</h5>
            <div class="text-small text-muted mb-xs">Having issues with your order? Our support team is here to help.</div>
            <a href="#" class="text-small text-primary">Contact Support &rarr;</a>
          </div>
        </aside>
      </div>
@endsection
