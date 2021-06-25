@props(['hasError' => $errors->has($attributes['name']), 'icon' => false])

<input {{ $attributes->class(['form-control', 'is-invalid' => $hasError]) }} />

@if ($icon)
<div class="input-group-append">
    <div class="input-group-text">
        <span class="fas {{ $icon }}"></span>
    </div>
</div>
@endif

@if ($hasError)
    <span class="error invalid-feedback">{{ $errors->first($attributes['name']) }}</span>
@endif