@props(['active' => false])

@php
$classes = ($active ?? false)
            ? 'relative inline-flex items-center px-1 pt-1 text-sm font-medium text-sf-accent border-b-2 border-sf-accent transition duration-150 ease-in-out focus:outline-none focus:text-sf-accent focus:border-sf-accent hover-glow'
            : 'relative inline-flex items-center px-1 pt-1 text-sm font-medium text-sf-text-muted hover:text-sf-text hover:border-sf-text-muted border-b-2 border-transparent transition duration-150 ease-in-out focus:outline-none focus:text-sf-text focus:border-sf-text-muted';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
