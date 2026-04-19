@extends('layouts.admin')
@section('title', 'Edit Product')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-edit me-2" style="color:#e94560"></i>Edit Product</h5>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back
    </a>
</div>
<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Product Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Category *</label>
                    <input type="text" name="category" class="form-control" value="{{ $product->category }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Price (Rs.) *</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Stock Quantity *</label>
                    <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Description *</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ $product->description }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Product Image</label>
                    @if($product->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$product->image) }}" width="100" height="100"
                             style="object-fit:cover;border-radius:8px">
                        <small class="text-muted ms-2">Current image</small>
                    </div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small class="text-muted">Leave empty to keep current image</small>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-save me-2"></i>Update Product
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection