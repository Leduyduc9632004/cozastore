@extends('admin.main')

@section('title')
    Danh sách danh mục
@endsection

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
@endif
    <div class="container">
        <a class="btn btn-success my-3" href="{{route('categories.create')}}">Thêm mới danh mục</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
                <a href="{{route('categories.show',$category)}}" class="btn btn-primary">Detail</a>
                <a href="{{route('categories.edit',$category)}}" class="btn btn-warning">Edit</a>

                <form action="{{route('categories.destroy',$category)}}" method="post" class="d-inline">
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

