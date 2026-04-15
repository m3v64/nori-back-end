@extends('layouts.wireframe')

@section('title', 'Dashboard - Nori')

@php
  $messages = \App\Models\ContactMessage::latest()->get();
  $dishCount = \App\Models\Dish::count();
@endphp

@section('content')
      <h2 class="text-3xl font-bold mb-8 pb-4 border-b-2 border-medium-gray">Dashboard</h2>

      <!-- Stats -->
      <div class="grid grid-cols-3 gap-4 mb-12">
        <div class="border border-medium-gray rounded p-6 bg-white">
          <p class="text-xs text-dark-gray mb-1">Total Messages</p>
          <p class="text-2xl font-bold">{{ $messages->count() }}</p>
        </div>
        <div class="border border-medium-gray rounded p-6 bg-white">
          <p class="text-xs text-dark-gray mb-1">Unread</p>
          <p class="text-2xl font-bold text-primary">{{ $messages->filter(fn ($m) => !$m->isRead())->count() }}</p>
        </div>
        <div class="border border-medium-gray rounded p-6 bg-white">
          <p class="text-xs text-dark-gray mb-1">Menu Items</p>
          <p class="text-2xl font-bold">{{ $dishCount }}</p>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="flex gap-4 mb-12">
        <a href="{{ route('menu.create') }}" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold bg-primary text-white rounded hover:bg-primary-light hover:text-black no-underline">+ Add Menu Item</a>
        <a href="{{ route('menu.index') }}" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold border-2 border-black rounded hover:bg-light-gray no-underline text-black">View Menu</a>
      </div>

      <!-- Recent Messages -->
      <section>
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-2xl font-bold">Recent Messages</h3>
          @if($messages->count() > 5)
            <a href="{{ route('admin.messages') }}" class="text-primary font-semibold hover:underline text-sm">View All →</a>
          @endif
        </div>

        @if($messages->isEmpty())
          <div class="border border-medium-gray rounded p-12 text-center">
            <p class="text-dark-gray">No messages received yet.</p>
          </div>
        @else
          <div class="flex flex-col gap-4">
            @foreach ($messages->take(5) as $msg)
            <a href="{{ route('admin.messages.show', $msg) }}" class="flex gap-4 border border-medium-gray rounded p-4 no-underline text-black hover:bg-light-gray {{ !$msg->isRead() ? 'border-l-4 border-l-primary' : '' }}">
              <div class="flex-1">
                <div class="flex items-center justify-between mb-2">
                  <div class="flex items-center gap-4">
                    <span class="font-semibold {{ !$msg->isRead() ? 'font-bold' : '' }}">{{ $msg->name }}</span>
                    @if(!$msg->isRead())
                      <span class="inline-flex items-center px-2 py-0.5 text-[10px] font-semibold bg-primary text-white rounded">New</span>
                    @endif
                  </div>
                  <span class="text-xs text-dark-gray">{{ $msg->created_at->diffForHumans() }}</span>
                </div>
                <div class="font-semibold text-xs mb-2">{{ $msg->subject }}</div>
                <p class="text-xs text-dark-gray">{{ Str::limit($msg->message, 120) }}</p>
              </div>
            </a>
            @endforeach
          </div>
        @endif
      </section>
@endsection
