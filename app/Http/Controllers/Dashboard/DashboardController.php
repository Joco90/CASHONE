<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $_title="Cashone | Gestion de profile";
        return view('Dashboard._dashbord',["title"=>$_title]);
    }
}
