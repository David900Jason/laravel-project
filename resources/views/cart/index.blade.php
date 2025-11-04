@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Your Cart</h2>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (count($cart) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price ($)</th>
                <th>Quantity</th>
                <th>Total ($)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($cart as $id => $item)
            @php $total += $item['price'] * $item['quantity']; @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['price'] * $item['quantity'] }}</td>
                <td>
                    <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm btn-danger">Remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total: ${{ $total }}</h4>

    <div class="mt-3">
        <a href="{{ route('cart.clear') }}" class="btn btn-warning">Clear Cart</a>
        <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
    </div>
    @else
    <p>Your cart is empty.</p>
    @endif
</div>
@endsection
