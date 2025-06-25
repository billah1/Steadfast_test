<x-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">📦 Product List</h1>
        <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Add Product</a>
    </div>

    <table class="w-full table-auto border border-gray-200 rounded overflow-hidden shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-right">Buy Price</th>
                <th class="px-4 py-2 text-right">Sell Price</th>
                <th class="px-4 py-2 text-right">Stock</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2 text-right">{{ number_format($product->purchase_price, 2) }} TK</td>
                    <td class="px-4 py-2 text-right">{{ number_format($product->sell_price, 2) }} TK</td>
                    <td class="px-4 py-2 text-right">{{ $product->stock }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">No products available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layout>
