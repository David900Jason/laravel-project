@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $product->name }}</h2>
    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
