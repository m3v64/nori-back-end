@extends('layouts.app')

@section('title', 'Restaurant Detail - Food Delivery App')

@section('content')
      <h2 class="page-title">Restaurant Detail Page</h2>

      <!-- Hero Banner -->
      <section class="section">
        <div style="position: relative; width: 100%; height: 256px; background: var(--medium-gray); border-radius: var(--radius); overflow: hidden;">
          <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.7); padding: var(--space-sm) var(--space-md); display: flex; align-items: center; justify-content: space-between;">
            <div>
              <div style="color: var(--white); font-size: 1.5rem; font-weight: 700; margin-bottom: 4px;">Restaurant Name</div>
              <div style="color: var(--gray); font-size: 14px;">Fresh, authentic cuisine delivered to your door</div>
              <div class="flex gap-xs mt-xs">
                <span class="badge badge-primary"><x-icon name="star" /> 4.5</span>
                <span class="badge">Italian</span>
                <span class="badge">$$</span>
              </div>
            </div>
            <div class="flex gap-xs">
              <button class="btn btn-secondary btn-sm" style="border-color: var(--white); color: var(--white);"><x-icon name="heart" /></button>
              <button class="btn btn-secondary btn-sm" style="border-color: var(--white); color: var(--white);"><x-icon name="share" /></button>
            </div>
          </div>
        </div>
      </section>

      <!-- Tabs -->
      <div class="tabs">
        <div class="tab active">Menu</div>
        <div class="tab">Reviews</div>
        <div class="tab">Info</div>
        <div class="tab">Promotions</div>
      </div>

      <!-- Menu + Cart Sidebar -->
      <div style="display: grid; grid-template-columns: 1fr 292px; gap: var(--space-lg);">
        <!-- Menu Content -->
        <div>
          @php
            $sections = [
              'Popular Items' => [
                ['name' => 'Margherita Pizza', 'desc' => 'Classic pizza with fresh mozzarella, basil, and tomato sauce', 'note' => 'Serves 1-2 people', 'price' => '$12.99'],
                ['name' => 'Caesar Salad', 'desc' => 'Crispy romaine, parmesan, croutons, and caesar dressing', 'note' => 'Fresh and light', 'price' => '$9.99'],
                ['name' => 'Tiramisu', 'desc' => 'Classic Italian dessert with espresso and mascarpone', 'note' => 'Single serving', 'price' => '$8.99'],
                ['name' => 'Bruschetta', 'desc' => 'Toasted bread with fresh tomatoes, garlic, and basil', 'note' => 'Appetizer - 4 pieces', 'price' => '$7.99'],
              ],
              'Main Course' => [
                ['name' => 'Pasta Carbonara', 'desc' => 'Creamy pasta with guanciale, egg, and pecorino romano', 'note' => 'Generous portion', 'price' => '$15.99'],
                ['name' => 'Grilled Salmon', 'desc' => 'Atlantic salmon with herb butter and seasonal vegetables', 'note' => "Chef's recommendation", 'price' => '$18.99'],
                ['name' => 'Chicken Parmesan', 'desc' => 'Breaded chicken with marinara and melted mozzarella', 'note' => 'Served with spaghetti', 'price' => '$14.99'],
                ['name' => 'Risotto ai Funghi', 'desc' => 'Creamy arborio rice with wild mushrooms and truffle oil', 'note' => 'Vegetarian option', 'price' => '$16.99'],
              ],
              'Desserts' => [
                ['name' => 'Panna Cotta', 'desc' => 'Vanilla cream dessert with berry compote', 'note' => 'House specialty', 'price' => '$7.99'],
                ['name' => 'Gelato Trio', 'desc' => 'Three scoops of artisan Italian gelato', 'note' => "Ask for today's flavors", 'price' => '$6.99'],
                ['name' => 'Cannoli', 'desc' => 'Crispy shells filled with sweet ricotta cream', 'note' => 'Set of 3', 'price' => '$8.99'],
                ['name' => 'Affogato', 'desc' => 'Vanilla gelato drowned in hot espresso', 'note' => 'Perfect after-dinner treat', 'price' => '$5.99'],
              ],
            ];
          @endphp

          @foreach ($sections as $title => $items)
          <div class="section">
            <h4 class="section-title">{{ $title }}</h4>
            <div class="flex-col gap-sm">
              @foreach ($items as $item)
              <div class="card-bordered flex" style="gap: var(--space-sm); padding: var(--space-sm);">
                <div style="flex: 1;">
                  <div style="font-weight: 600; font-size: 16px; margin-bottom: 4px;">{{ $item['name'] }}</div>
                  <div class="text-small text-muted mb-xs">{{ $item['desc'] }}</div>
                  <div class="text-small text-muted mb-sm">{{ $item['note'] }}</div>
                  <div class="flex-between">
                    <span class="fw-bold">{{ $item['price'] }}</span>
                    <button class="btn btn-primary btn-sm">Add to Cart</button>
                  </div>
                </div>
                <div style="width: 128px; min-width: 128px; height: 125px; background: var(--medium-gray); border-radius: var(--radius);"></div>
              </div>
              @endforeach
            </div>
          </div>
          @endforeach
        </div>

        <!-- Cart Sidebar -->
        <aside>
          <div class="card" style="position: sticky; top: 16px;">
            <h5 style="margin-bottom: var(--space-md);">Your Order</h5>

            <!-- Cart Item 1 -->
            <div style="margin-bottom: var(--space-sm); padding-bottom: var(--space-sm); border-bottom: 1px solid var(--medium-gray);">
              <div class="flex-between mb-xs">
                <span class="fw-semi" style="font-size: 14px;">Margherita Pizza</span>
                <button style="background: none; border: none; cursor: pointer; font-size: 16px; color: var(--gray);">&times;</button>
              </div>
              <div class="text-small text-muted mb-xs">Classic with mozzarella and basil</div>
              <div class="flex-between">
                <div class="qty-controls">
                  <button class="qty-btn">-</button>
                  <span class="qty-value">2</span>
                  <button class="qty-btn">+</button>
                </div>
                <span class="fw-semi">$25.98</span>
              </div>
            </div>

            <!-- Cart Item 2 -->
            <div style="margin-bottom: var(--space-sm); padding-bottom: var(--space-sm); border-bottom: 1px solid var(--medium-gray);">
              <div class="flex-between mb-xs">
                <span class="fw-semi" style="font-size: 14px;">Caesar Salad</span>
                <button style="background: none; border: none; cursor: pointer; font-size: 16px; color: var(--gray);">&times;</button>
              </div>
              <div class="text-small text-muted mb-xs">Fresh romaine with croutons</div>
              <div class="flex-between">
                <div class="qty-controls">
                  <button class="qty-btn">-</button>
                  <span class="qty-value">1</span>
                  <button class="qty-btn">+</button>
                </div>
                <span class="fw-semi">$9.99</span>
              </div>
            </div>

            <!-- Totals -->
            <div class="flex-between mb-xs">
              <span class="text-small text-muted">Subtotal</span>
              <span class="text-small">$35.97</span>
            </div>
            <div class="flex-between mb-sm">
              <span class="text-small text-muted">Delivery Fee</span>
              <span class="text-small">$2.99</span>
            </div>
            <hr class="divider">
            <div class="flex-between mb-md">
              <span class="fw-bold">Total</span>
              <span class="fw-bold">$38.96</span>
            </div>

            <a href="{{ route('checkout') }}" class="btn btn-primary btn-md btn-full">Checkout</a>
          </div>
        </aside>
      </div>

      <!-- Bottom Section: Info + Ratings -->
      <section class="section mt-xl">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-lg);">
          <!-- Restaurant Info -->
          <div class="card-bordered">
            <h5 style="margin-bottom: var(--space-md);">Restaurant Info</h5>
            <div class="flex-col gap-sm">
              <div class="flex gap-sm" style="align-items: center;">
                <span><x-icon name="map-pin" /></span>
                <span class="text-small">123 Main Street, Downtown, NY 10001</span>
              </div>
              <div class="flex gap-sm" style="align-items: center;">
                <span><x-icon name="phone" /></span>
                <span class="text-small">(555) 123-4567</span>
              </div>
              <div class="flex gap-sm" style="align-items: center;">
                <span><x-icon name="clock" /></span>
                <span class="text-small">Mon-Sun: 11:00 AM - 10:00 PM</span>
              </div>
              <div class="flex gap-sm" style="align-items: center;">
                <span><x-icon name="globe" /></span>
                <span class="text-small">www.restaurant.com</span>
              </div>
            </div>
          </div>

          <!-- Ratings -->
          <div class="card-bordered">
            <h5 style="margin-bottom: var(--space-md);">Ratings</h5>
            <div class="flex-col gap-sm">
              @php $ratings = [['label' => 'Food Quality', 'w' => 'wp-90', 'val' => '4.5'], ['label' => 'Service', 'w' => 'wp-84', 'val' => '4.2'], ['label' => 'Delivery', 'w' => 'wp-76', 'val' => '3.8']]; @endphp
              @foreach ($ratings as $r)
              <div class="flex gap-sm" style="align-items: center;">
                <span class="text-small" style="width: 96px;">{{ $r['label'] }}</span>
                <div style="flex: 1; height: 8px; background: var(--medium-gray); border-radius: 4px; overflow: hidden;">
                  <div class="rating-bar-fill {{ $r['w'] }}"></div>
                </div>
                <span class="text-small fw-semi">{{ $r['val'] }}</span>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
@endsection
