@extends('admin.main')
@section('title')
    Cập nhật size
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
    <form method="POST" action="{{route('sizes.update',$size)}}">
        @method('PUT')
      @csrf
        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input type="text" value="{{$size->name}}" name="name" class="form-control" id="" >
        </div>
    
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </form>
</div>
@endsection
