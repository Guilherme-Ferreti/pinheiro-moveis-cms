@extends('layouts.app')

@section('content-header')
<x-header title="Product Management">
    <x-breadcrumb>
        <x-breadcrumb-item :route="route('home')" icon="fa-home" />
        <x-breadcrumb-item :route="route('products.index')" name="products" />
    </x-breadcrumb> 
</x-header>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="card-title">Products</h3>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card-tools">
                                <form action="{{ route('products.index') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input type="text" name="search" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-plus-circle"></i>
                                New 
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>#{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-xs" href="{{ route('products.edit', $product->id) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-xs" href="#">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $products->onEachSide(1)->links() }}
        </div>
    </div>
</div>
@endsection