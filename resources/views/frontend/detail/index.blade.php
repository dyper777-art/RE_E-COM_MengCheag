@extends('frontend.layout.master')

@section('title', 'Product Detail')

@section('content')
    <section class="product-details spad">
        <div class="container">
            <div class="row">

                <!-- Product Image -->
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ asset($product->image_url) }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>


                <!-- Product Info -->
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf

                    <!-- Hidden Product ID -->
                    <input type="text" name="id" value="{{ $product->product_id }}" hidden>

                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">

                            <h3 class="text-uppercase text-nowrap">{{ $product->name }}</h3>


                            <div class="product__details__price">
                                ${{ number_format($product->price, 2) }}
                            </div>

                            <h4>Description</h4>

                            <p>
                                {{ $product->description ?? 'No description available.' }}
                            </p>

                            <div class="d-flex align-items-stretch gap-3">

                                <!-- Quantity -->
                                <div class="product__details__quantity d-flex">
                                    <div class="quantity d-flex">
                                        <div class="pro-qty d-flex align-items-center" style="height: 50px;">
                                            <input name="quantity" type="text" value="1"
                                                class="form-control text-center" style="height: 100%;">
                                        </div>
                                    </div>
                                </div>

                                <!-- Add to Cart -->
                                <button type="submit"
                                    class="primary-btn d-inline-flex align-items-center justify-content-center"
                                    style="padding: 12px 30px; white-space: nowrap; border: none; cursor: pointer;">
                                    Add to Cart
                                </button>

                            </div>


                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection
