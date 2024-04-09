<?php

namespace App\Http\Controllers\CodeOperation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CorrespNature;
use App\Models\NatureComptable;
use Illuminate\Http\Request;

class CorrespondNatureController extends Controller
{
    //
    public function listeCorrespondance()
    {
        $title='Correspondance-comptable';
        $correspondances=CorrespNature::orderBy('created_at','DESC')->paginate(10);
        return view('code-operation.correspond-nature.liste-correspondance',compact('title','correspondances'));
    }

    public function recherchCode(Request $request)
    {
        $codes=NatureComptable::where('code_cn','LIKE','%'.$request->code.'%')->orderBy('created_at','DESC')->get();
        foreach ($codes as $code) {
            $cod[]=["id"=>$code->id,"text"=>$code->code_cn];
        }
        return response()->json([
            "code"=>200,
            "data"=>$cod,
            "message"=>' succès',
        ], 200);   
    }

    public function getCodeInfo(Request $request)
    {
        $code=NatureComptable::find($request->id);
        return response()->json([
            "code"=>200,
            "data"=>$code,
            "message"=>' succès',
        ], 200);   
    }

    public function saveCorrespond(Request $request)
    {
        $datas=$request->all();
        Log::info(json_encode($datas));

            $messages = [
                'marchand.required' => 'Le marchand est obligatoire ',
                'montant.required' => 'Le montant est obligatoire ',
                'client.required' => 'Le client est obligatoire ',
            
        
            ];
        
            $validator =  Validator::make($request->all(), [
            
                'phrase' => 'required',
                'code_correspond' => 'required',
            
                
            ],$messages);
        
            if ($validator->fails()) {
                return response()->json([
                    "code"=>0,
                    "data"=>null,
                    "message"=>"les parametre sont inccorecte",
                ], 200);
            }

            $user=Auth::user();
            $correspondance=new CorrespNature();
            $correspondance->phrase=$request->phrase;
            $correspondance->code_cn=$request->code_correspond;
            $correspondance->auteur=$user->code;
            $correspondance->save();
            return response()->json([
                "code"=>200,
                "data"=>$correspondance,
                "message"=>' succès',
            ], 200);   


    }

    public function viewNouveau()
    {
        $title='Correspondance-comptable';
        return view('code-operation.correspond-nature.nouvelle-correspondance',compact('title'));
    }
    
    
}
