@extends('frontend.layout.master')

@section('title', 'home')

@section('content')
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">

                @for ($i = 0; $i < count($products); $i++)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{ asset($products[$i]->image_url) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ route('product.detail', $products[$i]->product_id) }}"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="{{ route('cart.add', $products[$i]->product_id) }}"><i
                                                class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6>{{ $products[$i]->name }}</h6>
                                <h5>${{ $products[$i]->price }}</h5>
                            </div>
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </section>
@endsection
