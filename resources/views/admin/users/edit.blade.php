@extends('admin.main')
@section('title')
    Cập nhật người dùng
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container" style="width: 60%">
        <form method="POST" action="{{ route('users.edit',$user) }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">address</label>
                <input type="text" name="address" value="{{$user->address}}" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">phone</label>
                <input type="tel" name="phone" value="{{$user->phone}}" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">username</label>
                <input type="text" name="username" value="{{$user->username}}" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">password</label>
                <input type="text" name="password" value="{{$user->password}}" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="my-select">role</label>
                <select id="my-select" class="form-control" name="role">
                    <option value="0">Member</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
