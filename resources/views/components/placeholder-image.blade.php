@props(['src' => null, 'alt' => '', 'class' => '', 'width' => 400, 'height' => 250])

@if($src && file_exists(public_path($src)))
    <img src="{{ asset($src) }}" alt="{{ $alt }}" class="{{ $class }}">
@else
    <div class="{{ $class }} w-full bg-medium-gray rounded flex items-center justify-center text-dark-gray text-sm font-semibold" style="aspect-ratio: {{ $width }}/{{ $height }};">
        {{ $alt ?: 'Image' }}
    </div>
@endif
