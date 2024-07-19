@extends('admin.main')

@section('title')
    List Products
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách sản phẩm
            </h6>
            <a href="{{ route('products.create') }}" class="btn btn-success">Add products</a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>category_id</th>
                            <th>name</th>
                            <th>image</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset('storage/'.$product->image) }}" width="120px" alt=""></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-success">Detail</a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" class="d-inline"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $products->links() }}
@endsection
