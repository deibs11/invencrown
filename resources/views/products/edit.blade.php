@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow rounded">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Producto</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="expire_date" class="form-label">Fecha de Caducidad</label>
                            <input type="date" class="form-control" id="expire_date" name="expire_date" value="{{ $product->expire_date }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="min_stock" class="form-label">Min Stock</label>
                            <input type="number" class="form-control" id="min_stock" name="min_stock" value="{{ $product->min_stock }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="brand" name="brand" value="{{ $product->brand }}" required>
                        </div>
                        <button type="submit" class="btn btn-update w-100">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
