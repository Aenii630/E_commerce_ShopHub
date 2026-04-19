@extends('layouts.admin')
@section('title', 'Add Product')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-plus me-2" style="color:#e94560"></i>Add New Product</h5>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back
    </a>
</div>
<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Product Name *</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Enter product name" value="{{ old('name') }}" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Category *</label>
                    <input type="text" name="category" class="form-control @error('category') is-invalid @enderror"
                           placeholder="e.g. Clothing, Electronics" value="{{ old('category') }}" required>
                    @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Price (Rs.) *</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                           placeholder="0.00" value="{{ old('price') }}" required>
                    @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Stock Quantity *</label>
                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                           placeholder="0" value="{{ old('stock') }}" required>
                    @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Description *</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                              rows="4" placeholder="Enter product description..." required>{{ old('description') }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Product Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-save me-2"></i>Save Product
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection