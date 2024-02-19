<?php

namespace App\Http\Controllers\Authenfication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    //
    public function index(){
        $_title="Cashone | mot de passe oublié";
        return view('Auth.forget-password',["title"=>$_title]);
    }
}
