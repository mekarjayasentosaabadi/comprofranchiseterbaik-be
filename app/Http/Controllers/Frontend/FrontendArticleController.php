<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Master;
use App\Models\Article;
use App\Models\Franchise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class FrontendArticleController extends Controller
{
    public function index()
    {
        $franchises   = Franchise::where('is_active', 1)->get();
        $master       = Master::first();
        $articles     = Article::where('is_publish', 1)->latest()->get();
        $recentArticles     = Article::where('is_publish', 1)->latest()->take(3)->get();
        $populartags = Tag::withCount('articletag')
                    ->orderBy('articletag_count', 'desc')
                    ->take(10)                           
                    ->get();
        return view('pagesfrontend.article.index', compact('franchises', 'master', 'articles', 'recentArticles', 'populartags'));
    }

    public function show($slug)
    {
        $franchises   = Franchise::where('is_active', 1)->get();
        $master       = Master::first();
        $article      = Article::where('slug', $slug)->first();
        $recentArticles     = Article::where('is_publish', 1)->latest()->take(3)->get();
        $populartags = Tag::withCount('articletag')
                    ->orderBy('articletag_count', 'desc')
                    ->take(10)                           
                    ->get();
        return view('pagesfrontend.article.detail', compact('franchises', 'master', 'article', 'recentArticles', 'populartags'));
    }
}
