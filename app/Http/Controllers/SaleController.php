<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Journal;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create() {
        return view('sales.create', ['products' => Product::all()]);
    }

    public function store(Request $request) {
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity;
        $discount = $request->discount;
        $subtotal = $product->sell_price * $quantity - $discount;
        $vat = $subtotal * 0.05;
        $total = $subtotal + $vat;
        $paid = $request->paid;
        $due = $total - $paid;

        $sale = Sale::create([
            'product_id' => $product->id,
            'quantity' => $quantity,
            'discount' => $discount,
            'vat' => $vat,
            'total' => $total,
            'paid' => $paid,
            'due' => $due
        ]);

        $product->stock -= $quantity;
        $product->save();

        Journal::insert([
            ['type' => 'Sales', 'amount' => $product->sell_price * $quantity],
            ['type' => 'Discount', 'amount' => $discount],
            ['type' => 'VAT', 'amount' => $vat],
            ['type' => 'Payment', 'amount' => $paid],
        ]);

        return redirect()->route('sales.create')->with('success', 'Sale completed!');
    }
}
