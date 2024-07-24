@extends('admin.main')

@section('title')
    Danh sách color
@endsection

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
@endif
    <div class="container">
        <a class="btn btn-success my-3" href="{{route('colors.create')}}">Thêm mới danh mục</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($colors as $color)
        <tr>
            <td>{{$color->id}}</td>
            <td>{{$color->name}}</td>
            <td>
                <a href="{{route('colors.show',$color)}}" class="btn btn-primary">Detail</a>
                <a href="{{route('colors.edit',$color)}}" class="btn btn-warning">Edit</a>

                <form action="{{route('colors.destroy',$color)}}" method="post" class="d-inline">
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

