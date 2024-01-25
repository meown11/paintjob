<!-- resources/views/product/index.blade.php -->
@extends('layouts.app')
 
@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Main Product List -->
    <h2>Main Product List</h2>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Plate Number</th>
                <th>Current Color</th>
                <th>Target Color</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($product->count() > 0)
                @foreach($product as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->title }}</td>
                        <td class="align-middle">{{ $rs->price }}</td>
                        <td class="align-middle">{{ $rs->product_code }}</td>
                        <td class="align-middle">{{ $rs->description }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('product.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('product.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('product.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- Paint Queue List -->
    <h2>Paint Queue</h2>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Plate Number</th>
                <th>Current Color</th>
                <th>Target Color</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product->where('description', 'in queue') as $queuedProduct)
                <tr>
                    <td>{{ $queuedProduct->title }}</td>
                    <td>{{ $queuedProduct->price }}</td>
                    <td>{{ $queuedProduct->product_code }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
