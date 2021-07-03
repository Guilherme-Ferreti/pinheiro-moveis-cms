@props(['hasError' => $errors->has($attributes['name'])])

<textarea {{ $attributes->class(['form-control', 'is-invalid' => $hasError]) }}></textarea>