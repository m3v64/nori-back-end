@extends('layouts.wireframe')

@section('title', 'Profile - Nori')

@section('content')
      <h2 class="text-3xl font-bold mb-8 pb-4 border-b-2 border-medium-gray">Profile</h2>

      <div class="max-w-xl space-y-10">

        <!-- Profile Information -->
        <section class="border border-medium-gray rounded p-6 bg-white">
          <h3 class="text-xl font-bold mb-2">Profile Information</h3>
          <p class="text-xs text-dark-gray mb-6">Update your account's name and email address.</p>

          <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
          </form>

          <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="name">Name</label>
              <input type="text" name="name" id="name" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
              @error('name')
                <p class="text-xs text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="email">Email</label>
              <input type="email" name="email" id="email" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" value="{{ old('email', $user->email) }}" required autocomplete="username">
              @error('email')
                <p class="text-xs text-danger mt-1">{{ $message }}</p>
              @enderror

              @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                  <p class="text-sm text-dark-gray">
                    Your email address is unverified.
                    <button form="send-verification" class="text-primary underline hover:text-primary-dark text-sm">Click here to re-send the verification email.</button>
                  </p>
                  @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm text-success font-semibold">A new verification link has been sent to your email address.</p>
                  @endif
                </div>
              @endif
            </div>

            <div class="flex items-center gap-4">
              <button type="submit" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold bg-primary text-white rounded hover:bg-primary-light hover:text-black cursor-pointer">Save</button>
              @if (session('status') === 'profile-updated')
                <p class="text-sm text-success font-semibold" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">Saved.</p>
              @endif
            </div>
          </form>
        </section>

        <!-- Update Password -->
        <section class="border border-medium-gray rounded p-6 bg-white">
          <h3 class="text-xl font-bold mb-2">Update Password</h3>
          <p class="text-xs text-dark-gray mb-6">Ensure your account is using a long, random password to stay secure.</p>

          <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="update_password_current_password">Current Password</label>
              <input type="password" name="current_password" id="update_password_current_password" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" autocomplete="current-password">
              @if ($errors->updatePassword->has('current_password'))
                <p class="text-xs text-danger mt-1">{{ $errors->updatePassword->first('current_password') }}</p>
              @endif
            </div>

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="update_password_password">New Password</label>
              <input type="password" name="password" id="update_password_password" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" autocomplete="new-password">
              @if ($errors->updatePassword->has('password'))
                <p class="text-xs text-danger mt-1">{{ $errors->updatePassword->first('password') }}</p>
              @endif
            </div>

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="update_password_password_confirmation">Confirm Password</label>
              <input type="password" name="password_confirmation" id="update_password_password_confirmation" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" autocomplete="new-password">
              @if ($errors->updatePassword->has('password_confirmation'))
                <p class="text-xs text-danger mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</p>
              @endif
            </div>

            <div class="flex items-center gap-4">
              <button type="submit" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold bg-primary text-white rounded hover:bg-primary-light hover:text-black cursor-pointer">Save</button>
              @if (session('status') === 'password-updated')
                <p class="text-sm text-success font-semibold" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">Saved.</p>
              @endif
            </div>
          </form>
        </section>

        <!-- Delete Account -->
        <section class="border border-danger/30 rounded p-6 bg-white">
          <h3 class="text-xl font-bold mb-2 text-danger">Delete Account</h3>
          <p class="text-xs text-dark-gray mb-6">Once your account is deleted, all of its resources and data will be permanently deleted.</p>

          <form method="post" action="{{ route('profile.destroy') }}" x-data="{ confirming: false }">
            @csrf
            @method('delete')

            <div x-show="!confirming">
              <button type="button" x-on:click="confirming = true" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold bg-danger text-white rounded hover:bg-red-700 cursor-pointer">Delete Account</button>
            </div>

            <div x-show="confirming" x-cloak class="space-y-4">
              <p class="text-sm font-semibold">Are you sure? Enter your password to confirm.</p>

              <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold" for="delete_password">Password</label>
                <input type="password" name="password" id="delete_password" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary max-w-xs" placeholder="Password">
                @if ($errors->userDeletion->has('password'))
                  <p class="text-xs text-danger mt-1">{{ $errors->userDeletion->first('password') }}</p>
                @endif
              </div>

              <div class="flex gap-4">
                <button type="submit" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold bg-danger text-white rounded hover:bg-red-700 cursor-pointer">Confirm Delete</button>
                <button type="button" x-on:click="confirming = false" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold border-2 border-black rounded hover:bg-light-gray cursor-pointer">Cancel</button>
              </div>
            </div>
          </form>
        </section>

      </div>
@endsection
