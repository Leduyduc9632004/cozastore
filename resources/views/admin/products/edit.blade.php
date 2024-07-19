@extends('admin.main')
@section('title')
    Cập nhật sản phẩm
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

    <div class="container">
        <form method="POST" action="{{ route('products.update',$product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT');
            <div class="row">
                
                <div class="col-md-5 col-sm-12">
                    <div class="form-group">
                        <label for="my-select" >Category</label>
                        <select id="my-select" name="category_id" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="" class="form-label">name</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control" id="">
                    </div>
        
                    <div class="mb-3">
                        <label for="" class="form-label">image</label>
                        <input type="file" name="image" class="form-control" id="">
                        <img src="{{asset('storage/'.$product->image)}}" width="120px" alt="">

                        <input type="hidden" name="image_url" value="{{$product->image}}" class="form-control" id="">
                    </div>
                </div>
    
                <div class="col-md-7 col-sm-12">
                    <div class="mb-3">
                        <label for="" class="form-label">price</label>
                        <input type="text" name="price" value="{{$product->price}}" class="form-control" id="">
                    </div>
        
                    <div class="mb-3">
                        <label for="" class="form-label">description</label>
                        <textarea name="description" value="{{$product->description}}" id="" cols="71" rows="5"></textarea>
                    </div>
        
                    <div class="mb-3">
                        <label for="" class="form-label">quantity</label>
                        <input type="number" value="{{$product->quantity}}" name="quantity" class="form-control" id="">
                    </div>
                </div>
            </div>
            {{-- Variants --}}
                        <div class="" style="height: 500px; overflow: scroll;">
                            <table class="table border">
                                <thead>
                                    <tr>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sizes as $size)
                                        @foreach ($colors as $color)
                                        <?php
                                                $variant = $product->variants->first(function($variant) use ($size, $color) {
                                                    return $variant->size_id == $size->id && $variant->color_id == $color->id;
                                                });
                                            ?>
                                        <tr>
                                            <td style="font-size: larger">{{$size->name}}</td>
                                            <td>
                                                <div style="background-color: {{$color->name}}; width: 60px; height: 60px; border-radius: 50%;"></div>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="variants[{{$size->id . '-' . $color->id}}][quantity]" value="{{ $variant ? $variant->quantity : '' }}" id="">
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
