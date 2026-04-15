@props(['name', 'class' => 'w-5 h-5'])

@switch($name)
    @case('search')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        @break
    @case('star')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        @break
    @case('clock')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        @break
    @case('map-pin')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        @break
    @case('phone')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        @break
    @case('globe')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        @break
    @case('lock')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        @break
    @case('check')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
        @break
    @case('heart')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        @break
    @case('share')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
        @break
    @case('bowl')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11h18a1 1 0 0 1 .8 1.6C20 16.4 16.4 19 12 19s-8-2.6-10.8-6.4A1 1 0 0 1 2 11z"/><path d="M12 19v3"/><path d="M8 22h8"/></svg>
        @break
    @case('fish')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6.5 12c2-5.5 7-7.5 13.5-7.5-2 3.5-2 8.5 0 12-6.5 0-11.5-2-13.5-7.5z"/><path d="M2.5 15.5C4 14 4 10 2.5 8.5"/><circle cx="15" cy="12" r="1" fill="currentColor"/></svg>
        @break
    @case('salad')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13h18a1 1 0 0 1 .8 1.6C20 18 16.5 20 12 20s-8-2-9.8-5.4A1 1 0 0 1 3 13z"/><path d="M9 13c0-3 1.5-5 4-6.5"/><path d="M15 13c0-3.5-2-6-5-7"/><path d="M12 13V6"/></svg>
        @break
    @case('utensils')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg>
        @break
    @case('sake')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2h8l1 8H7z"/><path d="M7 10c0 4 2 7 5 7s5-3 5-7"/><path d="M12 17v4"/><path d="M8 21h8"/></svg>
        @break
    @case('leaf')
        <svg class="{{ $class }} inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 20 2 20 2s-1.5 5.5-3 10c-1.5 4.5-6 8-6 8z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 12 13"/></svg>
        @break
@endswitch
