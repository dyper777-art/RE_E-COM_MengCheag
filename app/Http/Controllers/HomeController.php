<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('frontend.home.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product.show', compact('product'));
    }

}
