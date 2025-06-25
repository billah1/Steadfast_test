<x-layout>
    <h1 class="text-2xl font-bold mb-6">🛒 New Sale</h1>

    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('sales.store') }}" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block font-semibold">Select Product</label>
            <select name="product_id" class="w-full border px-4 py-2 rounded" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->stock }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Quantity</label>
            <input name="quantity" type="number" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Discount (TK)</label>
            <input name="discount" type="number" step="0.01" class="w-full border px-4 py-2 rounded" value="0">
        </div>

        <div>
            <label class="block font-semibold">Paid Amount (TK)</label>
            <input name="paid" type="number" step="0.01" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Complete Sale</button>
        </div>
    </form>
</x-layout>
