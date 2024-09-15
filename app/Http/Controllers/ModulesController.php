<?php

namespace App\Http\Controllers;

use App\Http\Requests\modulesRequest;
use App\Http\Requests\updatemodule;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulesController extends Controller
{

    public function index() {
      return view('welcome');
    }

    public function create() {
        return view('create_modules');
    }

    public function createFeedback(modulesRequest $request) {
        $titremodule= $request->input('nommodule');
        $prerequis= $request->input('prerequis')?:'Pas de préréquis';
        $description= $request->input('description');

        $module= Module::create([
           'idformateur'=>Auth::user()->id,
           'nommodule'=>$titremodule,
           'prerequis'=>$prerequis, 
           'description'=>$description
        ]);
        return redirect('modules')->with('success', '! ');
    }

    public function updatemodule(updatemodule $request) {
  
        $formateurid=Auth::user()->id;
        $titremodule= $request->nommodule;
        $prerequis= $request->prerequis?:'Pas de préréquis';
        $description= $request->description;
        
        $module= Module::find($request->idmodule);
        $module->nommodule = $titremodule;
        $module->prerequis = $prerequis;
        $module->description = $description;
        $module->save();
        return redirect('modules')->with('successupdate', 'Module mis à jour ');
    }


    public function listes() {
        $formateurid=Auth::user()->id;
        $modules= Module::where('idformateur', $formateurid)->get();
        return view('modules',
        [
         'modules'=> $modules   
        ]
        );
    }

    public function delete(Request $request){
        $formateurid=Auth::user()->id;
           $module=Module::where([
            'idmodule'=>$request->idmodule,
            'idformateur'=>$formateurid
                ]);

            $module->delete();
            return redirect('modules')->with('successDelete', '!');
    }
}
