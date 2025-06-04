@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center text-md-start">Productos</h1>

        {{-- Notificaciones de productos bajos de stock y expirados --}}
        @if ($lowStockProducts->count() > 0 || $expiredProducts->count() > 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="mb-2"><strong>¡Atención!</strong> <i class="bi bi-exclamation-triangle"></i></h5>
                <ul class="mb-0 ps-3">
                    @foreach ($lowStockProducts as $product)
                        <li>
                            El producto <b>{{ $product->name }}</b> está por debajo del stock mínimo (Stock:
                            {{ $product->stock }}, Mínimo: {{ $product->min_stock }}).
                        </li>
                    @endforeach
                    @foreach ($expiredProducts as $product)
                        <li>
                            El producto <b>{{ $product->name }}</b> está caducado (Fecha de caducidad:
                            {{ $product->expire_date }}).
                        </li>
                    @endforeach
                </ul>
                <strong>Por favor, revisa los productos mencionados.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex flex-column flex-md-row flex-wrap gap-2 mb-3 justify-content-center justify-content-md-start">
            <a href="{{ route('products.create') }}"
                class="btn btn-primary btn-lift d-flex align-items-center justify-content-center">
                <span class="me-2">Añadir Producto</span> <i class="bi bi-plus-circle"></i>
            </a>
            <a href="{{ route('products.generatePdf') }}" target="_blank"
                class="btn btn-success btn-lift d-flex align-items-center justify-content-center">
                <span class="me-2">Generar PDF</span> <i class="bi bi-filetype-pdf"></i>
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th class="d-none d-sm-table-cell">Fecha Caducidad</th>
                        <th class="d-none d-md-table-cell">Stock Mínimo</th>
                        <th>Stock</th>
                        <th class="d-none d-lg-table-cell">Marca</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td style="min-width:120px">{{ $product->name }}</td>
                            <td class="d-none d-sm-table-cell" style="min-width:110px">{{ $product->expire_date }}</td>
                            <td class="d-none d-md-table-cell" style="min-width:90px">{{ $product->min_stock }}</td>
                            <td style="min-width:70px">{{ $product->stock }}</td>
                            <td class="d-none d-lg-table-cell" style="min-width:90px">{{ $product->brand }}</td>
                            <td style="min-width:120px">
                                <div class="d-flex flex-wrap gap-1">
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="btn btn-warning btn-sm icon-btn" title="Editar"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm icon-btn" title="Eliminar"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                    <form action="{{ route('products.reduceStock', $product) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <input type="number" name="quantity" placeholder="Cant." style="width: 60px;"
                                            required class="form-control d-inline-block me-1 mb-1" min="1">
                                        <button type="submit" class="btn btn-secondary btn-sm mb-1">Reducir</button>
                                    </form>
                                    <form action="{{ route('products.plusStock', $product) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <input type="number" name="quantity" placeholder="Cant." style="width: 60px;"
                                            required class="form-control d-inline-block me-1 mb-1" min="1">
                                        <button type="submit" class="btn btn-secondary btn-sm mb-1">Agregar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection
