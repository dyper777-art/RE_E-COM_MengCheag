<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')
                ->with('cart_empty', 'Your cart is empty');
        }

        return view('frontend.checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        // Validate billing details
        $request->validate([
            'customer_name'    => 'required|string|max:255',
            'customer_email'   => 'required|email|max:255',
            'customer_phone'   => 'required|string|max:20',
            'shipping_address' => 'required|string|max:500',
        ]);

        // Get cart from session
        $cart = session()->get('cart', []);

        if (!$cart) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate subtotal, VAT, and total
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $vat = $subtotal * 0.1; // 10% VAT
        $total = $subtotal + $vat;

        // Create order
        $order = Order::create([
            'customer_name'    => $request->customer_name,
            'customer_email'   => $request->customer_email,
            'customer_phone'   => $request->customer_phone,
            'shipping_address' => $request->shipping_address,
            'total_amount'     => $total,
        ]);

        // Create order items
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id'   => $order->order_id,
                'product_id' => $productId,
                'quantity'   => $item['quantity'],
                'unit_price' => $item['price'],
                'subtotal'   => $item['price'] * $item['quantity'],
            ]);
        }

        // Clear cart
        session()->forget('cart');

        // Redirect with success
        return redirect('/checkout/confirm/' . $order->order_id);
    }

    public function confirm($orderId)
    {
        $order = Order::with('items.product')->findOrFail($orderId);
        return view('frontend.checkout.order-confirm', compact('order'));
    }
}
