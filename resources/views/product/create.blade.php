//resources/views/product/create.blade.php
@extends('layouts.app')
 
@section('body')
    <h1 class="mb-0">Add Book</h1>
    <hr />
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Plate Number">
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Current Color">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="product_code" class="form-control" placeholder="Target Color">
            </div>
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Status"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection