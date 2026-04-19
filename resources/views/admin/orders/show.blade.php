@extends('layouts.admin')
@section('title', 'Order #'.$order->id)
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-receipt me-2" style="color:#e94560"></i>Order #{{ $order->id }}</h5>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back
    </a>
</div>
<div class="row g-4">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header fw-bold">Customer Info</div>
            <div class="card-body">
                <p class="mb-1"><strong>Name:</strong> {{ $order->user->name }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $order->user->email }}</p>
                <p class="mb-1"><strong>Phone:</strong> {{ $order->phone }}</p>
                <p class="mb-0"><strong>Address:</strong> {{ $order->address }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header fw-bold">Update Status</div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.orders.status', [$order, 'pending']) }}"
                       class="btn {{ $order->status == 'pending' ? 'btn-warning' : 'btn-outline-warning' }}">
                        Pending
                    </a>
                    <a href="{{ route('admin.orders.status', [$order, 'processing']) }}"
                       class="btn {{ $order->status == 'processing' ? 'btn-info' : 'btn-outline-info' }}">
                        Processing
                    </a>
                    <a href="{{ route('admin.orders.status', [$order, 'delivered']) }}"
                       class="btn {{ $order->status == 'delivered' ? 'btn-success' : 'btn-outline-success' }}">
                        Delivered
                    </a>
                    <a href="{{ route('admin.orders.status', [$order, 'cancelled']) }}"
                       class="btn {{ $order->status == 'cancelled' ? 'btn-danger' : 'btn-outline-danger' }}">
                        Cancelled
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header fw-bold">Order Items</div>
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
@endsection