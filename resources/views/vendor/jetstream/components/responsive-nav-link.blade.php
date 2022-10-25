@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-6 text-base font-medium text-white focus:outline-none focus:text-white focus:bg-indigo-100 focus:border-indigo-700 transition'
            : 'block pl-3 pr-4 py-6 text-base font-medium text-white focus:outline-none focus:text-white transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
