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
            'CODE'=>'CASHONE',
            'NOM'=>'Utilisateur',
            'PRENOMS'=>'Système',
            'PROFILE'=>$id,
            'EMAIL'=>'joel.gompewo@mentall.net',
            'TELEPHONE'=>'2733727543',
            'MOBILE'=>'0707068084',
            'PSW_IS_DEFAULT'=>Hash::make($password_defautl),
            'STATUT'=>10,
        ]);
    
    }

    public function profile_Default(){

        Profile::create([
            'CODE'=>'ADS',
            'LIBELLE'=>'Administrateur système',
            'TYPE'=>1,
            'STATUT'=>10,
            'AUTEUR'=>'Système'

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
