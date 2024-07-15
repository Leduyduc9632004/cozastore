@extends('admin.main')
@section('title')
    Thêm mới danh mục
@endsection

@section('content')
<div class="mx-auto" style="width: 50%">
    <form method="POST" action="{{route('categories.store')}}">
      @csrf
        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="" >
        </div>
    
        <button type="submit" onclick="return confirm('Thêm thành công')" class="btn btn-primary">Thêm</button>
      </form>
</div>
@endsection
