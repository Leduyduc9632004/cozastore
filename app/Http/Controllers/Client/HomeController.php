<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
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
                    $listProducts = Product::whereBetween('price','=>',400000)->orderBy('price', 'asc')->get();
                    break;

                default:
                    # code...
                    break;
            }
        }
        return view('client.index', compact('listProducts', 'categories'));
    }
}
