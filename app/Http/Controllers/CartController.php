<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display cart items
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
        return redirect()->route('home')
            ->with('cart_empty', 'Your cart is empty');
        }

        return view('frontend.cart.index', compact('cart'));
    }

    /**
     * Add product to cart
     */
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name'     => $product->name,
                'price'    => $product->price,
                'description' => $product->description,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart');
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $request->quantity;
        } else {
            $product = Product::findOrFail($request->id);
            $cart[$request->id] = [
                'name'        => $product->name,
                'price'       => $product->price,
                'description' => $product->description,
                'quantity'    => $request->quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cart updated');
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                unset($cart[$id]); // remove item if qty = 1
            }
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }


    /**
     * Remove item from cart
     */
    public function remove(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed');
    }

    /**
     * Clear cart
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared');
    }
}
