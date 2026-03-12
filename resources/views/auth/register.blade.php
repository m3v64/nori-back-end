@extends('layouts.app')

@section('title', 'Register - Food Delivery App')

@section('content')
      <h2 class="page-title">Register Page</h2>

      <!-- Centered Register Card -->
      <div style="display: flex; justify-content: center; padding: var(--space-xl) 0;">
        <div class="card" style="width: 100%; max-width: 448px; padding: var(--space-xl) var(--space-lg);">
          <!-- Logo -->
          <div style="width: 160px; height: 48px; background: var(--medium-gray); border-radius: var(--radius); margin: 0 auto var(--space-md);"></div>

          <!-- Title -->
          <h3 class="text-center" style="margin-bottom: var(--space-xs);">Create Account</h3>
          <p class="text-center text-muted body-large" style="margin-bottom: var(--space-lg);">Join us and start ordering</p>

          <!-- Form -->
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-row mb-md">
              <div class="form-group">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-input" placeholder="First name">
              </div>
              <div class="form-group">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-input" placeholder="Last name">
              </div>
            </div>

            <div class="form-group mb-md">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-input" placeholder="Enter your email address">
            </div>

            <div class="form-group mb-md">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-input" placeholder="Create a password">
            </div>

            <div class="form-group mb-md">
              <label class="form-label">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-input" placeholder="Confirm your password">
            </div>

            <label class="check-group mb-lg">
              <input type="checkbox" name="terms"> <span class="text-small">I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a></span>
            </label>

            <button type="submit" class="btn btn-primary btn-md btn-full mb-lg">Create Account</button>

            <!-- Divider -->
            <div class="divider-text mb-lg">OR</div>

            <!-- Social Buttons -->
            <button type="button" class="btn btn-secondary btn-md btn-full mb-sm" style="gap: var(--space-sm);">
              <span style="width: 24px; height: 24px; background: var(--medium-gray); border-radius: 50%; display: inline-block;"></span>
              Continue with Google
            </button>
            <button type="button" class="btn btn-secondary btn-md btn-full mb-lg" style="gap: var(--space-sm);">
              <span style="width: 24px; height: 24px; background: var(--medium-gray); border-radius: 50%; display: inline-block;"></span>
              Continue with Facebook
            </button>

            <!-- Bottom Text -->
            <p class="text-center text-small text-muted">
              Already have an account? <a href="{{ route('login') }}" class="text-primary">Sign in</a>
            </p>
          </form>
        </div>
      </div>
@endsection
