@extends('admin.main')
@section('title')
    Thêm mới người dùng
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
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" name="name" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">email</label>
                <input type="email" name="email" class="form-control" id="">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">address</label>
                <input type="text" name="address" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">phone</label>
                <input type="tel" name="phone" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">username</label>
                <input type="text" name="username" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">password</label>
                <input type="text" name="password" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="my-select">role</label>
                <select id="my-select" class="form-control" name="role">
                    <option value="member">Member</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
@endsection
