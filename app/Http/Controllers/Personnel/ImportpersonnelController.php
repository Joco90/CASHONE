<?php

namespace App\Http\Controllers\Personnel;

use PDO;
use PDOException;
use App\Models\Personnel;
use App\Models\ChaineBase;
use App\Models\TypeContrat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ImportpersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function rechercheChaine(Request $request){

        $dataChaine=ChaineBase::where('code','LIKE','%'.$request->term.'%')->orderBy('created_at','DESC')->get();

        foreach ($dataChaine as $chaine) {
            $chaines[]=["id"=>$chaine->id,"text"=>$chaine->code];
        }

        return response()->json(["code"=>200,"resultat"=>$chaines,"message"=>' succès'], 200);


     }

     public function getChaine(Request $request){
        $chaine=$_POST['code'];
        $dataChaine=ChaineBase::find($chaine);

        return response()->json(["code"=>200,"resultat"=>$dataChaine,"message"=>' succès'], 200);
     }

    public function importPersonnel(Request $request)
    {
        //
        $rules=[
            'code'=> 'required',
            'name_db'=> 'required',
        ];

        $messages=[
            'code.required' => 'Ce champs est obligatoire.',
            'name_db.required' => 'Ce champs est obligatoire.',
        ];

        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            // return response()->json(["message_return"=>(array)$validate->errors(),"resultat"=>false]);
            return redirect()->back()->withErrors($validate);
        }
        $utilisateur=Auth::user()->code;
        $chainedb=ChaineBase::find($request->code);
        $password=explode(";",$chainedb->configdb->libelle);
        $password=$password[4];

        if (Hash::check($password,$chainedb->passwords)) {

            try {
                // Paramètres de connexion à la base de données SQL Server
                $provider=$chainedb->privider;
                $serveur=$chainedb->serveur;
                $data_bd=$chainedb->name_db;
                $utilisateur = $chainedb->utilisateur;
                $dsn=$provider.":"."server=".$serveur.";Database=".$data_bd;
                $connexion = new PDO($dsn, $utilisateur, $password);
                // Exemple d'exécution d'une requête SQL
                $typeContrat = $connexion->prepare("SELECT * FROM TYPE_CONTRAT");
                if ($typeContrat->execute()) {
                    $allContrat=$typeContrat->fetchAll();
                    foreach($allContrat as $contrat){
                        $verifContrat=TypeContrat::where('code',$contrat[0])->first();
                        if(!$verifContrat){
                            TypeContrat::create([
                                'code'=>$contrat[0],
                                'libelle'=>$contrat[1],
                                'auteur'=>$utilisateur,
                                'statut'=>1,
                            ]);
                        }

                    }
                }

                $stmt = $connexion->prepare("SELECT * FROM PERSONNEL");
                $compteur=0;

                if ($stmt->execute()) {
                      $resultats = $stmt->fetchAll();
                    //   $resultats=json_encode($resultats);
                    foreach ($resultats as $personnels) {
                        $personnels = str_replace(['"','"'],'',$personnels);
                        $verifPersonnel=Personnel::where('matricule',$personnels[0])->first();
                        //   dd($personnels);

                        if(!$verifPersonnel){
                            $contrat=TypeContrat::where('code',$personnels[8])->first();
                            // dd($personnels);
                            Personnel::create([
                                "matricule"=>$personnels[0],
                                "nom"=>$personnels[1],
                                "prenoms"=>$personnels[2],
                                "emploi"=>$personnels[3],
                                "telephone"=>$personnels[4],
                                "mobile"=>$personnels[5],
                                "email_pro"=>$personnels[6],
                                "email_perso"=>$personnels[10],
                                "code_ci"=>$personnels[7],
                                "contrat"=>$contrat->id,
                                "civilite"=>$personnels[9],
                                "type_id"=>$personnels[11],
                            ]);
                            $compteur++;
                        }
                    }

                    // return redirect()->back()->withErrors("Le mot de passe par défaut est incorrect. Vueillez rééssayer plutard.");
                    // return response()->json(["message_return"=>"Traiment effectué avec succès. ".$compteur,"resultat"=>false]);
                } else {
                    // La requête a échoué
                    $erreurs = $connexion->errorInfo();
                    $erreur="Erreur lors de l'exécution de la requête : " . $erreurs[2];
                    return response()->json(["message_return"=>$erreur,"resultat"=>false]);
                }
                if ($compteur>0) {
                    return response()->json(["message_return"=>"Traiment effectué avec succès. ".$compteur,"resultat"=>true]);
                }else return response()->json(["message_return"=>"Traiment effectué avec succès. ".$compteur,"resultat"=>false]);
                $connexion = null;
            } catch (PDOException $e) {

                return response()->json(["message_return"=>"oh ".$e,"resultat"=>false]);
            }
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_title="Cashone | Importation personnel";
        return view('Personnels.importPersonnel',["title"=>$_title]);
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
