<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        thead {
            background-color: #667eea;
            color: white;
        }
        th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        tbody tr:hover {
            background-color: #f9f9f9;
        }
        .no-products {
            text-align: center;
            color: #999;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Products</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                {{-- Check kung meron multiple products --}}
                @if(isset($products) && count($products))
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id ?? $product['id'] }}</td>
                            <td>{{ $product->name ?? $product['name'] }}</td>
                            <td>{{ $product->category ?? $product['category'] }}</td>
                        </tr>
                    @endforeach

                {{-- Kung single product (from show()) --}}
                @elseif(isset($product))
                    <tr>
                        <td>{{ $product->id ?? $product['id'] }}</td>
                        <td>{{ $product->name ?? $product['name'] }}</td>
                        <td>{{ $product->category ?? $product['category'] }}</td>
                    </tr>

                {{-- Walang product --}}
                @else
                    <tr>
                        <td colspan="3" class="no-products">
                            No products found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

    </div>
</body>
</html>