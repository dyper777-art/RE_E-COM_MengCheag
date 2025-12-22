@extends('frontend.layout.master')

@section('title', 'Order Confirmation')

@section('content')
<section class="order-confirm spad">
    <div class="container text-center">
        <h2>Thank you for your order!</h2>
        <p>Your order has been successfully placed.</p>

        <div class="order-details mt-4">
            <h4>Order ID: <span class="text-primary">{{ $order->order_id }}</span></h4>
            <h4>Total: <span class="text-primary">${{ number_format($order->total_amount, 2) }}</span></h4>
        </div>

        <a href="{{ url('/') }}" class="site-btn mt-4">Back to Home</a>
    </div>
</section>
@endsection
