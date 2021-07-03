@props (['name' => false, 'icon' => false])

<li class="breadcrumb-item">
    <a href="{{ $attributes['route'] }}">
        @if ($icon)
            <i class="fas {{ $icon }}"></i>
        @endif

        @if ($name)
            {{ $name }}
        @endif
    </a>
</li>