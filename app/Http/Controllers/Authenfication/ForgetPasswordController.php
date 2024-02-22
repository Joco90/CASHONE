<?php

namespace App\Http\Controllers\Authenfication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\EnvoiPassword;
use App\Http\Controllers\Default_Func\UserController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ForgetPasswordController extends Controller
{
    //
    public function index(){
        $_title="Cashone | mot de passe oublié";
        return view('Auth.forget-password',["title"=>$_title]);
    }
// Api de mot passe oublié
    public function _forget(Request $request){
        // $message_Erreur=array();
        // $result=false;

        $rules=[
            'email'=> 'required|email',
        ];
        $messages=[
            'email.required' => 'Ce champs est obligatoire.',
            'email.email' => 'Addresse mail invalide!',
        ];

        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return response()->json(["message_return"=>(array)$validate->errors(),"resultat"=>false]);
        }

        $user=User::Where('email',$request->email)->first();

        if($user){
            $defaulte_func= new UserController();
            $default_passw=$defaulte_func->password_default();

            $user->password=null;
            $user->date_password=null;
            $user->default_password=Hash::make($default_passw);
            $user->save();
            Mail::to($user->email)->send(new EnvoiPassword($user->name,$user->email,$default_passw));
            return response()->json(["message_return"=>"Un mail vous a été envoyé à l'adresse indiquée, veuillez consulter.","resultat"=>true]);

        }else return response()->json(["message_return"=>"Ce compte n'existe pas dans le système. Veuillez contacter l'administrateur.","resultat"=>false]);


    }
}
