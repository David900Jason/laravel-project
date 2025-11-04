@extends('layouts.app')

@section('content')
<h2 class="mb-4">Add New Product</h2>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
