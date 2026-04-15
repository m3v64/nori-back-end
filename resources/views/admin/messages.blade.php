@extends('layouts.wireframe')

@section('title', 'Messages - Nori Admin')

@section('content')
      <h2 class="text-3xl font-bold mb-8 pb-4 border-b-2 border-medium-gray">Contact Messages</h2>

      <div class="flex items-center gap-2 text-xs py-4">
        <a href="{{ route('home') }}">Home</a>
        <span class="text-gray-400">&rsaquo;</span>
        <span>Messages</span>
      </div>

      @if($messages->isEmpty())
        <div class="border border-medium-gray rounded p-12 text-center">
          <p class="text-dark-gray">No messages received yet.</p>
        </div>
      @else
        <div class="flex flex-col gap-4">
          @foreach ($messages as $msg)
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
              <p class="text-xs text-dark-gray mt-2">{{ $msg->email }}</p>
            </div>
          </a>
          @endforeach
        </div>
      @endif
@endsection
