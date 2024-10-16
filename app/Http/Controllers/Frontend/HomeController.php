<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Master;
use App\Models\Article;
use App\Models\Listitem;
use App\Models\Franchise;
use App\Models\Headerbanner;
use Illuminate\Http\Request;
use App\Models\Franchisemedso;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $headerbanner = Headerbanner::where('is_active', 1)->first();
        $master       = Master::first();
        $listitems    = Listitem::where('is_active', 1)->get();
        $franchises   = Franchise::where('is_active', 1)->get();
        $articles     = Article::where('is_publish', 1)->latest()->take(3)->get();
        return view('pagesfrontend.home.index', compact('listitems', 'master', 'headerbanner','franchises', 'articles'));
    }

    public function show($slug)
    {
        $franchises   = Franchise::where('is_active', 1)->get();
        $franchise = Franchise::where('is_active', 1)->where('slug', $slug)->first();
        $master    = Master::first();
        $franchisemedsos = Franchisemedso::where('franchises_id', $franchise->id)->get();
        return view('pagesfrontend.home.detail', compact('franchise', 'master', 'franchises', 'franchisemedsos'));
    }
}
