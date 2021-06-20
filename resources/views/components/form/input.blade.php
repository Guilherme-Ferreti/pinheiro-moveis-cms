@props(['disabled' => false])

<input 
    {{ $attributes->merge([
        'class' => 'form-control' . ($errors->has($attributes['name']) ? ' is-invalid' : '')
    ]) }}

    {{ $disabled ? 'disabled' : '' }}
/>

<div class="input-group-append">
    <div class="input-group-text">
        <span class="fas {{ $attributes['icon'] }}"></span>
    </div>
</div>

@error ($attributes['name'])
    <span class="error invalid-feedback">{{ $errors->first($attributes['name']) }}</span>
@enderror