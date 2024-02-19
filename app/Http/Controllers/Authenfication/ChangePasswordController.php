<?php

namespace App\Http\Controllers\Authenfication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Http\Controllers\Default_Func\UserController;
use App\Models\User;

class ChangePasswordController extends Controller
{
    //
    public function index(){
        $_title="Cashone | Changer mot de passe";
        return view('Auth.change-password',["title"=>$_title]);
    }

    public function _updatePassword(Request $request){
        $rules=[
            'old_password'=> 'required|size:7',
            'new_password'=> 'required|string|min:2|confirmed',

        ];
        $messages=[
            'old_password.required' => 'Ce champs est obligatoire.',
            'old_password.size' => 'Le Mot de passe par defaut est incorrect!',
            'new_password.required' => 'Ce champs est obligatoire.',
            'new_password.string' => 'Le mot de passe doit contenir des lettre alphabet.',
            'new_password.min' => 'Le mot de passe trop court. Taille minimum est 8 caractère.',
            'new_password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ];

        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $user=User::where('id',Auth::id())->first();
        if (Hash::check($request->old_password, $user->password_default)) {
            $user->passwords=Hash::make($request->new_password);
            $user->password_default=null;
            $user->save();
            return redirect('/Dashboard-mentall');

        }else return redirect()->back()->withErrors("Le mot de passe par défaut est incorrect.");
    }
}
