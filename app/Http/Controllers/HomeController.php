<?php

namespace App\Http\Controllers;
use App\Models\Option;
use App\Models\Articles;
use App\Models\Pages;
use App\Models\banner;
use App\Models\Main_menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $options,$banners,$menu;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->options = Option::all();
        $this->banners = banner::all();
        $this->menu = Main_menu::all();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $options = Option::all();
        $banners = banner::where('active', true)->get();
        $menu = Main_menu::all();
        return view('home', [
            'menu' => $menu,
            'options' => $options,
            'banners' => $banners
        ]);
    }

    public function articles() {
        $articles = Articles::orderBy('created_at', 'DESC')->where('status',1)->paginate(10);
        return view('articles.index', [
            'articles' => $articles,
            'menu' => $this->menu,
        ]);
    }

    public function article_show($alias) {
        $article = Articles::where('alias', $alias)->first();

        if (empty($article) || $article === null) {
            abort(404);
        }

        return view('articles.detail', [
            'article' => $article,
            'menu' => $this->menu,
        ]);
    }

    public function page($alias) {
        $page = Pages::where('alias', $alias)->first();
        
        if (empty($page) || $page === null) {
            abort(404);
        }

        return view('pages.index', [
            'page' => $page,
            'menu' => $this->menu,
        ]);
    }
}
