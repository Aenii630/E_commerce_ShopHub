@extends('layouts.admin')
@section('title', 'Orders')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-shopping-cart me-2" style="color:#e94560"></i>All Orders</h5>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="ordersTable">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>Rs. {{ number_format($order->total) }}</td>
                    <td>
                        <span class="badge
                            {{ $order->status == 'delivered' ? 'bg-success' :
                              ($order->status == 'pending' ? 'bg-warning' :
                              ($order->status == 'processing' ? 'bg-info' : 'bg-danger')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script>$('#ordersTable').DataTable();</script>
@endpush