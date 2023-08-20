<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Outlet;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        return view ('frontend.index');
    }

    public function pilih_outlet() {
        return view('Frontend.pilih_outlet',[
            'outlet'=>Outlet::get()
        ]);
    }

    public function pilih_menu() {
        return view('Frontend.pilih_menu',[
            'menu'=>Menu::get()
        ]);
    }
}
