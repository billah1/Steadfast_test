<x-app-layout>
    <div class="max-w-xl mx-auto mt-8">
        <form method="POST" action="{{ route('products.store') }}" class="space-y-4">
            @csrf
            <input name="name" class="w-full border rounded p-2" placeholder="Product Name" />
            <input name="purchase_price" type="number" step="0.01" class="w-full border rounded p-2" placeholder="Purchase Price" />
            <input name="sell_price" type="number" step="0.01" class="w-full border rounded p-2" placeholder="Sell Price" />
            <input name="stock" type="number" class="w-full border rounded p-2" placeholder="Opening Stock" />
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>
