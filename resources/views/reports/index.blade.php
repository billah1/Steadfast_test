<x-app-layout>
    <form method="GET" class="flex gap-2 p-4">
        <input type="date" name="from" value="{{ request('from') }}">
        <input type="date" name="to" value="{{ request('to') }}">
        <button class="bg-green-600 text-white px-3 py-1 rounded">Filter</button>
    </form>
    <div class="p-4">
        <p>Total Sales: {{ number_format($total_sales, 2) }}</p>
        <p>Total VAT: {{ number_format($total_vat, 2) }}</p>
        <p>Total Discount: {{ number_format($total_discount, 2) }}</p>
        <p>Total Paid: {{ number_format($total_paid, 2) }}</p>
        <p>Total Due: {{ number_format($total_due, 2) }}</p>

        <ul>
            @foreach($sales as $sale)
                <li>{{ $sale->created_at }} - Total: {{ $sale->total }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>