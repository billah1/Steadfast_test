<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <nav class="mb-6 border-b pb-2 flex gap-4">
            <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">Products</a>
            <a href="{{ route('sales.create') }}" class="text-blue-500 hover:underline">Sales</a>
            <a href="{{ route('reports.index') }}" class="text-blue-500 hover:underline">Reports</a>
        </nav>

        {{ $slot }}
    </div>
</body>
</html>
