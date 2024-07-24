@extends('admin.main')
@section('title')
    Cập nhật color
@endsection

@section('content')
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif
<div class="mx-auto" style="width: 50%">
    <form method="POST" action="{{route('colors.update',$color)}}">
        @method('PUT')
      @csrf
        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input type="text" value="{{$color->name}}" name="name" class="form-control" id="" >
        </div>
    
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </form>
</div>
@endsection
