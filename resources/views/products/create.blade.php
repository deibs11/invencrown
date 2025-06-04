@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add Product</h4>
                </div>
                <div class="card-body">
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
                        <button type="submit" class="btn btn-success w-100">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection