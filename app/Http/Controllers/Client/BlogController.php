<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(Request $request){
        $newProducts = Product::query()->limit(3)->get();
        $categories = Category::query()->get();
        return view('client.blog',compact('categories','newProducts'));
    }
}
