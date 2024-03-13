<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    //Api d'affichage
    public function show()
    {
        $req="SELECT * FROM utilisateur where (bloc=0 OR bloc is null) and statut=10";
         $users=User::where(function ($query) {
            $query->where('bloc', 0)
                  ->orWhereNull('bloc');
        })
        ->where('statut', 10)
        ->get();
        //$users=DB::statement($req);
        return response()->json($users);
    }

    public function index(){

        $_title="Cashone | Gestion des utilisateurs";

        return view('Admin.User.index',["title"=>$_title]);
    }


    public function create(){
        $_title="Cashone | Gestion des utilisateurs";
        $profile=Profile::Where('statut',1)->get();

        return view('Admin.User.create',
        ["title"=>$_title,'profiles'=>$profile]);
    }

    public function update(){

    }

    public function resetPassword(){

    }

    public function destroy(){

    }



}
