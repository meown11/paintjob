<!-- resources/views/product/edit.blade.php -->
@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <div class="mb-3">
        <label class="form-label">Current Status</label>
        <div class="badge {{ $product->status === 'in the process' ? 'badge-warning' : ($product->status === 'done' ? 'badge-success' : 'badge-secondary') }}">
            {{ $product->status }}
        </div>
    </div>
    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Plate Number</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Current Color</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Target Color</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $product->product_code }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Status</label>
                <textarea class="form-control" name="description" placeholder="Description">{{ $product->description }}</textarea>
            </div>
        </div>
        @if ($product->status !== 'done')
            <div class="row">
                <div class="d-grid">
                    <button class="btn btn-warning">Update</button>
                </div>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                This product has already been completed. You cannot update it further.
            </div>
        @endif
    </form>
@endsection
