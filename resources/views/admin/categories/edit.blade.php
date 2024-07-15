@extends('admin.main')
@section('title')
    Cập nhật danh mục
@endsection

@section('content')
<div class="mx-auto" style="width: 50%">
    <form method="POST" action="{{route('categories.update',$category)}}">
        @method('PUT')
      @csrf
        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input type="text" value="{{$category->name}}" name="name" class="form-control" id="" >
        </div>
    
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </form>
</div>
@endsection
