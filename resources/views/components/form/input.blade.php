@props(['hasError' => $errors->has($attributes['name'])])

<input {{ $attributes->class(['form-control', 'is-invalid' => $hasError]) }} />

<div class="input-group-append">
    <div class="input-group-text">
        <span class="fas {{ $attributes['icon'] }}"></span>
    </div>
</div>

@if ($hasError)
    <span class="error invalid-feedback">{{ $errors->first($attributes['name']) }}</span>
@endif