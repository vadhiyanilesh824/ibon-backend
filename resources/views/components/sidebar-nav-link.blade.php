@props(['active'])

@php
$classes = ($is_active ?? false)
            ? 'nav-link active'
            : 'nav-link';
@endphp

<a  class="{{ $classes }}" href="{{ $url }}" >
    {{ $slot }}
</a>
