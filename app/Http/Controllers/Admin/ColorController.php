<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::query()->get();
        return view('admin.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColorRequest $request)
    {
        $color = $request->all();
        Color::query()->create($color);
        return redirect()->route('colors.index')->with('message','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        return view('admin.colors.show',compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.colors.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, Color $color)
    {
        $data = $request->all();
        $color->update($data);
        return redirect()->route('colors.index')->with('message','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index')->with('message','Xóa thành công');
    }
}
