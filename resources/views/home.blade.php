@extends('layouts.app')
@section('title', 'Home')
@section('content')

<!-- Hero Section -->
<section style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); min-height: 85vh;" class="d-flex align-items-center text-white">
    <div class="container text-center py-5">
        <h1 class="display-2 fw-bold mb-3">Welcome to <span style="color:#e94560">ShopHub</span></h1>
        <p class="lead mb-4 text-light">Pakistan's Best Online Shopping Experience - Sadiqabad</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-5 me-3">
            <i class="fas fa-shopping-bag me-2"></i>Shop Now
        </a>
        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-5">
            <i class="fas fa-envelope me-2"></i>Contact Us
        </a>
        <div class="row g-4 mt-5">
            <div class="col-md-3 col-6">
                <div class="p-3" style="background:rgba(255,255,255,0.1);border-radius:12px">
                    <i class="fas fa-truck fs-2 mb-2" style="color:#e94560"></i>
                    <p class="mb-0 fw-bold">Free Delivery</p>
                    <small class="text-muted">On orders Rs.1000+</small>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-3" style="background:rgba(255,255,255,0.1);border-radius:12px">
                    <i class="fas fa-shield-alt fs-2 mb-2" style="color:#e94560"></i>
                    <p class="mb-0 fw-bold">Secure Payment</p>
                    <small class="text-muted">100% Safe & Secure</small>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-3" style="background:rgba(255,255,255,0.1);border-radius:12px">
                    <i class="fas fa-undo fs-2 mb-2" style="color:#e94560"></i>
                    <p class="mb-0 fw-bold">Easy Returns</p>
                    <small class="text-muted">7 Days Return Policy</small>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-3" style="background:rgba(255,255,255,0.1);border-radius:12px">
                    <i class="fas fa-headset fs-2 mb-2" style="color:#e94560"></i>
                    <p class="mb-0 fw-bold">24/7 Support</p>
                    <small class="text-muted">Always Available</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-2">Shop By Category</h2>
        <p class="text-center text-muted mb-4">Find what you are looking for</p>
        <div class="row g-3 justify-content-center">
            @foreach($categories as $cat)
            <div class="col-md-2 col-4">
                <a href="{{ route('products.index', ['category' => $cat->category]) }}" class="text-decoration-none">
                    <div class="card text-center p-3 h-100">
                        <i class="fas fa-tag fs-2 mb-2" style="color:#e94560"></i>
                        <small class="fw-bold text-dark">{{ $cat->category }}</small>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5" style="background:#f8f9fa">
    <div class="container">
        <h2 class="fw-bold text-center mb-2">Featured Products</h2>
        <p class="text-center text-muted mb-4">Best selling products for you</p>
        <div class="row g-4">
            @foreach($featured as $product)
            <div class="col-md-3 col-sm-6">
                <div class="card h-100">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/300x200?text='.urlencode($product->name) }}"
                         class="card-img-top" style="height:200px;object-fit:cover" alt="{{ $product->name }}">
                    <div class="card-body">
                        <span class="badge mb-2" style="background:#e94560">{{ $product->category }}</span>
                        <h6 class="card-title fw-bold">{{ $product->name }}</h6>
                        <p class="text-muted small">{{ Str::limit($product->description, 60) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="fs-5" style="color:#e94560">Rs. {{ number_format($product->price) }}</strong>
                            <small class="text-muted"><i class="fas fa-box me-1"></i>{{ $product->stock }} left</small>
                        </div>
                    </div>
                    <div class="card-footer bg-white d-flex gap-2">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-outline-secondary btn-sm flex-fill">
                            <i class="fas fa-eye me-1"></i>View
                        </a>
                        <form action="{{ route('cart.add', $product) }}" method="POST" class="flex-fill">
                            @csrf
                            <button class="btn btn-primary btn-sm w-100">
                                <i class="fas fa-cart-plus me-1"></i>Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-5">
                <i class="fas fa-th me-2"></i>View All Products
            </a>
        </div>
    </div>
</section>
@endsection