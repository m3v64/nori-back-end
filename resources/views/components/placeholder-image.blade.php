@props(['src' => null, 'alt' => '', 'class' => '', 'width' => 400, 'height' => 250])

@if($src && file_exists(public_path($src)))
    <img src="{{ asset($src) }}" alt="{{ $alt }}" class="{{ $class }}">
@else
    <div class="{{ $class }}" style="width: 100%; aspect-ratio: {{ $width }}/{{ $height }}; background: var(--medium-gray, #E0E0E0); border-radius: var(--radius, 4px); display: flex; align-items: center; justify-content: center; color: var(--dark-gray, #323232); font-size: 14px; font-weight: 600;">
        {{ $alt ?: 'Image' }}
    </div>
@endif
