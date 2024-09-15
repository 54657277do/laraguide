<?php

namespace App\Http\Controllers;

use App\Http\Requests\modulesRequest;
use App\Models\Chapitre;
use App\Models\Cour;
use App\Models\cours;
use App\Models\qcm;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class qcmcontroller extends Controller
{

    public function createqcm() {
        return view('create_qcm');
    }

    public function createqcmFeedback(Request $request) {
        $request->validate([
            'libelle'=>'required|min:5|unique:qcm',
            'option1'=>'required',
            'option2'=>'required',
            'option3'=>'required',
            'reponse'=>'required',
            'illus'=> 'max:10000000'
        ]);
        
        $libelle= $request->input('libelle');
        $option1= $request->input('option1');
        $option2= $request->input('option2');
        $option3= $request->input('option3');
        $reponse= $request->input('reponse');
        $idchapitre=$request->input('idchapitre');
        $illus= $request->illus;
        
        if($illus != NULL && !$illus->getError()){ 
            $illust=$illus->store('qcmimg', 'public');
         }else{$illust="";}

        $qcm = qcm::create([
           'idformateur'=>Auth::user()->id,
           'idchapitre'=>$idchapitre,
           'illustrationqcm'=>$illust,
           'libelle'=>$libelle,
           'option1'=>$option1,
           'option2'=>$option2,
           'option3'=>$option3,
           'reponse'=>$reponse
        ]);
        return to_route('qcm', Session::get('idchapitre'))->with('success', '! ');
        
    }

    public function updateqcm(Request $request) {
        $request->validate([
            'libelle'=>'required|min:5',
            'option1'=>'required', 
            'option2'=>'required',
            'option3'=>'required',
            'reponse'=>'required',
            'illus'=> 'max:10000000'
        ]);
        $formateurid=Auth::user()->id;
        $libelle= $request->libelle;
        $option1= $request->option1;
        $option3= $request->option3;
        $option2= $request->option2;
        $reponse= $request->reponse;
        $illustrationqcm= $request->illustrationqcm;

        $qcm= qcm::find($request->idqcm);

        if($illustrationqcm != NULL && !$illustrationqcm->getError()){ 
            if($qcm->illustrationqcm){
                Storage::disk('public')->delete($qcm->illustrationqcm);
               }
            $illustrationqcm=$illustrationqcm->store('qcmimg', 'public');
            $qcm->illustrationqcm = $illustrationqcm;
            $qcm->save();
         }
        $qcm->libelle = $libelle;
        $qcm->option1 = $option1;
        $qcm->option2 = $option2;
        $qcm->option3 = $option3;
        $qcm->reponse = $reponse;
        $qcm->save();
        return to_route('qcm', Session::get('idchapitre'))->with('successupdate', 'QCM mis à jour ');
    }

    public function listesqcm(Request $request, $idchapitre) {
        $formateurid=Auth::user()->id;
        Session::put('idchapitre', $request->idchapitre);
        $idchapitre=Session::get('idchapitre');
        $qcm= qcm::where(['idchapitre'=> $idchapitre, 'idformateur'=> $formateurid])->get()??[];
        $chapters= Chapitre::where(['idchapitre'=> $idchapitre, 'idformateur'=> $formateurid])->first();
        Session::put('nomchapitre', $chapters->nomchapitre);
        return view('qcm',
        [
         'chapters'=> $chapters, 
         'qcms'=> $qcm
        ]
        );
    }

    public function deleteqcm(Request $request){
        $formateurid=Auth::user()->id;
           $qcm=qcm::where([
            'idqcm'=>$request->idqcm,
            'idformateur'=>$formateurid
                ])->first();
                if($qcm->illustrationqcm){
                    Storage::disk('public')->delete($qcm->illustrationqcm);
                   }
            $qcm->delete();
            return to_route('qcm', Session::get('idchapitre'))->with('successDelete', '!');
    }
}
