<?php

namespace App\Http\Controllers\Default_Func;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\User;
class UserController extends Controller
{
    //
    public function create_Default_User($id,$password_defautl){

        User::create([
            'code'=>'CASHONE',
            'name'=>'Utilisateur',
            'firstname'=>'Système',
            'profile'=>$id,
            'email'=>'joel.gompewo@mentall.net',
            'telephone'=>'2733727543',
            'mobile'=>'0707068084',
            'default_password'=>Hash::make($password_defautl),
            'statut'=>10,
        ]);

    }

    public function profile_Default(){

        Profile::create([
            'code'=>'ADS',
            'libelle'=>'Administrateur système',
            'type'=>1,
            'statut'=>10,
            'auteur'=>'Système'

        ]);
    }
    //Cette methode génère n mot de passe par défaut
    public function password_default(){
        $nbr=0;
        $init=str::random(1);
        for ($i=1; $i <6 ; $i++) {
            $nbr.=random_int(0,9);
        }
        $password_defautl=$nbr.strtoupper($init);
        return $password_defautl;
    }
}
