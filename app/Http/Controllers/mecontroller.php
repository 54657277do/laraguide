<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class mecontroller extends Controller
{
    public function me(){
     return view('me', [
        'id'=>Auth::user()->id,
        'username'=>Auth::user()->username,
        'email'=>Auth::user()->email,
        'password'=>Auth::user()->password
     ]);
    }

    public function meupd(Request $request){
        $request->validate([
            'username' => 'required|min:4',
            'email' => 'required|email|',
            'password' =>'confirmed'
         ]);

        $formateurid=Auth::user()->id;
        $username= $request->input('username');
        $email= $request->input('email');
        $password=Hash::make($request->input('password'));
        $me=User::find($formateurid);
        if($request->password && (strlen($request->password))>5 ){
          $me->username=$username;
          $me->email=$email;
          $me->password=$password;
          $me->save();
          return redirect('me')->with('success', 'Nom, email et mot de passe modifiés avec sucess');
        }else {
            $me->username=$username;
            $me->email=$email;
            $me->save();
            return redirect('me')->with('success', 'Nom et email modifiés avec sucess');
        }
         
    }
}
