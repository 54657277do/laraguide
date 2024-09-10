<?php

namespace App\Http\Controllers;

use App\Http\Requests\modulesRequest;
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


    public function listes() {
        $modules= Module::all();
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
