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
            'old_password'=> 'required|min:7',
            'password'=> 'required|string|min:2|confirmed',

        ];
        $messages=[
            'old_password.required' => 'Ce champs est obligatoire.',
            'old_password.min' => 'Le Mot de passe par defaut est incorrect!',
            'password.required' => 'Ce champs est obligatoire.',
            'password.string' => 'Le mot de passe doit contenir des lettre alphabet.',
            'password.min' => 'Le mot de passe trop court. Taille minimum est 8 caractère.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ];

        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $user=User::where('id',Auth::id())->first();
        if (Hash::check($request->old_password, $user->default_password)) {
            $user->password=Hash::make($request->password);
            $user->default_password=null;
            $user->date_password=date_create('now');
            $user->is_admin=1;
            $user->save();

            return redirect('dashboard/panel');

        }else return redirect()->back()->withErrors("Le mot de passe par défaut est incorrect. Vueillez rééssayer plutard.");
    }
}
