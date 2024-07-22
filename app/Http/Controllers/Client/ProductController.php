<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $categories = Category::query()->get();
        $listProducts = Product::query()->latest('id')->get();
        if (isset($request->sortby)) {
            $sortBy = $request->sortby;
            switch ($sortBy) {
                case 'default':
                    $listProducts = Product::query()->get();
                    break;

                case 'latest':
                    $listProducts = Product::query()->latest('id')->get();
                    break;

                case 'lowToHigh':
                    $listProducts = Product::query()->orderBy('price', 'asc')->get();
                    break;

                case 'highToLow':
                    $listProducts = Product::query()->orderBy('price', 'desc')->get();
                    break;

                case 'price1':
                    $listProducts = Product::whereBetween('price', [0, 100000])->orderBy('price', 'asc')->get();
                    break;

                case 'price2':
                    $listProducts = Product::whereBetween('price', [100000, 200000])->orderBy('price', 'asc')->get();
                    break;

                case 'price3':
                    $listProducts = Product::whereBetween('price', [200000, 300000])->orderBy('price', 'asc')->get();
                    break;

                case 'price4':
                    $listProducts = Product::whereBetween('price', [300000, 400000])->orderBy('price', 'asc')->get();
                    break;

                case 'price5':
                    $listProducts = Product::where('price', '>=', 400000)->orderBy('price', 'asc')->get();
                    break;

                default:
                    # code...
                    break;
            }
        }
        return view('client.product', compact('listProducts', 'categories'));
    }


    public function filterByCate(Request $request)
    {
        $productsByCate = Product::query()->where('category_id', $request->id)->get();
        return view('client.filterCate', compact('productsByCate', 'categories'));
    }

    public function detailProduct(Request $request){
        $product = Product::query()->with('variants')->where('id',$request->id)->first();
        $productRelate = Product::query()
        ->where('category_id',$product->category_id)
        ->where('id', '<>', $product->id)
        ->get();
        $sizes = Size::whereIn('id', $product->variants->pluck('size_id'))->get();
        $colors = Color::query()->whereIn('id',$product->variants->pluck('size_id'))->get();
        return view('client.detail-product',compact('product','categories','sizes','colors','productRelate'));
    }
}
