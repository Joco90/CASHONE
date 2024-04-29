<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ChaineBase;
use App\Models\ConfigBd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChaineConnexionController extends Controller
{
    // Api d'affichage des chaine
    public function listeChaine(){
        $chainebd=ChaineBase::where('statut','<>',0)->get();
        return response()->json($chainebd);
    }
    // Api d'enregistrement des chaines de connexion
    public function apiChaineSave(Request $request){
        $rules=[
            'code'=> 'required|max:10',
            'serveur'=> 'required|string',
            'name_db'=> 'required',
            'utilisateur'=> 'required',
            'passwords'=> 'required',
            'type'=> 'required',
        ];

        $messages=[
            'code.required' => 'Ce champs est obligatoire.',
            'code.max' => 'Code trop long.La taille maximale est 10.',
            'serveur.required' => 'Ce champs est obligatoire.',
            'name_db.required' => 'Ce champs est obligatoire.',
            'utilisateur.required' => 'Ce champs est obligatoire.',
            'passwords.required' => 'Ce champs est obligatoire.',
            'type.required' => 'Ce champs est obligatoire.',
        ];

        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return response()->json(["message_return"=>(array)$validate->errors(),"resultat"=>false]);
        }

        $chainebd=ChaineBase::where('code',$request->code)->first();
        if($chainebd){
            return response()->json(["message_return"=>"Cette chaine existe déjà.","resultat"=>false]);
        }else{
            $type=$request->type;

            switch ($type) {
                case 1:
                    $provider="mysql";
                    break;
                case 2:
                    $provider="sqlsrv";
                    break;
            }
            $datedujour=Carbon::now()->startOfDay();

            $libelle=$request->code.";".$provider.";".$request->serveur.";".$request->utilisateur.";".$request->passwords;

            ConfigBd::create([
                "libelle"=>$libelle,
                "auteur"=>Auth::user()->code,
            ]);
            $confidb=ConfigBd::latest()->first();
           
            ChaineBase::create([
                "code"=>$request->code,
                "privider"=>$provider,
                "serveur"=>$request->serveur,
                "utilisateur"=>$request->utilisateur,
                "passwords"=>Hash::make($request->passwords),
                "name_db"=>$request->name_db,
                "type"=>$request->type,
                "dmaj"=>$datedujour,
                "statut"=>1,
                "auteur"=>Auth::user()->code,
                "config_db"=>$confidb->id,

            ]);
            return response()->json(["message_return"=>"Traitement effectué avec succès. ".$confidb,"resultat"=>true]);
        }

    }

    public function index()
    {
        //
        $_title="Cashone | Gestion de chaine";
        return view('chaine-connexion.chaine-cashone',["title"=>$_title]);
    }

    public function verifieConnexion(){

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
