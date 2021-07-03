@extends('layouts.app')

@section('content-header')
<x-header title="New Product">
    <x-breadcrumb>
        <x-breadcrumb-item :route="route('home')" icon="fa-home" />
        <x-breadcrumb-item :route="route('products.index')" :name="__('products')" />
    </x-breadcrumb>
</x-header>
@endsection

@section('content')
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">{{ __('New product') }}</h3>
    </div>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <x-form.input 
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                />
            </div>
            <div class="form-group">
                <label for="slug">{{ __('Slug') }}</label>
                <x-form.input 
                    type="text"
                    name="slug"
                    :value="old('slug')"
                    required
                />
            </div>
            <div class="form-group">
                <label for="description">{{ __('Description') }}</label>
                <x-form.textarea 
                    name="description"
                    rows="5"
                    :value="old('description')"
                    required
                />
            </div>
        </div>

        <div class="card-footer">
            <x-form.button class="btn-success">{{ __('Save') }}</x-form.button>
        </div>
    </form>
</div>
@endsection