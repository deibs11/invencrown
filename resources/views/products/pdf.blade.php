{{-- filepath: c:\storage-invencrown\storage-sys\resources\views\products\pdf.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Productos Faltantes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Productos Faltantes</h1>
    <p>Generado el: {{ now()->format('Y-m-d H:i:s') }}</p>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de Caducidad</th>
                <th>Stock Mínimo</th>
                <th>Stock</th>
                <th>Marca</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->expire_date }}</td>
                    <td>{{ $product->min_stock }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->brand }}</td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
</body>
</html>