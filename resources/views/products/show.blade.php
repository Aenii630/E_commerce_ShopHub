@extends('layouts.app')
@section('title', $product->name)
@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>
    <div class="row g-5">
        <div class="col-md-5">
            <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/500x400?text='.urlencode($product->name) }}"
                 class="img-fluid rounded-3 shadow" alt="{{ $product->name }}" style="width:100%">
        </div>
        <div class="col-md-7">
            <span class="badge mb-2 fs-6" style="background:#e94560">{{ $product->category }}</span>
            <h2 class="fw-bold">{{ $product->name }}</h2>
            <h3 class="fw-bold my-3" style="color:#e94560">Rs. {{ number_format($product->price) }}</h3>
            <p class="text-muted">{{ $product->description }}</p>
            <div class="d-flex align-items-center gap-3 mb-4">
                <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }} fs-6">
                    {{ $product->stock > 0 ? 'In Stock ('.$product->stock.')' : 'Out of Stock' }}
                </span>
            </div>
            @if($product->stock > 0)
            <form action="{{ route('cart.add', $product) }}" method="POST" class="d-flex gap-3">
                @csrf
                <button class="btn btn-primary btn-lg px-5">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </button>
            </form>
            @endif
            <div class="row g-3 mt-4">
                <div class="col-4 text-center p-3" style="background:#f8f9fa;border-radius:12px">
                    <i class="fas fa-truck mb-1" style="color:#e94560"></i>
                    <p class="small mb-0 fw-bold">Free Delivery</p>
                </div>
                <div class="col-4 text-center p-3" style="background:#f8f9fa;border-radius:12px">
                    <i class="fas fa-shield-alt mb-1" style="color:#e94560"></i>
                    <p class="small mb-0 fw-bold">Secure Payment</p>
                </div>
                <div class="col-4 text-center p-3" style="background:#f8f9fa;border-radius:12px">
                    <i class="fas fa-undo mb-1" style="color:#e94560"></i>
                    <p class="small mb-0 fw-bold">Easy Returns</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($related->count() > 0)
    <div class="mt-5">
        <h4 class="fw-bold mb-4">Related Products</h4>
        <div class="row g-4">
            @foreach($related as $item)
            <div class="col-md-3 col-sm-6">
                <div class="card h-100">
                    <img src="{{ $item->image ? asset('storage/'.$item->image) : 'https://via.placeholder.com/300x200?text='.urlencode($item->name) }}"
                         class="card-img-top" style="height:160px;object-fit:cover" alt="{{ $item->name }}">
                    <div class="card-body">
                        <h6 class="fw-bold">{{ $item->name }}</h6>
                        <strong style="color:#e94560">Rs. {{ number_format($item->price) }}</strong>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{{ route('products.show', $item) }}" class="btn btn-outline-secondary btn-sm w-100">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection