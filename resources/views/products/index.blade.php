<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8">
        <a href="{{ route('products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Product</a>
        <table class="w-full table-auto border">
            <thead>
                <tr>
                    <th>Name</th><th>Purchase</th><th>Sell</th><th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $p)
                    <tr class="border-t">
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->purchase_price }}</td>
                        <td>{{ $p->sell_price }}</td>
                        <td>{{ $p->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
