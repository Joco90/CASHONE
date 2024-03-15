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
            'name'=> 'required|string',
            'firstnames'=> 'required|string',
            'email_pro'=> 'required|email|unique:utilisateurs',
            'email_perso'=> 'nullable|email|unique:utilisateurs',
            'telephone'=> 'required|numeric|digits:10|unique:utilisateurs',
            'mobile'=> 'numeric|digits:10|unique:utilisateurs',
            'profile'=> 'required',


        ];
        $messages=[
            'name.required' => 'Ce champs est obligatoire.',
            'name.string' => 'Nom invalide.',
            'firstnames.required' => 'Ce champs est obligatoire.',
            'firstnames.string' => 'Prénoms invalide.',
            'email_pro.required' => 'Ce champs est obligatoire.',
            'email_pro.email' => 'Adesse mail invalide.',
            'email_pro.unique' => 'Cette adresse a déjà un compte.',
            'email_perso.unique' => 'Cette adresse déjà dans notre système.',
            'email_perso.email' => 'Email invalide',
            'telephone.required' => 'Ce champs est obligatoire.',
            'telephone.numeric' => 'Numéro de téléphone invalide.',
            'telephone.digits' => 'Numéro de téléphone imcomplet.',
            'telephone.unique' => 'Ce numéro de téléphone existe déjà.',
            'mobile.numeric' => 'Numéro de téléphone invalide.',
            'mobile.digits' => 'Numéro de téléphone imcomplet.',
            'mobile.unique' => 'Ce numéro de téléphone existe déjà.',
            'profile.required' => 'Ce champs est oblogatoire.',

        ];

        $validate=Validator::make($request->all(),$rules,$messages);
        // dd($validate->errors);
        if ($validate->fails()) {
            return response()->json(["messagealerte"=>"Oops! Une erreur détectée....","message"=>(array)$validate->errors()->messages(),"resultat"=>false]);
        }
    }

    public function update(){

    }

    public function resetPassword(){

    }

    public function destroy(){

    }



}
