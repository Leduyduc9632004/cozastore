@extends('admin.main')

@section('title')
    Danh sách size
@endsection

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
@endif
    <div class="container">
        <a class="btn btn-success my-3" href="{{route('sizes.create')}}">Thêm mới danh mục</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($sizes as $size)
        <tr>
            <td>{{$size->id}}</td>
            <td>{{$size->name}}</td>
            <td>
                <a href="{{route('sizes.show',$size)}}" class="btn btn-primary">Detail</a>
                <a href="{{route('sizes.edit',$size)}}" class="btn btn-warning">Edit</a>

                <form action="{{route('sizes.destroy',$size)}}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('bạn có muốn xóa không?')" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
@endsection

