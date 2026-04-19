@extends('layouts.app')
@section('title', 'Products')
@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header fw-bold" style="background:#1a1a2e;color:white">
                    <i class="fas fa-search me-2"></i>Search Products
                </div>
                <div class="card-body">
                    <form method="GET">
                        <input type="text" name="search" class="form-control mb-2"
                               placeholder="Search..." value="{{ request('search') }}">
                        <button class="btn btn-primary w-100">Search</button>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header fw-bold" style="background:#1a1a2e;color:white">
                    <i class="fas fa-tags me-2"></i>Categories
                </div>
                <div class="card-body p-0">
                    <a href="{{ route('products.index') }}"
                       class="d-block px-3 py-2 text-decoration-none border-bottom {{ !request('category') ? 'text-danger fw-bold' : 'text-dark' }}">
                        <i class="fas fa-th me-2"></i>All Products
                    </a>
                    @foreach($categories as $cat)
                    <a href="{{ route('products.index', ['category' => $cat->category]) }}"
                       class="d-block px-3 py-2 text-decoration-none border-bottom {{ request('category') == $cat->category ? 'text-danger fw-bold' : 'text-dark' }}">
                        <i class="fas fa-tag me-2" style="color:#e94560"></i>{{ $cat->category }}
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold" style="background:#1a1a2e;color:white">
                    <i class="fas fa-info-circle me-2"></i>Need Help?
                </div>
                <div class="card-body text-center">
                    <p class="text-muted small">Contact us for any query</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-sm w-100">
                        <i class="fas fa-envelope me-1"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">
                    {{ request('category') ? request('category') : 'All Products' }}
                    <span class="badge bg-secondary ms-2">{{ $products->total() }}</span>
                </h4>
            </div>
            @if($products->count() > 0)
            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100">
                        <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/300x200?text='.urlencode($product->name) }}"
                             class="card-img-top" style="height:180px;object-fit:cover" alt="{{ $product->name }}">
                        <div class="card-body">
                            <span class="badge mb-1" style="background:#e94560">{{ $product->category }}</span>
                            <h6 class="card-title fw-bold">{{ $product->name }}</h6>
                            <p class="text-muted small">{{ Str::limit($product->description, 50) }}</p>
                            <strong style="color:#e94560">Rs. {{ number_format($product->price) }}</strong>
                        </div>
                        <div class="card-footer bg-white d-flex gap-2">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-secondary btn-sm flex-fill">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="flex-fill">
                                @csrf
                                <button class="btn btn-primary btn-sm w-100">
                                    <i class="fas fa-cart-plus"></i> Add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4">{{ $products->links() }}</div>
            @else
            <div class="text-center py-5">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No products found</h5>
                <a href="{{ route('products.index') }}" class="btn btn-primary mt-2">View All Products</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection