@extends('layouts.wireframe')

@section('title', 'Checkout - Food Delivery App')

@section('content')
      <h2 class="page-title">Checkout Page</h2>

      <!-- Step Indicator -->
      <div class="steps">
        <div class="step">
          <div class="step-circle filled">1</div>
          <span class="step-label">Address</span>
        </div>
        <div class="step-line"></div>
        <div class="step">
          <div class="step-circle filled">2</div>
          <span class="step-label">Payment</span>
        </div>
        <div class="step-line"></div>
        <div class="step">
          <div class="step-circle outline">3</div>
          <span class="step-label">Review</span>
        </div>
      </div>

      <div class="two-col">
        <!-- Left Column - Forms -->
        <div>
          <!-- Delivery Address -->
          <div class="section">
            <h4 class="section-title">Delivery Address</h4>
            <div class="card-bordered p-md">
              <div class="form-group mb-md">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-input" placeholder="Enter your full name">
              </div>
              <div class="form-row mb-md">
                <div class="form-group">
                  <label class="form-label">Street Address</label>
                  <input type="text" class="form-input" placeholder="Street address">
                </div>
                <div class="form-group" style="max-width: 240px;">
                  <label class="form-label">Apt / Suite</label>
                  <input type="text" class="form-input" placeholder="Apt, suite, unit">
                </div>
              </div>
              <div class="form-row mb-md">
                <div class="form-group">
                  <label class="form-label">City</label>
                  <input type="text" class="form-input" placeholder="City">
                </div>
                <div class="form-group">
                  <label class="form-label">State</label>
                  <input type="text" class="form-input" placeholder="State">
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Zip Code</label>
                <input type="text" class="form-input" placeholder="Zip code">
              </div>
            </div>
          </div>

          <!-- Payment Method -->
          <div class="section">
            <h4 class="section-title">Payment Method</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-sm); margin-bottom: var(--space-md);">
              <label class="card-bordered p-sm flex gap-sm" style="cursor: pointer; align-items: center;">
                <input type="radio" name="payment" checked style="accent-color: var(--primary);">
                <div>
                  <div class="fw-semi">Credit Card</div>
                  <div class="text-small text-muted">Visa, Mastercard, Amex</div>
                </div>
              </label>
              <label class="card-bordered p-sm flex gap-sm" style="cursor: pointer; align-items: center;">
                <input type="radio" name="payment" style="accent-color: var(--primary);">
                <div>
                  <div class="fw-semi">PayPal</div>
                  <div class="text-small text-muted">Pay with PayPal</div>
                </div>
              </label>
              <label class="card-bordered p-sm flex gap-sm" style="cursor: pointer; align-items: center;">
                <input type="radio" name="payment" style="accent-color: var(--primary);">
                <div>
                  <div class="fw-semi">Apple Pay</div>
                  <div class="text-small text-muted">Quick checkout</div>
                </div>
              </label>
              <label class="card-bordered p-sm flex gap-sm" style="cursor: pointer; align-items: center;">
                <input type="radio" name="payment" style="accent-color: var(--primary);">
                <div>
                  <div class="fw-semi">Google Pay</div>
                  <div class="text-small text-muted">Fast &amp; secure</div>
                </div>
              </label>
            </div>
          </div>

          <!-- Payment Details -->
          <div class="section">
            <h4 class="section-title">Payment Details</h4>
            <div class="card p-md">
              <div class="flex gap-sm mb-md" style="align-items: center;">
                <input type="radio" checked style="accent-color: var(--primary);">
                <span class="fw-semi">Credit / Debit Card</span>
                <div class="flex gap-xs" style="margin-left: auto;">
                  <div style="width: 40px; height: 24px; background: var(--medium-gray); border-radius: 2px;"></div>
                  <div style="width: 40px; height: 24px; background: var(--medium-gray); border-radius: 2px;"></div>
                  <div style="width: 40px; height: 24px; background: var(--medium-gray); border-radius: 2px;"></div>
                </div>
              </div>
              <div class="form-group mb-md">
                <label class="form-label">Card Number</label>
                <input type="text" class="form-input" placeholder="1234 5678 9012 3456">
              </div>
              <div class="form-group mb-md">
                <label class="form-label">Name on Card</label>
                <input type="text" class="form-input" placeholder="Full name as shown on card">
              </div>
              <div class="form-row mb-md">
                <div class="form-group">
                  <label class="form-label">Expiry Date</label>
                  <input type="text" class="form-input" placeholder="MM / YY">
                </div>
                <div class="form-group">
                  <label class="form-label">CVV</label>
                  <input type="text" class="form-input" placeholder="123">
                </div>
              </div>
              <label class="check-group mb-sm">
                <input type="checkbox"> Save this card for future purchases
              </label>
              <label class="check-group">
                <input type="checkbox" checked> Billing address same as delivery
              </label>
            </div>
          </div>

          <!-- Special Instructions -->
          <div class="section">
            <h4 class="section-title">Special Instructions</h4>
            <textarea class="form-textarea" placeholder="Add any special delivery or food preparation instructions..."></textarea>
          </div>
        </div>

        <!-- Right Column - Order Summary -->
        <aside>
          <div class="card" style="position: sticky; top: 16px;">
            <h4 style="margin-bottom: var(--space-md);">Order Summary</h4>

            @php
              $orderItems = [
                ['name' => 'Margherita Pizza', 'price' => '$12.99', 'qty' => 1],
                ['name' => 'Caesar Salad', 'price' => '$19.98', 'qty' => 2],
                ['name' => 'Tiramisu', 'price' => '$8.99', 'qty' => 1],
              ];
            @endphp

            @foreach ($orderItems as $item)
            <div style="margin-bottom: var(--space-sm); padding-bottom: var(--space-sm); border-bottom: 1px solid var(--medium-gray);">
              <div class="flex-between mb-xs">
                <span class="fw-semi" style="font-size: 14px;">{{ $item['name'] }}</span>
                <span class="fw-semi">{{ $item['price'] }}</span>
              </div>
              <div class="text-small text-muted">Qty: {{ $item['qty'] }}</div>
            </div>
            @endforeach

            <div class="flex-between mb-xs">
              <span class="text-muted">Subtotal</span>
              <span>$41.96</span>
            </div>
            <div class="flex-between mb-xs">
              <span class="text-muted">Delivery Fee</span>
              <span>$2.99</span>
            </div>
            <div class="flex-between mb-sm">
              <span class="text-muted">Tax</span>
              <span>$3.60</span>
            </div>
            <hr class="divider">
            <div class="flex-between mb-lg">
              <span class="fw-bold body-large">Total</span>
              <span class="fw-bold body-large">$48.55</span>
            </div>

            <a href="{{ route('order.confirmation') }}" class="btn btn-primary btn-lg btn-full mb-sm">Place Order</a>

            <div class="flex gap-xs">
              <div style="flex: 2; height: 4px; background: var(--primary); border-radius: 2px;"></div>
              <div style="flex: 1; height: 4px; background: var(--medium-gray); border-radius: 2px;"></div>
            </div>
          </div>
        </aside>
      </div>
@endsection
