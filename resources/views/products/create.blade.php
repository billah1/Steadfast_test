<x-layout>
    <h1 class="text-2xl font-bold mb-6">➕ Add New Product</h1>

    <form method="POST" action="{{ route('products.store') }}" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block font-semibold">Product Name</label>
            <input name="name" type="text" class="w-full border px-4 py-2 rounded" placeholder="e.g., Mobile" required>
        </div>

        <div>
            <label class="block font-semibold">Purchase Price (TK)</label>
            <input name="purchase_price" type="number" step="0.01" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Sell Price (TK)</label>
            <input name="sell_price" type="number" step="0.01" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Opening Stock</label>
            <input name="stock" type="number" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save Product</button>
        </div>
    </form>
</x-layout>
