<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
     public function index() {
        return view('products.index', ['products' => Product::all()]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        Product::create($request->only('name', 'purchase_price', 'sell_price', 'stock'));
        return redirect()->route('products.index');
    }
}
