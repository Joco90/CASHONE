<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_title="Cashone | Gestion de profile";
        $profile=Profile::where('statut','<>',0)->get();
        return view('Admin.Profile.index',["title"=>$_title,"profile"=>$profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    public function createProfile(Request $request){


        $rules=[
            'code'=> 'required|max:6',
            'libelle'=> 'required',
            'type'=> 'required',
        ];

        $messages=[
            'code.required' => 'Ce champs est obligatoire.',
            'code.max' => 'Code trop long.La taille maximale est 6.',
            'libelle.required' => 'Ce champs est obligatoire.',
            'type.required' => 'Ce champs est obligatoire.',
        ];

        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return response()->json(["message_return"=>(array)$validate->errors(),"resultat"=>false]);
        }

        $profile=Profile::where('code',$request->code)->first();
        if($profile){
            return response()->json(["message_return"=>"Ce profile existe déjà.","resultat"=>false]);
        }else{
            Profile::create([
                "code"=>$request->code,
                "libelle"=>$request->libelle,
                "type"=>$request->type,
                "statut"=>1,
                "auteur"=>Auth::user()->code,
            ]);
            return response()->json(["message_return"=>"Traitement effectué avec succès.","resultat"=>true]);
        }

    }
    public function store(Request $request)
    {
        //Enregistrement de profile

    }


    public function show()
    {
        $profile=Profile::where('statut','<>',0)->get();
        return response()->json($profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
        $profile=Profile::Where('code',$_POST['code'])->first();

        if ($profile) {
            $profile->libelle=$_POST['libelle'];
            $profile->type=$_POST['type'];
            $profile->statut=$_POST['statut'];
            $profile->save();
            return response()->json(["message_return"=>"Traitement effectué avec succès.","resultat"=>true]);

        }else return response()->json(["message_return"=>"Le profile sélectionné ne peut être modifié. Vueillez contacter l'administrateur.","resultat"=>false]);
    }



    public function destroy(Request $request)
    {
        // dd();
         $liste=$_POST['listeP'];

        // $test=Profile::whereIn('id', ($liste))->toSql();
        // return response()->json(["message_return"=>"Test encore","resultat"=>true,"don"=>$test]);
        $user=User::WhereIn('profile',($liste))->count();
        if ($user==0) {
            $profileP=Profile::whereIn('id',($liste))->delete();

            if ($profileP) {
                return response()->json(["message_return"=>"Traitement effectué avec succès.","resultat"=>true,"don"=>$liste]);
            }else return response()->json(["message_return"=>"Traitement impossible.","resultat"=>false,"don"=>$liste]);

        }else{
            return response()->json(["message_return"=>"Certains profiles sont liés à un utilisateur. Opération impossible!","resultat"=>false,"don"=>$user]);
        }


    }
}
