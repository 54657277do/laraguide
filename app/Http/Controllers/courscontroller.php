<?php

namespace App\Http\Controllers;

use App\Http\Requests\modulesRequest;
use App\Models\Chapitre;
use App\Models\Cour;
use App\Models\cours;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class courscontroller extends Controller
{

    public function createcours() {
        return view('create_cours');
    }

    public function createcoursFeedback(Request $request) {
        $request->validate([
            'titrecours'=>'required|min:5|unique:cours',
            'contenucours'=>'required|min:10|unique:cours',
            'illustrationcours'=> 'max:10000000'
        ]);
        $titrecours= $request->input('titrecours');
        $contenucours=$request->input('contenucours');
        $idchapitre=$request->input('idchapitre');
        $illustrationcours= $request->illustrationcours;
        
        if($illustrationcours != NULL && !$illustrationcours->getError()){ 
            $illustrationcours=$illustrationcours->store('coursimg', 'public');
         }
        $cours= cours::create([
           'idformateur'=>Auth::user()->id,
           'idchapitre'=>$idchapitre,
           'titrecours'=>$titrecours,
           'illustrationcours'=>$illustrationcours,
           'contenucours'=>$contenucours
        ]);
        return to_route('cours', Session::get('idchapitre'))->with('success', '! ');
        
    }

    public function updatecours(Request $request) {
        $request->validate([
            'titrecours'=>'required|min:5',
            'contenucours'=>'required|min:10',
            'illustrationcours'=> 'max:10000000'
        ]);
        $formateurid=Auth::user()->id;
        $titrecours= $request->titrecours;
        $contenucours= $request->contenucours;
        $illustrationcours= $request->illustrationcours;
        
        $cours= cours::find($request->idcours);
    
        if($illustrationcours != NULL && !$illustrationcours->getError()){ 
            if($cours->illustrationcours){
                Storage::disk('public')->delete($cours->illustrationcours);
               }
            $illust=$illustrationcours->store('coursimg', 'public');
            $cours->illustrationcours = $illust;
            $cours->save();
         }

        $cours->titrecours = $titrecours;
        $cours->contenucours = $contenucours;
        $cours->save();
        return to_route('cours', Session::get('idchapitre'))->with('successupdate', 'Cours mis à jour ');
    }


    public function listescours(Request $request, $idchapitre) {
        $formateurid=Auth::user()->id;
        Session::put('idchapitre', $request->idchapitre);
        $idchapitre=Session::get('idchapitre');
        $cours= cours::where(['idchapitre'=> $idchapitre, 'idformateur'=> $formateurid])->get()??[];
        $chapters= Chapitre::where(['idchapitre'=> $idchapitre, 'idformateur'=> $formateurid])->first();
        Session::put('nomchapitre', $chapters->nomchapitre);
        return view('cours',
        [
         'chapters'=> $chapters, 
         'cours'=> $cours
        ]
        );
    }

    public function deletecours(Request $request){
        $formateurid=Auth::user()->id;
           $cours=cours::where([
            'idcours'=>$request->idcours,
            'idformateur'=>$formateurid
                ])->first();
                if($cours->illustrationcours){
                    Storage::disk('public')->delete($cours->illustrationcours);
                   }
            $cours->delete();
            return to_route('cours', Session::get('idchapitre'))->with('successDelete', '!');
    }
}
