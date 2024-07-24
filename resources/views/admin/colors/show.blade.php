@extends('admin.main')
@section('title')
    Chi tiết: {{$color->name}}
@endsection

@section('content')
<div class="mx-auto" style="width: 50%">
    <table class="table border">
        <tr>
            <th>FieldName</th>
            <th>Value</th>
        </tr>
        
        @foreach ($color->toArray() as $fieldname => $value)
        <tr>
            <th>{{$fieldname}}</th>
            <th>{{$value}}</th>
        </tr>
        @endforeach
    </table>
    
    <a href="{{route('colors.index')}}" class="btn btn-success">Back to list</a>
    
</div>
@endsection
