@extends('layouts.app')

@section('title', 'Login - Food Delivery App')

@section('content')
      <h2 class="page-title">Login Page</h2>

      <!-- Centered Login Card -->
      <div style="display: flex; justify-content: center; padding: var(--space-xl) 0;">
        <div class="card" style="width: 100%; max-width: 448px; padding: var(--space-xl) var(--space-lg);">
          <!-- Logo -->
          <div style="width: 160px; height: 48px; background: var(--medium-gray); border-radius: var(--radius); margin: 0 auto var(--space-md);"></div>

          <!-- Title -->
          <h3 class="text-center" style="margin-bottom: var(--space-xs);">Welcome Back</h3>
          <p class="text-center text-muted body-large" style="margin-bottom: var(--space-lg);">Sign in to continue</p>

          <!-- Form -->
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-md">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-input" placeholder="Enter your email address">
            </div>

            <div class="form-group mb-sm">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-input" placeholder="Enter your password">
            </div>

            <div class="flex-between mb-lg">
              <label class="check-group">
                <input type="checkbox" name="remember"> <span class="text-small">Remember me</span>
              </label>
              <a href="#" class="text-small text-primary">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary btn-md btn-full mb-lg">Sign In</button>

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
              Don't have an account? <a href="{{ route('register') }}" class="text-primary">Sign up</a>
            </p>
          </form>
        </div>
      </div>
@endsection
