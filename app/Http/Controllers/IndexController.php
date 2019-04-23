<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use App\Category;
use Illuminate\Http\Request;

class IndexController extends SiteController
{
    public function __construct()
    {
        $this->template = 'front.index';
    }

    public function index()
    {
        $articles = Article::paginate(2);

        $this->content = view('front.main',compact('articles'))->render();
        return $this->renderOutput();
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $this->content = view('front.show',compact('article'))->render();
        return $this->renderOutput();
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $articles = $tag->articles()->paginate(2);

        $this->content = view('front.list',compact('articles'))->render();
        return $this->renderOutput();
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $articles = $category->articles()->paginate(2);

        $this->content = view('front.list',compact('articles'))->render();
        return $this->renderOutput();
    }
}
