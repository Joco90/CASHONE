<?php

namespace App\Http\Controllers\Authenfication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use App\Mail\EnvoiPassword;
use App\Http\Controllers\Default_Func\UserController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    //

    public function index(){

        $defaulte_func= new UserController();

        $_profil=Profile::all()->count();

        if ($_profil==0) {
            $defaulte_func->profile_Default();
            $default_passw=$defaulte_func->password_default();
            $profil=Profile::latest()->first();
            $defaulte_func->create_Default_User($profil->ID,$default_passw);
            $users=User::latest()->first();
            // envoie de mail
            Mail::to($users->EMAIL)->send(new EnvoiPassword($users->NOM,$users->EMAIL,$default_passw));
        }

        $_title="Connexion Cashone";

       return view("Auth.login",["title"=>$_title]);
    }

    public function login(Request $request){

        $rules=[
            'email'=> 'required|email',
            'password'=> 'required',
        ];
        $messages=[
            'email.required' => 'Ce champs est obligatoire.',
            'email.email' => 'Addresse mail invalide!',
            'password.required' => 'Ce champs est obligatoire.',
        ];

        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return redirect('/')->withErrors($validate);
        }

        $user=User::Where('EMAIL',$request->email)->first();
        if ($user) {
            if ($user->PSWD==null) {
                if (Hash::check($request->get('password'), $user->PSW_IS_DEFAULT)) {
                    Auth::guard()->login($user);
                    $request->session()->regenerate();
                    return redirect('Auth/change-password');
                }
                return redirect()->back()->
                withErrors("Le mot de passe par defaut est incorrect.");

            }else{
                if (Hash::check($request->get('password'), $user->PSWD)) {
                    Auth::guard()->login($user);
                    return redirect('Dashboard/panel');
                }else return redirect()->back()->withErrors("Le mot de passe est incorrect.");

            }
        }else{
            return redirect()->back()->
                withErrors("Le code utilisateur est incorrect.");
        }

    }

    public function logout(){

    }


}
