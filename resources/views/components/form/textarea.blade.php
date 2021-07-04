@props(['hasError' => $errors->has($attributes['name'])])

<textarea {{ $attributes->class(['form-control', 'is-invalid' => $hasError]) }}>{{ $attributes['value'] }}</textarea>

@if ($hasError)
    <span class="error invalid-feedback">{{ $errors->first($attributes['name']) }}</span>
@endif