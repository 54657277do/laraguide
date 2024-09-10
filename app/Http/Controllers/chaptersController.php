<?php

namespace App\Http\Controllers;

use App\Http\Requests\modulesRequest;
use App\Models\Chapitre;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class chaptersController extends Controller
{

    public function createChapter() {
        return view('create_chapter');
    }

    public function createChapterFeedback(Request $request) {
        $request->validate([
            'nomchapitre'=>'required|min:5|unique:chapitres'
        ]);
        $nomchapitre= $request->input('nomchapitre');
        $idmodule=$request->input('idmodule');

        $module= Chapitre::create([
           'idformateur'=>Auth::user()->id,
           'nomchapitre'=>$nomchapitre,
           'idmodule'=>$idmodule
        ]);
        return to_route('chapters', Session::get('idmodule'))->with('success', '! ');
        
    }


    public function listesChapter(Request $request, $idmodule) {
        Session::put('idmodule', $request->idmodule);
        $idmodule=Session::get('idmodule');
        $chapters= Chapitre::where('idmodule', $idmodule)->get()??[];
        $module= Module::where('idmodule', $idmodule)->first();
        Session::put('nommodule', $module->nommodule);
        return view('chapters',
        [
         'module'=> $module, 
         'chapters'=> $chapters
        ]
        );
    }

    public function deletechapter(Request $request){
        $formateurid=Auth::user()->id;
           $chapter=Chapitre::where([
            'idchapitre'=>$request->idchapitre,
            'idformateur'=>$formateurid
                ]);

            $chapter->delete();
            return to_route('chapters', Session::get('idmodule'))->with('successDelete', '!');
    }
}
