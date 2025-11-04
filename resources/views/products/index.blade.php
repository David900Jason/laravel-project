@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
</div>

@if ($products->count())
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Name</th>
            <th width="120">Price</th>
            <th>Description</th>
            <th width="180">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="alert alert-info">No products found.</div>
@endif
@endsection
