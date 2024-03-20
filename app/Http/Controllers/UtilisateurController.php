<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Mail\EnvoiPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Default_Func\UserController;
use Illuminate\Support\Facades\Mail;

class UtilisateurController extends Controller
{
    //Api d'affichage
    public function show()
    {
        // $req="SELECT * FROM utilisateur where (bloc=0 OR bloc is null) and statut=10";
         $users=User::where(function ($query) {
            $query->where('bloc', 0)
                  ->orWhereNull('bloc');
        })
        ->where('statut',1)
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

    public function save(Request $request){
        $rules=[
            'code'=> 'required|unique:utilisateur',
            'initial'=> 'required|string',
            'matricule'=> 'required|unique:utilisateur',
            'name'=> 'required|string',
            'firstname'=> 'required|string',
            'email'=> 'required|email|unique:utilisateur',
            'telephone'=> 'required|numeric|digits:10',
            'mobile'=> 'required|numeric|digits:10|unique:utilisateur',
            'profile'=> 'required',
        ];

        $messages=[
            'code.required' => 'le code utilisateur est obligatoire.',
            'initial.required' => 'Initial utilisateur est obligatoire.',
            'name.required' => 'le nom est obligatoire.',
            'name.string' => 'Nom invalide.',
            'firstname.required' => 'Prénom est obligatoire.',
            'firstname.string' => 'Prénoms invalide.',
            'email.required' => 'adresse email est obligatoire.',
            'email.email' => 'Adresse mail invalide.',
            'matricule.unique' => 'Cet matricule a déjà un compte. Impossible de le créer plusieurs fois.',
            'code.unique' => 'Cet code a déjà un compte. Impossible de le créer plusieurs fois.',
            'email.unique' => 'Cette adresse a déjà un compte.',
            'telephone.required' => 'Numéro de téléphone est obligatoire.',
            'telephone.numeric' => 'Numéro de téléphone invalide.',
            'telephone.digits' => 'Numéro de téléphone imcomplet.',
            'telephone.unique' => 'Ce numéro de téléphone existe déjà.',
            'mobile.numeric' => 'Numéro de téléphone mobile invalide.',
            'mobile.digits' => 'Numéro de téléphone mobile imcomplet.',
            'mobile.unique' => 'Ce numéro de téléphone mobile existe déjà.',
            'mobile.required' => 'Numéro de téléphone mobile est oblogatoire.',
            'profile.required' => 'Le profil est oblogatoire.',

        ];

        $validate=Validator::make($request->all(),$rules,$messages);

        if ($validate->fails()) {
            return response()->json(["message_return"=>(array)$validate->errors()->messages(),"resultat"=>false]);
        }
        $function= new UserController;
        $statut=$request->statut;
        $is_admin=$request->is_admin;
        $password_defautl=$function->password_default();
        $datedujour=Carbon::now()->startOfDay();

        switch ($statut) {
            case 'on':
                $statut=1;
                break;
            case 'off':
                $statut=0;
                break;
        }

        switch ($is_admin) {
            case 'on':
                $is_admin=1;
                break;
            case 'off':
                $is_admin=0;
                break;
        }

        User::create([
            'code'=>$request->code,
            'matricule'=>$request->matricule,
            'name'=>$request->name,
            'firstname'=>$request->firstname,
            'profile'=>$request->profile,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
            'mobile'=>$request->mobile,
            'date_password'=>$datedujour,
            'default_password'=>Hash::make($password_defautl),
            'statut'=>$request->statut,
            'debut_activ'=>$datedujour,
            'fin_activ'=>$request->fin_activ,
            'statut'=>$statut,
            'is_admin'=>$is_admin,
            'initial'=>$request->initial,
            'idjade'=>$request->idjade,
            'auteur'=>Auth::user()->code,
        ]);

        Mail::to($request->email)->send(new EnvoiPassword($request->name,$request->email,$password_defautl));

        return response()->json(["message_return"=>"Traitement effectué avec succès.","resultat"=>true]);
    }

    public function update(){

    }

    public function resetPassword(){

    }

    public function destroy(){

    }



}
