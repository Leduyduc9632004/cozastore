@extends('client.main')
@section('title')
    Product
@endsection
@section('content')
{{-- product --}}
<section class="bg0 p-t-23 p-b-140">
    <div class="container">

        <div class="flex-w flex-sb-m p-b-52 mt-5">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>

                @foreach ($categories as $category )
                <a href="{{route('client.filterByCate',$category->id)}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" >
                    {{$category->name}}
                </a>
                @endforeach


                
            </div>
            
            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <form action="{{route('client.search')}}">
                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="keyword" placeholder="Search">
                    </form>
                </div>	
            </div>

        </div>

        <div class="row isotope-grid">
            @foreach ($productsByCate as $product )
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('storage/'.$product->image)}}" alt="IMG-PRODUCT">

                        <a href="{{route('client.detail-product',$product->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="{{route('client.detail-product',$product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{$product->name}}
                            </a>

                            <span class="stext-105 cl3">
                                {{$product->price}}<sup>đ</sup>
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="{{asset('theme/cozastore/images/icons/icon-heart-01.png')}}" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('theme/cozastore/images/icons/icon-heart-02.png')}}" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>
    </div>
</section>
@endsection