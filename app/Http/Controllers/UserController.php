<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index(){
        if (Auth::check()){
            if(Auth::user() && Auth::user()->user_type=="user"){
                return view('vendas.index');
            }
            else if(Auth::user() && Auth::user()->user_type=="admin"){
                return view('vendas.vendedor');
            }
        }
    }
}
