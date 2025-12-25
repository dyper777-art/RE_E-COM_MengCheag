@extends('backend.layout.master')

@section('title', isset($product) ? 'Edit Product' : 'Create Product')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto mb-5">
            <!-- Product Form Card -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ isset($product) ? 'Edit Product' : 'Create New Product' }}
                    </h6>
                    <a href="{{ route('backend.dashboard.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ isset($product) ? route('backend.dashboard.update', $product->product_id) : route('backend.dashboard.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif

                        <!-- Product Name -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">
                                <i class="fas fa-tag mr-2"></i> Product Name <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg"
                                   value="{{ old('name', $product->name ?? '') }}"
                                   placeholder="Enter product name"
                                   required>
                        </div>

                        <!-- Description -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">
                                <i class="fas fa-align-left mr-2"></i> Description
                            </label>
                            <textarea name="description"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Enter product description">{{ old('description', $product->description ?? '') }}</textarea>
                        </div>

                        <!-- Price & Stock -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-dollar-sign mr-2"></i> Price <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                           step="0.01"
                                           name="price"
                                           class="form-control form-control-lg"
                                           value="{{ old('price', $product->price ?? '') }}"
                                           placeholder="0.00"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-box mr-2"></i> Stock Quantity <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                           name="stock"
                                           class="form-control form-control-lg"
                                           value="{{ old('stock', $product->stock ?? '') }}"
                                           placeholder="0"
                                           required>
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">
                                <i class="fas fa-image mr-2"></i> Product Image
                            </label>

                            @if(isset($product) && $product->image_url)
                                <div class="mb-3">
                                    <p class="text-muted mb-2">Current Image:</p>
                                    <img src="{{ asset($product->image_url) }}"
                                         alt="Current Product Image"
                                         class="img-thumbnail"
                                         style="max-height: 200px;">
                                </div>
                            @endif

                            <input type="file"
                                   name="image"
                                   class="form-control-file"
                                   accept="image/*">
                            <small class="form-text text-muted">Leave blank to keep current image.</small>
                        </div>

                        <!-- Status -->
                        <div class="form-group mb-5">
                            <label class="font-weight-bold">
                                <i class="fas fa-check-circle mr-2"></i> Status <span class="text-danger">*</span>
                            </label>
                            <select name="status" class="form-control form-control-lg" required>
                                <option value="ACTIVE" {{ old('status', $product->status ?? 'ACTIVE') === 'ACTIVE' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="INACTIVE" {{ old('status', $product->status ?? '') === 'INACTIVE' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-lg px-5">
                                <i class="fas {{ isset($product) ? 'fa-save' : 'fa-plus' }} mr-2"></i>
                                {{ isset($product) ? 'Update Product' : 'Create Product' }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-muted text-center">
                    <small>* Required fields</small>
                </div>
            </div>
        </div>
    </div>
@endsection
