<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class inscriptionConnexion extends Controller
{
    public function inscription() {
     return view('inscription');
    }

    public function inscriptionResponse(Request $request){
     //validation
     $request->validate([
        'username' => 'required|min:4',
        'email' => 'required|email|unique:users',
        'password' =>'required|min:6|confirmed'
     ]);
     //traitement data
     $user= new User();
     $user->username=$request->username;
     $user->email= $request->email;
     $user->statut=0;
     $user->password= Hash::make($request->password);
     $user->save();
     Auth::logout();
     //retour
     return redirect()->route('inscription')->with([
        'inscription_soumis'=>"Votre inscription est en cours de validation. Vous recevrez une notification très bientot"
     ]);
    }

    public function connexion() {
        return view('connexion');
       }
       public function connexionResponse(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' =>'required'
         ]);

         $entrees=[
          "email"=>$request->email,
          "password"=>$request->password
        ];
         
         if(Auth::attempt($entrees)){
          $request->session()->regenerate();
          return redirect()->intended(route("modules"));
          Session::put('idmodule', 1);
        }
        return to_route("connexion")->withErrors([
           "email"=>"Identifiant (s) invalide (s)" 
        ])->onlyInput("email");
       }

       public function logout(){
        Auth::logout();
        return to_route("connexion");
    }
}
