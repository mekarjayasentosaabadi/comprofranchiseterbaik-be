<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Master;
use App\Models\Article;
use App\Models\Franchise;
use App\Models\Articletag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendArticleController extends Controller
{
    public function index(Request $request)
    {
        $franchises   = Franchise::where('is_active', 1)->get();
        $master       = Master::first();
        $articles     = Article::where('is_publish', 1)->latest()->paginate(5)->withQueryString();
        $recentArticles     = Article::where('is_publish', 1)->latest()->take(3)->get();

        $populartags = Tag::withCount('articletag')
                        ->having('articletag_count', '>', 0) 
                        ->orderBy('articletag_count', 'desc')
                        ->take(5)                           
                        ->get();
        return view('pagesfrontend.article.index', compact('franchises', 'master', 'articles', 'recentArticles', 'populartags'));
    }

    public function show($slug)
    {
        $franchises   = Franchise::where('is_active', 1)->get();
        $master       = Master::first();
        $article      = Article::where('slug', $slug)->first();
        $recentArticles     = Article::where('is_publish', 1)->latest()->take(3)->get();
        $hastags      = Articletag::where('article_id', $article->id)->get();
        return view('pagesfrontend.article.detail', compact('franchises', 'master', 'article', 'recentArticles', 'hastags'));
    }

    public function filterbytag($tag)
    {
        $franchises   = Franchise::where('is_active', 1)->get();
        $master       = Master::first();
        $articles     = null;

        if ($tag) {
            $articles = Article::where('is_publish', 1)
                                ->whereHas('articletag.tag', function ($query) use ($tag) {
                                    $query->where('slug', $tag);
                                })->latest()->paginate(9)->withQueryString();
            $tagquery = Tag::where('slug', $tag)->first();
            $tagname  = $tagquery->name;
        }
        return view('pagesfrontend.article.filtertag', compact('franchises', 'master', 'articles', 'tagname'));
    }
}
