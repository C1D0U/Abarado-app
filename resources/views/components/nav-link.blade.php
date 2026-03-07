@props([
    'active' => false,
    'href' => '#'
])

<a href="{{ $href }}"
   class="nav-link {{ $active ? 'active' : '' }}"
   aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>