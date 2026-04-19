@extends('layouts.app')
@section('title', 'My Orders')
@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4"><i class="fas fa-box me-2" style="color:#e94560"></i>My Orders</h2>
    @if($orders->count() > 0)
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead style="background:#1a1a2e;color:white">
                    <tr>
                        <th class="p-3">#Order</th>
                        <th class="p-3">Total</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Address</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="p-3 fw-bold">#{{ $order->id }}</td>
                        <td class="p-3">Rs. {{ number_format($order->total) }}</td>
                        <td class="p-3">
                            <span class="badge
                                {{ $order->status == 'delivered' ? 'bg-success' :
                                  ($order->status == 'pending' ? 'bg-warning' :
                                  ($order->status == 'processing' ? 'bg-info' : 'bg-danger')) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="p-3">{{ Str::limit($order->address, 30) }}</td>
                        <td class="p-3">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="p-3">
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye me-1"></i>View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-box-open fa-4x text-muted mb-4"></i>
        <h4 class="text-muted">No orders yet!</h4>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg mt-3">
            <i class="fas fa-shopping-bag me-2"></i>Start Shopping
        </a>
    </div>
    @endif
</div>
@endsection