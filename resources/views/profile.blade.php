@extends('layouts.wireframe')

@section('title', 'User Profile - Food Delivery App')

@section('content')
      <h2 class="page-title">User Profile Page</h2>

      <div class="two-col-sidebar-left">
        <!-- Left Sidebar -->
        <aside>
          <!-- User Info Card -->
          <div class="card-bordered p-md mb-md text-center">
            <div class="placeholder-avatar" style="margin: 0 auto var(--space-sm);"></div>
            <div class="fw-semi body-large">John Doe</div>
            <div class="text-small text-muted">john.doe@email.com</div>
          </div>

          <!-- Navigation Menu -->
          <div class="card-bordered" style="padding: var(--space-xs);">
            <nav class="sidebar-nav">
              <a href="#" class="sidebar-nav-item">Profile Settings</a>
              <a href="#" class="sidebar-nav-item active">Order History</a>
              <a href="#" class="sidebar-nav-item">Addresses</a>
              <a href="#" class="sidebar-nav-item">Payment Methods</a>
              <a href="#" class="sidebar-nav-item">Notifications</a>
              <a href="#" class="sidebar-nav-item" style="color: var(--error);">Logout</a>
            </nav>
          </div>
        </aside>

        <!-- Right Content Area -->
        <div>
          <h3 style="margin-bottom: var(--space-md);">Order History</h3>

          <!-- Search & Filter Bar -->
          <div class="flex gap-sm mb-lg" style="flex-wrap: wrap;">
            <div class="search-bar" style="flex: 1; min-width: 200px;">
              <span class="search-icon"><x-icon name="search" /></span>
              <input type="text" placeholder="Search orders...">
            </div>
            <select class="form-select" style="width: 192px;">
              <option>All Statuses</option>
              <option>Delivered</option>
              <option>In Progress</option>
              <option>Cancelled</option>
            </select>
            <select class="form-select" style="width: 192px;">
              <option>All Dates</option>
              <option>Last 7 days</option>
              <option>Last 30 days</option>
              <option>Last 3 months</option>
            </select>
          </div>

          <!-- Order Cards -->
          <div class="flex-col gap-md">
            @php
              $orders = [
                [
                  'id' => '#FD-2026-0001', 'date' => 'Feb 27, 2026', 'status' => 'Delivered', 'status_class' => 'badge-success',
                  'items' => [
                    ['name' => 'Margherita Pizza', 'desc' => 'Classic with mozzarella', 'note' => 'Extra cheese', 'qty' => 1, 'price' => '$12.99'],
                    ['name' => 'Caesar Salad', 'desc' => 'Fresh romaine lettuce', 'note' => 'Dressing on the side', 'qty' => 2, 'price' => '$19.98'],
                    ['name' => 'Tiramisu', 'desc' => 'Italian dessert', 'note' => 'With espresso', 'qty' => 1, 'price' => '$8.99'],
                  ],
                  'actions' => ['View', 'Reorder'], 'btn_label' => 'Reorder', 'view_link' => true,
                ],
                [
                  'id' => '#FD-2026-0002', 'date' => 'Feb 25, 2026', 'status' => 'Delivered', 'status_class' => 'badge-success',
                  'items' => [
                    ['name' => 'Pad Thai', 'desc' => 'Stir-fried noodles', 'note' => 'With shrimp', 'qty' => 1, 'price' => '$14.99'],
                    ['name' => 'Spring Rolls', 'desc' => 'Crispy vegetable rolls', 'note' => 'Set of 4', 'qty' => 1, 'price' => '$6.99'],
                    ['name' => 'Mango Sticky Rice', 'desc' => 'Thai dessert', 'note' => 'With coconut cream', 'qty' => 1, 'price' => '$7.99'],
                  ],
                  'actions' => ['View', 'Reorder'], 'btn_label' => 'Reorder', 'view_link' => false,
                ],
                [
                  'id' => '#FD-2026-0003', 'date' => 'Feb 20, 2026', 'status' => 'In Progress', 'status_class' => 'badge-warning',
                  'items' => [
                    ['name' => 'Chicken Biryani', 'desc' => 'Aromatic basmati rice', 'note' => 'With raita', 'qty' => 2, 'price' => '$29.98'],
                    ['name' => 'Garlic Naan', 'desc' => 'Freshly baked bread', 'note' => 'Set of 2', 'qty' => 1, 'price' => '$4.99'],
                    ['name' => 'Mango Lassi', 'desc' => 'Sweet yogurt drink', 'note' => 'Large size', 'qty' => 2, 'price' => '$9.98'],
                  ],
                  'actions' => ['Track', 'Cancel'], 'btn_label' => 'Track', 'view_link' => false,
                ],
                [
                  'id' => '#FD-2026-0004', 'date' => 'Feb 15, 2026', 'status' => 'Cancelled', 'status_class' => 'badge-error',
                  'items' => [
                    ['name' => 'Sushi Platter', 'desc' => 'Assorted sushi rolls', 'note' => '12 pieces', 'qty' => 1, 'price' => '$24.99'],
                    ['name' => 'Miso Soup', 'desc' => 'Traditional Japanese soup', 'note' => 'With tofu', 'qty' => 2, 'price' => '$7.98'],
                    ['name' => 'Green Tea Ice Cream', 'desc' => 'Matcha flavor', 'note' => '2 scoops', 'qty' => 1, 'price' => '$5.99'],
                  ],
                  'actions' => ['View', 'Reorder'], 'btn_label' => 'Reorder', 'view_link' => false,
                ],
                [
                  'id' => '#FD-2026-0005', 'date' => 'Feb 10, 2026', 'status' => 'Delivered', 'status_class' => 'badge-success',
                  'items' => [
                    ['name' => 'Beef Tacos', 'desc' => 'Corn tortillas', 'note' => 'Set of 3', 'qty' => 2, 'price' => '$21.98'],
                    ['name' => 'Guacamole & Chips', 'desc' => 'Fresh avocado dip', 'note' => 'With tortilla chips', 'qty' => 1, 'price' => '$8.99'],
                    ['name' => 'Churros', 'desc' => 'Cinnamon sugar coated', 'note' => 'With chocolate sauce', 'qty' => 1, 'price' => '$6.99'],
                  ],
                  'actions' => ['View', 'Reorder'], 'btn_label' => 'Reorder', 'view_link' => false,
                ],
              ];
            @endphp

            @foreach ($orders as $order)
            <div class="card-bordered">
              <div class="flex-between p-sm" style="border-bottom: 1px solid var(--medium-gray);">
                <div>
                  <span class="fw-semi">Order {{ $order['id'] }}</span>
                  <span class="text-small text-muted" style="margin-left: var(--space-sm);">{{ $order['date'] }}</span>
                </div>
                <div class="flex gap-sm" style="align-items: center;">
                  <span class="badge {{ $order['status_class'] }}">{{ $order['status'] }}</span>
                  <select class="form-select" style="width: 91px; padding: 4px 8px; font-size: 12px;">
                    <option>Actions</option>
                    @foreach ($order['actions'] as $action)
                    <option>{{ $action }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="p-sm">
                @foreach ($order['items'] as $index => $item)
                <div class="flex gap-sm {{ $index < count($order['items']) - 1 ? 'mb-sm' : '' }}" style="align-items: center;">
                  <div style="width: 64px; height: 64px; min-width: 64px; background: var(--medium-gray); border-radius: var(--radius);"></div>
                  <div style="flex: 1;">
                    <div class="fw-semi" style="font-size: 14px;">{{ $item['name'] }}</div>
                    <div class="text-small text-muted">{{ $item['desc'] }}</div>
                    <div class="text-small text-muted">{{ $item['note'] }}</div>
                  </div>
                  <div class="text-right">
                    <div class="text-small text-muted">Qty: {{ $item['qty'] }}</div>
                    <div class="fw-semi">{{ $item['price'] }}</div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="flex-between p-sm" style="border-top: 1px solid var(--medium-gray);">
                <div class="flex gap-xs">
                  <button class="btn btn-secondary btn-sm">Previous</button>
                  <button class="btn btn-secondary btn-sm">Next</button>
                </div>
                <div class="flex gap-sm" style="align-items: center;">
                  @if ($order['view_link'])
                  <a href="{{ route('order.confirmation') }}" class="text-primary text-small">View</a>
                  @else
                  <a href="#" class="text-primary text-small">View</a>
                  @endif
                  <button class="btn btn-primary btn-sm">{{ $order['btn_label'] }}</button>
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
