@extends('layouts.app')
@section('title', 'Order #'.$order->id)
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0"><i class="fas fa-receipt me-2" style="color:#e94560"></i>Order #{{ $order->id }}</h2>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Orders
        </a>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header fw-bold" style="background:#1a1a2e;color:white">
                    Order Info
                </div>
                <div class="card-body">
                    <p class="mb-2"><strong>Order ID:</strong> #{{ $order->id }}</p>
                    <p class="mb-2"><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                    <p class="mb-2"><strong>Phone:</strong> {{ $order->phone }}</p>
                    <p class="mb-2"><strong>Address:</strong> {{ $order->address }}</p>
                    <p class="mb-0"><strong>Status:</strong>
                        <span class="badge
                            {{ $order->status == 'delivered' ? 'bg-success' :
                              ($order->status == 'pending' ? 'bg-warning' :
                              ($order->status == 'processing' ? 'bg-info' : 'bg-danger')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold" style="background:#1a1a2e;color:white">
                    Order Items
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="p-3">Product</th>
                                <th class="p-3">Price</th>
                                <th class="p-3">Qty</th>
                                <th class="p-3">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td class="p-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ $item->product->image ? asset('storage/'.$item->product->image) : 'https://via.placeholder.com/40' }}"
                                             width="40" height="40" style="object-fit:cover;border-radius:6px">
                                        {{ $item->product->name }}
                                    </div>
                                </td>
                                <td class="p-3">Rs. {{ number_format($item->price) }}</td>
                                <td class="p-3">{{ $item->quantity }}</td>
                                <td class="p-3 fw-bold" style="color:#e94560">
                                    Rs. {{ number_format($item->price * $item->quantity) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="p-3 text-end fw-bold">Grand Total:</td>
                                <td class="p-3 fw-bold fs-5" style="color:#e94560">
                                    Rs. {{ number_format($order->total) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection