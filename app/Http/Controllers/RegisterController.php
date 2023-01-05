<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //fonction qui renvoie le formulaire d'inscription
    public function formRegister(){
        return view('auth.register');
    }
    //fonction qui permet de s'inscrire
    public function register(Request $request){
        $request ->validate([
            'nom' => 'required|string|max:40',
            'prenom' => 'required|string|max:40',
            'login' => 'required|string|max:30|unique:users',
            'mdp' => 'required|string|confirmed|'
            ]);
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        $user->mdp = Hash::make($request->mdp);
        $user->save();
        $request->session()->flash('etat', 'compte crée !');
        Auth::login($user);
        return redirect('/');
    }
}
