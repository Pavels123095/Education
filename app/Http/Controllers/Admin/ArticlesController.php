<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::orderBy('created_at','DESC')->paginate(15);
        return view('admins.articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Articles();
        $article->name = $request->name;
        if (empty($request->alias))
            $article->alias = $this->translitSef($request->name);
        else
            $article->alias = $request->alias;
        
        if ($request->seo_keywords)
            $article->seo_keywords = $request->seo_keywords;
        else 
            $article->seo_keywords = '';
        
        if ($request->seo_description) 
            $article->seo_description = $request->seo_description;
        else 
            $article->seo_description = '';

        $article->detail_text = $request->content;
        $article->img = ($request->img) ? $request->img : '';

        $article->status = $request->status;

        $article->save();

        return redirect()->back()->withSuccess('Статья успешно создана');
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
    public function edit(Articles $article)
    {
        return view('admins.articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articles $article)
    {
        $article->name = $request->name;
        if ($request->alias != $article->alias) {
            $article->alias = $request->alias;
        }
        if (empty($request->alias) && $request->alias != $article->alias) {
            $article->alias = $this->translitSef($article->name);
        }

        $article->detail_text = $request->content;
        $article->img = $request->img;
        $article->status = $request->status;
        $article->seo_description = $request->seo_description;
        $article->seo_keywords = $request->seo_keywords;

        $article->save();
        
        return redirect()->back()->withSuccess('Статья успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}