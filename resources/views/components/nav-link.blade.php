@php
    $additional = Route::currentRouteName() === $route ? 'bg-lime-500/50' : ''
@endphp
<a
    href="{{ route($route) }}"
    {{ $attributes->class("rounded-md px-3 py-2 text-sm font-medium text-white ".$additional ) }}
>{{ $label }}</a>
