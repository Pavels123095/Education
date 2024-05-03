<?php

namespace App\Http\Controllers\Admin\Option;

use App\Http\Controllers\Controller;
use App\Models\banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner = new banner();
        $banner->name = $request->name;
        $banner->img = $request->img;
        $banner->text = $request->text;
        $banner->active = $request->active;

        $banner->save();
        return redirect()->back()->withSuccess('Баннер добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->name = $request->name;
        $banner->img = $request->img;
        $banner->text = $request->text;
        $banner->active = $request->active;

        $banner->save();

        return redirect()->back()->withSuccess('Баннер обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->back()->withSuccess('Баннер удален');
    }
}
