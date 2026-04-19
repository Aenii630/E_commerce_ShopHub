@extends('layouts.admin')
@section('title', 'Products')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-box me-2" style="color:#e94560"></i>All Products</h5>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Product
    </a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="productsTable">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>#{{ $product->id }}</td>
                    <td>
                        <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/50' }}"
                             width="50" height="50" style="object-fit:cover;border-radius:8px">
                    </td>
                    <td class="fw-bold">{{ $product->name }}</td>
                    <td><span class="badge bg-secondary">{{ $product->category }}</span></td>
                    <td>Rs. {{ number_format($product->price) }}</td>
                    <td>
                        <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $product->stock }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this product?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script>$('#productsTable').DataTable();</script>
@endpush