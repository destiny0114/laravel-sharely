@props(["active"])

@php
    $classes = ($active ?? false)
                ? 'flex-1 p-2 rounded-lg font-bold text-lg text-center bg-blue-100 text-blue-500'
                : 'flex-1 p-2 rounded-lg font-bold text-lg text-center hover:bg-blue-100 hover:text-blue-500 transition ease-in-out duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
