<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Master;
use App\Models\Franchise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendArticleController extends Controller
{
    public function index()
    {
        $franchises   = Franchise::where('is_active', 1)->get();
        $master       = Master::first();
        return view('pagesfrontend.article.index', compact('franchises', 'master'));
    }

    public function show()
    {
        $franchises   = Franchise::where('is_active', 1)->get();
        $master       = Master::first();
        return view('pagesfrontend.article.detail', compact('franchises', 'master'));
    }
}
