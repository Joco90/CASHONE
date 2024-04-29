<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personnel;
use PDO;
use PDOException;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiListe()
    {
         $personnels=Personnel::where('statut',1)->get();
        return response()->json($personnels);
    }

    public function recherchPersonnel(Request $request){

        try {
            // Paramètres de connexion à la base de données SQL Server
            $dsn = 'sqlsrv:Server=127.0.0.1;Database=CASHONE';
            $utilisateur = 'sa';
            $motDePasse = 'Menta@2020';

            $connexion = new PDO($dsn, $utilisateur, $motDePasse);
            // Exemple d'exécution d'une requête SQL
            $stmt = $connexion->query("SELECT MATRI,NOM,PRENOM FROM PERSONNEL WHERE MATRI LIKE '%".$_POST['term']."%' ORDER BY NOM");
            // Traitement des résultats
            if ($stmt) {
                  $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($resultats as $value) {
                    $dataPersonnel[]=["id"=>$value['MATRI'],"text"=>$value['NOM']." ".$value['PRENOM']];
                }
                return response()->json(["code"=>200,"resultat"=>$dataPersonnel,"message"=>' succès'], 200);

            } else {
                // La requête a échoué
                $erreur = $connexion->errorInfo();
                echo "Erreur lors de l'exécution de la requête : " . $erreur[2];
                return response()->json(["resultat"=>$erreur]);
            }
            $connexion = null;
        } catch (PDOException $e) {
            return response()->json([
                "resultat"=>$e
            ]);
        }
    }

    public function getPersonnel(Request $request){
        try {
            // Paramètres de connexion à la base de données SQL Server
            $dsn = 'sqlsrv:Server=127.0.0.1;Database=CASHONE';
            $utilisateur = 'sa';
            $motDePasse = 'Menta@2020';

            $connexion = new PDO($dsn, $utilisateur, $motDePasse);

            $matri=$_POST['matricule'];
             $matri = $connexion->quote($matri);
            // dd($matri);
            $stmt = $connexion->query("SELECT * FROM PERSONNEL WHERE MATRI=".$matri." ORDER BY NOM");
                // Supposons que $stmt contient votre objet PDOStatement
                // dd($stmt);
            if ($stmt) {

                $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return response()->json(["code"=>200,"resultat"=>$resultats,"message"=>' succès'], 200);
            } else {
                // La requête a échoué
                $erreur = $connexion->errorInfo();
            }
            $connexion = null;
        } catch (PDOException $e) {
            // Gestion des exceptions PDO
            $erreur="Erreur ".$e;
        }
    }
    public function index()
    {
        $_title="Cashone | Gestion de personnel";

        return view('Personnels.index',["title"=>$_title]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $_title="Cashone | Gestion de personnel";
        $personnel= new Personnel();

        return view('Personels.CreatePersonel',["personnels"=>$personnel,"title"=>$_title]);
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
