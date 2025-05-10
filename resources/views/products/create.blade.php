{{-- filepath: c:\storage-invencrown\storage-sys\resources\views\products\create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="expire_date" class="form-label">Expire Date</label>
            <input type="date" class="form-control" id="expire_date" name="expire_date" required>
        </div>
        <div class="mb-3">
            <label for="min_stock" class="form-label">Min Stock</label>
            <input type="number" class="form-control" id="min_stock" name="min_stock" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection