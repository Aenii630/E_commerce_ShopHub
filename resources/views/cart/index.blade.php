@extends('layouts.app')
@section('title', 'Shopping Cart')
@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4"><i class="fas fa-shopping-cart me-2" style="color:#e94560"></i>Shopping Cart</h2>
    @if(count($cart) > 0)
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead style="background:#1a1a2e;color:white">
                            <tr>
                                <th class="p-3">Product</th>
                                <th class="p-3">Price</th>
                                <th class="p-3">Quantity</th>
                                <th class="p-3">Total</th>
                                <th class="p-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $item)
                            <tr>
                                <td class="p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ $item['image'] ? asset('storage/'.$item['image']) : 'https://via.placeholder.com/60?text=P' }}"
                                             width="60" height="60" style="object-fit:cover;border-radius:8px">
                                        <span class="fw-bold">{{ $item['name'] }}</span>
                                    </div>
                                </td>
                                <td class="p-3">Rs. {{ number_format($item['price']) }}</td>
                                <td class="p-3">
                                    <span class="badge bg-secondary fs-6">{{ $item['quantity'] }}</span>
                                </td>
                                <td class="p-3 fw-bold" style="color:#e94560">
                                    Rs. {{ number_format($item['price'] * $item['quantity']) }}
                                </td>
                                <td class="p-3">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header fw-bold" style="background:#1a1a2e;color:white">
                    <i class="fas fa-receipt me-2"></i>Order Summary
                </div>
                <div class="card-body">
                    @php $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']); @endphp
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span>Rs. {{ number_format($total) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Delivery:</span>
                        <span class="text-success">Free</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold fs-5">
                        <span>Total:</span>
                        <span style="color:#e94560">Rs. {{ number_format($total) }}</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn btn-primary w-100 mt-3 btn-lg">
                        <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                    </a>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                        <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-shopping-cart fa-4x text-muted mb-4"></i>
        <h4 class="text-muted">Your cart is empty!</h4>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg mt-3">
            <i class="fas fa-shopping-bag me-2"></i>Start Shopping
        </a>
    </div>
    @endif
</div>
@endsection