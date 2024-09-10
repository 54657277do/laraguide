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

class courscontroller extends Controller
{

    public function createcours() {
        return view('create_cours');
    }

    public function createcoursFeedback(Request $request) {
        $request->validate([
            'nomcours'=>'required|min:5|unique:cours'
        ]);
        $nomchapitre= $request->input('nomchapitre');
        $idmodule=$request->input('idmodule');

        $module= Chapitre::create([
           'idformateur'=>Auth::user()->id,
           'nomchapitre'=>$nomchapitre,
           'idmodule'=>$idmodule
        ]);
        return to_route('cours', Session::get('idchapitre'))->with('success', '! ');
        
    }


    public function listescours(Request $request, $idchapitre) {
        Session::put('idchapitre', $request->idchapitre);
        $idchapitre=Session::get('idchapitre');
        $cours= cours::where('idchapitre', $idchapitre)->get()??[];
        $chapters= Chapitre::where('idchapitre', $idchapitre)->first();
        Session::put('nomchapitre', $chapters->nomchapitre);
        return view('cours',
        [
         'chapters'=> $chapters, 
         'cours'=> $cours
        ]
        );
    }

    public function deleteccours(Request $request){
        $formateurid=Auth::user()->id;
           $cours=cours::where([
            'idcours'=>$request->idcours,
            'idformateur'=>$formateurid
                ]);

            $cours->delete();
            return to_route('cours', Session::get('idchapitre'))->with('successDelete', '!');
    }
}
