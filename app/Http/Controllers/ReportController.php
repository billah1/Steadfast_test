<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
       
        $from = $request->from ? Carbon::parse($request->from)->startOfDay() : now()->subMonth()->startOfDay();
        $to = $request->to ? Carbon::parse($request->to)->endOfDay() : now()->endOfDay();

        
        $sales = Sale::whereDate('created_at', '>=', $from)
             ->whereDate('created_at', '<=', $to)
             ->get();
    

      
        $totalSales = $sales->sum('total');
        $totalExpenses = $sales->sum(function ($sale) {
            return $sale->product->purchase_price * $sale->quantity;
        });
        $profit = $totalSales - $totalExpenses;

        return view('reports.index', compact('sales', 'totalSales', 'totalExpenses', 'profit', 'from', 'to'));
    }
}
