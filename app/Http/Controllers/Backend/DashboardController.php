<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Master;
use App\Models\Listitem;
use App\Models\Mediasocial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $menu = "dashboard";
        $sumDataUsers = User::count();
        $sumDataProducts = Master::count();
        $sumDataListitem = Listitem::count();
        $sumDataMediasocial = Mediasocial::count();
        return view('pagesbackend.dashboard.index', compact('menu', 'sumDataUsers', 'sumDataProducts', 'sumDataListitem', 'sumDataMediasocial'));
    }
}
