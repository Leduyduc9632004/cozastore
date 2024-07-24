<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::query()->get();
        return view('admin.sizes.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSizeRequest $request)
    {
        $size = $request->all();
        Size::query()->create($size);
        return redirect()->route('sizes.index')->with('message','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        return view('admin.sizes.show',compact('size'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.sizes.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        $data = $request->all();
        $size->update($data);
        return redirect()->route('sizes.index')->with('message','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('sizes.index')->with('message','Xóa thành công');
    }
}
