@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-4 text-base font-medium text-white focus:outline-none focus:text-white focus:bg-indigo-100 focus:border-indigo-700 transition'
            : 'block pl-3 pr-4 py-4 border-transparent text-base font-medium text-gray-600 hover:text-white hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-text-white focus:bg-gray-50 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
