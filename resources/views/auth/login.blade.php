@extends('layouts.wireframe')

@section('title', 'Login - Nori')

@section('content')
      <div class="flex items-center justify-center py-16">
        <div class="w-full max-w-md">
          <h2 class="text-3xl font-bold mb-8 text-center">Login</h2>

          @if (session('status'))
            <div class="border border-success rounded p-4 bg-light-gray mb-6 text-center">
              <p class="text-sm text-success font-semibold">{{ session('status') }}</p>
            </div>
          @endif

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="border border-medium-gray rounded p-6 bg-white">
              <div class="flex flex-col gap-2 mb-6">
                <label class="text-sm font-semibold" for="email">Email</label>
                <input type="email" name="email" id="email" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" placeholder="your@email.com" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                  <p class="text-xs text-danger mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="flex flex-col gap-2 mb-6">
                <label class="text-sm font-semibold" for="password">Password</label>
                <input type="password" name="password" id="password" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" placeholder="Password" required autocomplete="current-password">
                @error('password')
                  <p class="text-xs text-danger mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="flex items-center mb-6">
                <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 border border-gray-400 rounded accent-primary">
                <label for="remember_me" class="ml-2 text-sm text-dark-gray">Remember me</label>
              </div>

              <button type="submit" class="w-full inline-flex items-center justify-center h-11 px-6 text-base font-semibold bg-primary text-white rounded hover:bg-primary-light hover:text-black cursor-pointer">Log in</button>

              <div class="flex items-center justify-between mt-6 text-sm">
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="text-primary hover:underline">Forgot your password?</a>
                @endif
                @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="text-primary hover:underline">Create an account</a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
@endsection
