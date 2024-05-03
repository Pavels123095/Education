<?php

namespace App\Http\Controllers\Admin\Option;

use App\Http\Controllers\Controller;
use App\Models\Main_menu;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        $main_menu = new Main_menu();
        $main_menu->title = $request->title;
        $main_menu->link = $request->link;
        $main_menu->level = $request->level;

        $main_menu->save();

        return redirect()->back()->withSuccess('Пункт меню добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Main_menu $main_menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Main_menu $main_menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Main_menu $menu)
    {
        $menu->title = $request->title;
        $menu->link = $request->link;
        $menu->level = $request->level;

        $menu->save();

        return redirect()->back()->withSuccess('Пункт меню обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Main_menu $menu)
    {
        $menu->delete();

        return redirect()->back()->withSuccess('Пункт меню удален!');
    }
}
