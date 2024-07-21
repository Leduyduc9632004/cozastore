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
                    $listProducts = $this->filterPrice(0,100000);
                    break;

                case 'price2':
                    $listProducts = $this->filterPrice(100000,200000);
                    break;

                case 'price3':
                    $listProducts = $this->filterPrice(200000,300000);
                    break;

                case 'price4':
                    $listProducts = $this->filterPrice(300000,400000);
                    break;

                case 'price5':
                    $listProducts = Product::where('price','>=',400000)->orderBy('price', 'asc')->get();
                    break;

                default:
                    # code...
                    break;
            }
        }
        return view('client.index', compact('listProducts', 'categories'));
    }

    private function filterPrice($min, $max) {
        return Product::whereBetween('price', [$min, $max])->orderBy('price', 'asc')->get();
    }
}
