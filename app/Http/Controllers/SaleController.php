<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;

class SaleController extends Controller
{
     public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $quantity = $request->quantity;
        $discount = $request->discount;

        $subtotal = $product->sell_price * $quantity;
        $vat = ($subtotal - $discount) * 0.05;
        $total = ($subtotal - $discount) + $vat;
        $paid = $request->paid;
        $due = $total - $paid;

        // Create sale
        $sale = Sale::create([
            'subtotal' => $subtotal,
            'discount' => $discount,
            'vat' => $vat,
            'total' => $total,
            'paid' => $paid,
            'due' => $due,
        ]);

        // Create sale item
        SaleItem::create([
            'sale_id' => $sale->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->sell_price,
        ]);

        // Update stock
        $product->stock -= $quantity;
        $product->save();

        return redirect()->back()->with('success', 'Sale completed.');
    }

    public function report(Request $request) {
        $from = $request->from ?? '2000-01-01';
        $to = $request->to ?? now()->format('Y-m-d');

        $sales = Sale::whereBetween('created_at', [$from, $to])->get();

        return view('reports.index', [
            'sales' => $sales,
            'total_sales' => $sales->sum('total'),
            'total_vat' => $sales->sum('vat'),
            'total_discount' => $sales->sum('discount'),
            'total_paid' => $sales->sum('paid'),
            'total_due' => $sales->sum('due'),
        ]);
    }

}
