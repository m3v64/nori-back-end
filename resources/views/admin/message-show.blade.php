@extends('layouts.wireframe')

@section('title', $message->subject . ' - Nori Admin')

@section('content')
      <div class="flex items-center gap-2 text-xs py-4">
        <a href="{{ route('home') }}">Home</a>
        <span class="text-gray-400">&rsaquo;</span>
        <a href="{{ route('admin.messages') }}">Messages</a>
        <span class="text-gray-400">&rsaquo;</span>
        <span>{{ Str::limit($message->subject, 30) }}</span>
      </div>

      <section class="mb-12 max-w-3xl">
        <div class="border border-medium-gray rounded p-6 bg-white">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold">{{ $message->subject }}</h3>
            @if($message->isRead())
              <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-medium-gray text-dark-gray rounded">Read</span>
            @else
              <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-primary text-white rounded">New</span>
            @endif
          </div>

          <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
              <span class="text-xs text-dark-gray">From</span>
              <p class="font-semibold">{{ $message->name }}</p>
            </div>
            <div>
              <span class="text-xs text-dark-gray">Email</span>
              <p class="font-semibold">{{ $message->email }}</p>
            </div>
            <div>
              <span class="text-xs text-dark-gray">Received</span>
              <p class="font-semibold">{{ $message->created_at->format('d M Y, H:i') }}</p>
            </div>
          </div>

          <hr class="border-t border-medium-gray">

          <div class="mt-6">
            <p>{{ $message->message }}</p>
          </div>
        </div>

        <div class="mt-6">
          <a href="{{ route('admin.messages') }}" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold border-2 border-black rounded hover:bg-light-gray no-underline text-black">← Back to Messages</a>
        </div>
      </section>
@endsection
