@extends('backend.layout.master')

@section('title', 'Product List')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Product Table Card -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Products Management</h6>
                    <a href="{{ route('backend.dashboard.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add New Product
                    </a>
                </div>

                <div class="card-body">

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td><a href="{{ route('backend.dashboard.edit', $product->product_id) }}">{{ $product->product_id }}</a></td>
                                        <td>{{ $product->name }}</td>
                                        <td>${{ number_format($product->price, 2) }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            <span class="badge badge-{{ $product->status === 'ACTIVE' ? 'success' : 'danger' }}">
                                                {{ ucfirst(strtolower($product->status)) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('backend.dashboard.edit', $product->product_id) }}"
                                               class="btn btn-sm btn-info"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('backend.dashboard.destroy', $product->product_id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">
                                            No products found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer text-center text-muted">
                    <!-- You can add pagination here if needed -->
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
