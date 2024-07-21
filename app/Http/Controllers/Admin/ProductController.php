<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Variant;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->with('category')->orderBy('id', 'desc')->paginate(8);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->get();
        $sizes = Size::query()->get();
        $colors = Color::query()->get();
        return view('admin.products.create', compact('categories', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $dataProduct = $request->except('image', 'variants');
        if ($request->hasFile('image')) {
            $dataProduct['image'] = Storage::put('uploads', $request->file('image'));
        }
        $dataVariantTmp = $request->variants;
        $dataVariant = [];
        foreach ($dataVariantTmp as $key => $value) {
            if (isset($value['quantity'])&&$value['quantity']>0) {
                $dataVariant[$key] = $value;
            }
        }
        try {
            DB::beginTransaction();
            $product = Product::query()->create($dataProduct);
            foreach ($dataVariant as $key => $value) {
                $tmp = explode('-', $key);
                Variant::query()->create([
                    'product_id' => $product->id,
                    'size_id' => $tmp[0],
                    'color_id' => $tmp[1],
                    'quantity' => $value['quantity'],
                ]);
            }
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Thao tác thành công');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::query()->get();
        $sizes = Size::query()->get();
        $colors = Color::query()->get();
        return view('admin.products.edit', compact('product','categories', 'sizes', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        dd($product);
        $dataProduct = $request->except('image', 'variants');
        if ($request->hasFile('image')) {
            $dataProduct['image'] = Storage::put('uploads', $request->file('image'));
        }
        $dataVariantTmp = $request->variants;
        $dataVariant = [];
        foreach ($dataVariantTmp as $key => $value) {
            if (isset($value['quantity'])&&$value['quantity']>0) {
                $dataVariant[$key] = $value;
            }
        }
        try {
            DB::beginTransaction();
            $product->update($dataProduct);
            $oldImage = $request->has('image');
            if ($request->hasFile('image')&&Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }

            $existingVariants = $product->variants->keyBy(function ($item) {
                return $item->size_id . '-' . $item->color_id;
            });
            foreach ($dataVariant as $key => $value) {
                $tmp = explode('-', $key);
                if (isset($existingVariants[$key])) {
                    $existingVariant = $existingVariants[$key];
                    $existingVariant->update([
                        'quantity' => $value['quantity'],
                    ]);
                }else{
                    Variant::query()->create([
                        'product_id' => $product->id,
                        'size_id' => $tmp[0],
                        'color_id' => $tmp[1],
                        'quantity' => $value['quantity'],
                    ]);
                }
                
            }
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Thao tác thành công');
        } catch (Exception $e) {
            DB::rollBack();
            dd( $e->getMessage());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Thao tác thành công');
    }
}
