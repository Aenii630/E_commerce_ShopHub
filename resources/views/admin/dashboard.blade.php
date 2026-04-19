@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card" style="background:linear-gradient(135deg,#e94560,#c23152)">
            <div class="card-body text-white p-4">
                <i class="fas fa-box fa-2x mb-3 opacity-75"></i>
                <h3 class="fw-bold">{{ $stats['products'] }}</h3>
                <p class="mb-0 opacity-75">Total Products</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card" style="background:linear-gradient(135deg,#4776e6,#8e54e9)">
            <div class="card-body text-white p-4">
                <i class="fas fa-shopping-cart fa-2x mb-3 opacity-75"></i>
                <h3 class="fw-bold">{{ $stats['orders'] }}</h3>
                <p class="mb-0 opacity-75">Total Orders</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card" style="background:linear-gradient(135deg,#11998e,#38ef7d)">
            <div class="card-body text-white p-4">
                <i class="fas fa-users fa-2x mb-3 opacity-75"></i>
                <h3 class="fw-bold">{{ $stats['users'] }}</h3>
                <p class="mb-0 opacity-75">Total Users</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card" style="background:linear-gradient(135deg,#f7971e,#ffd200)">
            <div class="card-body text-white p-4">
                <i class="fas fa-rupee-sign fa-2x mb-3 opacity-75"></i>
                <h3 class="fw-bold">{{ number_format($stats['revenue']) }}</h3>
                <p class="mb-0 opacity-75">Total Revenue (Rs.)</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Links -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <a href="{{ route('admin.products.create') }}" class="text-decoration-none">
            <div class="card text-center p-4">
                <i class="fas fa-plus-circle fa-2x mb-2" style="color:#e94560"></i>
                <p class="fw-bold mb-0">Add Product</p>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">
            <div class="card text-center p-4">
                <i class="fas fa-list fa-2x mb-2" style="color:#4776e6"></i>
                <p class="fw-bold mb-0">View Orders</p>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
            <div class="card text-center p-4">
                <i class="fas fa-users fa-2x mb-2" style="color:#11998e"></i>
                <p class="fw-bold mb-0">View Users</p>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
            <div class="card text-center p-4">
                <i class="fas fa-boxes fa-2x mb-2" style="color:#f7971e"></i>
                <p class="fw-bold mb-0">All Products</p>
            </div>
        </a>
    </div>
</div>

<!-- Recent Orders -->
<div class="card">
    <div class="card-header fw-bold d-flex justify-content-between align-items-center">
        <span><i class="fas fa-shopping-cart me-2" style="color:#e94560"></i>Recent Orders</span>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-primary">View All</a>
    </div>
    <div class="card-body">
        <table class="table table-hover" id="recentOrdersTable">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recent_orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
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
<script>$('#recentOrdersTable').DataTable();</script>
@endpush