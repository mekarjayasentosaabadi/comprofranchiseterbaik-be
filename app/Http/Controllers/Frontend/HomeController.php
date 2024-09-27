<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Master;
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
        return view('pagesfrontend.index', compact('listitems', 'master', 'headerbanner','franchises'));
    }

    public function show($slug)
    {
        $franchises   = Franchise::where('is_active', 1)->get();
        $franchise = Franchise::where('is_active', 1)->where('slug', $slug)->first();
        $master    = Master::first();
        $franchisemedsos = Franchisemedso::where('franchises_id', $franchise->id)->get();
        return view('pagesfrontend.detail', compact('franchise', 'master', 'franchises', 'franchisemedsos'));
    }
}