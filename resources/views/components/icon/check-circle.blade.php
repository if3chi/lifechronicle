@php
$classes = $attributes->has('class') ? $attributes->get('class') : 'h-6 w-6 text-green-400';
@endphp

<svg {{ $attributes->merge(['class' => $classes]) }} x-description="Heroicon name: outline/check-circle"
    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
