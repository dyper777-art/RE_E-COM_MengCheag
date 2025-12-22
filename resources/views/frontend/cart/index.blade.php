@extends('frontend.layout.master')

@section('title', 'shopping cart')

@section('content')

<section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $id => $item)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="img/cart/cart-1.jpg" alt="">
                                            <h5>{{ $item['name'] }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            ${{ $item['price'] }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div>
                                                    <span class="dec qtybtn">
                                                        <a href="{{ route('cart.decrease', $id) }}">➖</a>
                                                    </span>
                                                    <span class="dec qtybtn m-2">{{ $item['quantity'] }}</span>
                                                    <span class="inc qtybtn">
                                                        <a href="{{ route('cart.increase', $id) }}">➕</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            ${{ $item['price'] * $item['quantity'] }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="{{ route('cart.remove', $id) }}">
                                                <span class="icon_close"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$ {{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) }}</span></li>
                            <li>VAT (10%) <span>$ {{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) * 0.1 }}</span></li>
                            <li>Total <span>$ {{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) + (array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) * 0.1) }}</span></li>
                        </ul>
                        <a href="{{ route('checkout.index') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
