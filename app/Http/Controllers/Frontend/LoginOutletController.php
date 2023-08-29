<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginOutletController extends Controller
{
    public function index(){
        return view('Auth.login-outlet');
    }
}
