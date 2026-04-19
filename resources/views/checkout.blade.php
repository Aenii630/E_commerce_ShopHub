@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4"><i class="fas fa-credit-card me-2" style="color:#e94560"></i>Checkout</h2>
    <div class="row g-4">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header fw-bold" style="background:#1a1a2e;color:white">
                    <i class="fas fa-map-marker-alt me-2"></i>Delivery Information
                </div>
                <div class="card-body">
                    <form action="{{ route('order.place') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Phone Number *</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                   placeholder="03XX-XXXXXXX" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Delivery Address *</label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                                      rows="3" placeholder="Enter your full address..." required></textarea>
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-check-circle me-2"></i>Place Order
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header fw-bold" style="background:#1a1a2e;color:white">
                    <i class="fas fa-shopping-bag me-2"></i>Order Summary
                </div>
                <div class="card-body p-0">
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <div class="d-flex align-items-center gap-3 p-3 border-bottom">
                        <img src="{{ $item['image'] ? asset('storage/'.$item['image']) : 'https://via.placeholder.com/50' }}"
                             width="50" height="50" style="object-fit:cover;border-radius:8px">
                        <div class="flex-grow-1">
                            <p class="mb-0 fw-bold small">{{ $item['name'] }}</p>
                            <small class="text-muted">Qty: {{ $item['quantity'] }}</small>
                        </div>
                        <span class="fw-bold" style="color:#e94560">Rs. {{ number_format($item['price'] * $item['quantity']) }}</span>
                    </div>
                    @endforeach
                    <div class="p-3">
                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Total:</span>
                            <span style="color:#e94560">Rs. {{ number_format($total) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection