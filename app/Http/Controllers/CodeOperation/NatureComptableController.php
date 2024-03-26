<?php

namespace App\Http\Controllers\CodeOperation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\NatureComptable;
use Illuminate\Http\Request;

class NatureComptableController extends Controller
{
    //

    public function newNatureComptView()
    {
        $title='nature-comptable';
        $listeNatures=NatureComptable::orderBy('created_at','DESC')->paginate(10);
        return view('code-operation.nature-compt.new-nature',compact('title','listeNatures'));
    }
    
    
    
    public function newNatureCompt(Request $request)
    {
        $datas=$request->all();
        Log::info(json_encode($datas));

        $messages = [
            'marchand.required' => 'Le marchand est obligatoire ',
            'montant.required' => 'Le montant est obligatoire ',
            'client.required' => 'Le client est obligatoire ',
           
    
        ];
    
        $validator =  Validator::make($request->all(), [
           
            'code' => 'required|max:4',
            'libelle' => 'required',
          
            
        ],$messages);
    
        if ($validator->fails()) {
            return response()->json([
                "code"=>0,
                "data"=>null,
                "message"=>"les parametre sont inccorecte",
            ], 200);
        }

        $natureCompte= new NatureComptable();
        $natureCompte->code_cn=$request->code;
        $natureCompte->libelle=$request->libelle;
        $natureCompte->save();
        return response()->json([
            "code"=>200,
            "data"=>$natureCompte,
            "message"=>'Code crée avec succès',
        ], 200);   

    }

    public function editNatureCompt(Request $request)
    {
        $datas=$request->all();
        Log::info(json_encode($datas));

        $messages = [
            'marchand.required' => 'Le marchand est obligatoire ',
            'montant.required' => 'Le montant est obligatoire ',
            'client.required' => 'Le client est obligatoire ',
           
    
        ];
    
        $validator =  Validator::make($request->all(), [
           
            'code_input' => 'required|max:4',
            'libelle_input' => 'required',
          
            
        ],$messages);
    
        if ($validator->fails()) {
            return response()->json([
                "code"=>0,
                "data"=>null,
                "message"=>"les parametre sont inccorecte",
            ], 200);
        }

        $natureCompte=  NatureComptable::find($request->id);
        $natureCompte->code_cn=$request->code_input;
        $natureCompte->libelle=$request->libelle_input;
        $natureCompte->save();
        return response()->json([
            "code"=>200,
            "data"=>$natureCompte,
            "message"=>'Code modifié avec succès',
        ], 200);   

    }
}
