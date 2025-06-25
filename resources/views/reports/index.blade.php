<x-layout>
    <h1 class="text-2xl font-bold mb-4">📊 Financial Report</h1>

    <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
        <div>
            <label for="from">From:</label>
            <input type="date" name="from" value="{{ $from->format('Y-m-d') }}" class="border px-2 py-1 rounded" required>
        </div>
        <div>
            <label for="to">To:</label>
            <input type="date" name="to" value="{{ $to->format('Y-m-d') }}" class="border px-2 py-1 rounded" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
    </form>

    <div class="mb-6 p-4 bg-gray-100 border rounded">
        <p><strong>Total Sales:</strong> {{ number_format($totalSales, 2) }} TK</p>
        <p><strong>Total Expenses:</strong> {{ number_format($totalExpenses, 2) }} TK</p>
        <p><strong>Profit:</strong> {{ number_format($profit, 2) }} TK</p>
    </div>

    <h2 class="text-xl font-semibold mb-2">Sales Details</h2>
    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-2 py-1">Date</th>
                <th class="border px-2 py-1">Product</th>
                <th class="border px-2 py-1">Quantity</th>
                <th class="border px-2 py-1">Discount</th>
                <th class="border px-2 py-1">VAT</th>
                <th class="border px-2 py-1">Total</th>
                <th class="border px-2 py-1">Paid</th>
                <th class="border px-2 py-1">Due</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sales as $sale)
                <tr>
                    <td class="border px-2 py-1">{{ $sale->created_at->format('Y-m-d H:i') }}</td>
                    <td class="border px-2 py-1">{{ $sale->product->name }}</td>
                    <td class="border px-2 py-1">{{ $sale->quantity }}</td>
                    <td class="border px-2 py-1">{{ number_format($sale->discount, 2) }}</td>
                    <td class="border px-2 py-1">{{ number_format($sale->vat, 2) }}</td>
                    <td class="border px-2 py-1">{{ number_format($sale->total, 2) }}</td>
                    <td class="border px-2 py-1">{{ number_format($sale->paid, 2) }}</td>
                    <td class="border px-2 py-1">{{ number_format($sale->due, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center border py-4">No sales found in this date range.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layout>
