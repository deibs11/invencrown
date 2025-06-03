@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Productos</h1>

        {{-- Notificaciones de productos bajos de stock y expirados --}}
        @if(($lowStockProducts->count() > 0) || ($expiredProducts->count() > 0))
            <div class="alert alert-danger">
                <strong>¡Atención!</strong>
                <ul class="mb-0">
                    @foreach($lowStockProducts as $product)
                        <li>
                            El producto <b>{{ $product->name }}</b> está por debajo del stock mínimo (Stock: {{ $product->stock }}, Mínimo: {{ $product->min_stock }}).
                        </li>
                    @endforeach
                    @foreach($expiredProducts as $product)
                        <li>
                            El producto <b>{{ $product->name }}</b> está caducado (Fecha de caducidad: {{ $product->expire_date }}).
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Añadir Producto</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('products.generatePdf') }}" target="_blank" class="btn btn-success mb-3">Generar PDF</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha Caducidad</th>
                    <th>Stock Mínimo</th>
                    <th>Stock</th>
                    <th>Marca</th>
                    <th>Acciones</th>
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
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                            <form action="{{ route('products.reduceStock', $product) }}" method="POST" style="display:inline; margin-left: 5px;">
                                @csrf
                                <input type="number" name="quantity" placeholder="Cant." style="width: 60px;" required>
                                <button type="submit" class="btn btn-secondary btn-sm">Reducir</button>
                            </form>
                            <form action="{{ route('products.plusStock', $product) }}" method="POST" style="display:inline; margin-left: 5px;">
                                @csrf
                                <input type="number" name="quantity" placeholder="Cant." style="width: 60px;" required>
                                <button type="submit" class="btn btn-secondary btn-sm">Agregar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection