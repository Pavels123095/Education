<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Pages::orderBy('created_at','desc')->paginate(15);
        return view('admins.pages.index', [
            'pages' => $pages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $page = new Pages();
        $page->name = $request->name;
        if (empty($request->alias))
            $page->alias = $this->translitSef($request->name);
        else
            $page->alias = $request->alias;

        if ($request->seo_keywords)
            $page->seo_keywords = $request->seo_keywords;
        else 
            $page->seo_keywords = '';
        
        if ($request->seo_description) 
            $page->seo_description = $request->seo_description;
        else 
            $page->seo_description = '';

        $page->content = $request->content;
        $page->status = $request->status;
        $page->img = ($request->img) ? $request->img : '';

        $page->save();
        return redirect()->back()->withSuccess('Страница успешно создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pages $page)
    {
        
        return view('admins.pages.edit', [
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pages $page)
    {
        $page->name = $request->name;
        $page->content = $request->content;
        $page->img = ($request->img) ? $request->img : '';
        if ($request->seo_keywords)
            $page->seo_keywords = $request->seo_keywords;
        else 
            $page->seo_keywords = '';
        
        if ($request->seo_description) 
            $page->seo_description = $request->seo_description;
        else 
            $page->seo_description = '';

        $page->save();

        return redirect()->back()->withSuccess('Страница успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pages $page)
    {
        $page->delete();
        
        return redirect()->back()->withSuccess('Страница успешно удалена');
    }
}