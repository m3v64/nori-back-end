@extends('layouts.wireframe')

@section('title', 'Contact - Nori')

@section('content')
      <h2 class="text-3xl font-bold mb-8 pb-4 border-b-2 border-medium-gray">Contact Us</h2>

      <div class="flex items-center gap-2 text-xs py-4">
        <a href="{{ route('home') }}">Home</a>
        <span class="text-gray-400">&rsaquo;</span>
        <span>Contact</span>
      </div>

      <div class="grid grid-cols-[1fr_395px] gap-8">
        <!-- Contact Form -->
        <div>
          <section class="mb-12 max-w-xl">
            @if (session('success'))
              <div class="border border-success rounded p-6 bg-light-gray mb-6">
                <p class="font-semibold text-success">{{ session('success') }}</p>
              </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST">
              @csrf

              <div class="border border-medium-gray rounded p-6 bg-white">
                <h4 class="text-2xl font-bold mb-6">Send us a message</h4>

                <div class="flex flex-col gap-2 mb-6">
                  <label class="text-sm font-semibold" for="name">Name</label>
                  <input type="text" name="name" id="name" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" placeholder="Your name" value="{{ old('name') }}">
                  @error('name')
                    <p class="text-xs text-danger mt-1">{{ $message }}</p>
                  @enderror
                </div>

                <div class="flex flex-col gap-2 mb-6">
                  <label class="text-sm font-semibold" for="email">Email</label>
                  <input type="email" name="email" id="email" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" placeholder="your@email.com" value="{{ old('email') }}">
                  @error('email')
                    <p class="text-xs text-danger mt-1">{{ $message }}</p>
                  @enderror
                </div>

                <div class="flex flex-col gap-2 mb-6">
                  <label class="text-sm font-semibold" for="subject">Subject</label>
                  <input type="text" name="subject" id="subject" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" placeholder="What is this about?" value="{{ old('subject') }}">
                  @error('subject')
                    <p class="text-xs text-danger mt-1">{{ $message }}</p>
                  @enderror
                </div>

                <div class="flex flex-col gap-2 mb-6">
                  <label class="text-sm font-semibold" for="message">Message</label>
                  <textarea name="message" id="message" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary resize-y min-h-32" rows="5" placeholder="Your message...">{{ old('message') }}</textarea>
                  @error('message')
                    <p class="text-xs text-danger mt-1">{{ $message }}</p>
                  @enderror
                </div>

                <button type="submit" class="inline-flex items-center justify-center h-11 px-6 text-base font-semibold bg-primary text-white rounded hover:bg-primary-light hover:text-black cursor-pointer">Send Message</button>
              </div>
            </form>
          </section>
        </div>

        <!-- Contact Info Sidebar -->
        <aside>
          <div class="border-2 border-black rounded p-4 bg-white sticky top-4">
            <h4 class="text-2xl font-bold mb-6">Restaurant Info</h4>

            <div class="flex items-start gap-4 mb-6">
              <x-icon name="map-pin" />
              <div>
                <span class="font-semibold">Location</span>
                <p class="text-xs text-dark-gray">Amsterdam Centrum, Netherlands</p>
              </div>
            </div>

            <div class="flex items-start gap-4 mb-6">
              <x-icon name="clock" />
              <div>
                <span class="font-semibold">Opening Hours</span>
                <p class="text-xs text-dark-gray">Mon - Fri: 11:00 - 22:00</p>
                <p class="text-xs text-dark-gray">Sat - Sun: 12:00 - 23:00</p>
              </div>
            </div>

            <div class="flex items-start gap-4 mb-6">
              <x-icon name="globe" />
              <div>
                <span class="font-semibold">Email</span>
                <p class="text-xs text-dark-gray">info@nori-restaurant.nl</p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <x-icon name="utensils" />
              <div>
                <span class="font-semibold">Cuisine</span>
                <p class="text-xs text-dark-gray">Authentic Japanese</p>
              </div>
            </div>
          </div>
        </aside>
      </div>
@endsection
