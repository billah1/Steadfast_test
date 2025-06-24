<x-app-layout>
    <div class="max-w-xl mx-auto mt-8">
        <form method="POST" action="{{ route('sales.store') }}">
            @csrf
            <select name="product_id" class="w-full p-2 border">
                @foreach($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }} - Stock: {{ $p->stock }}</option>
                @endforeach
            </select>
            <input name="quantity" type="number" class="w-full mt-2 p-2 border" placeholder="Quantity" required />
            <input name="discount" type="number" class="w-full mt-2 p-2 border" placeholder="Discount" value="0" />
            <input name="paid" type="number" class="w-full mt-2 p-2 border" placeholder="Customer Paid" />
            <button class="bg-blue-600 text-white mt-4 px-4 py-2 rounded">Complete Sale</button>
        </form>
    </div>
</x-app-layout>
