<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthentificationController extends Controller
{
    //fonction qui renvoie le formulaire de connexion
    public function formLogin()
    {
        return view('auth.login');
    }
    //fonction qui permet de se connecter
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string|max:40',
            'mdp' => 'required|string'
        ]);
        $credentials = ['login' => $request->input('login'),
            'password' => $request->input('mdp')];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            //request->session()->flash('etat', 'vous êtes connecté !');

            return redirect()->intended('/')->with('etat', 'Vous êtes Connecté !');
        }
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }
    //fonction qui permet de se déconnecter
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $request->session()->flash('etat', 'vous êtes déconnecté !');

        return redirect('login');
    }
    //fonction qui renvoie le formulaire pour changer son mot de passe
    public function modif_mdp()
    {
        return view('user.edit_mdp');
    }
    //fonction qui modifie le mot de passe
    public function modifier_mdp(Request $request)
    {
        $request->validate(
            [

                'mdp'=>'required|string',
            ]
        );
        Auth::user()->mdp=Hash::make($request->mdp);
        Auth::user()->save();
        return redirect('/')->with('etat','Mot de passe modifié !');

    }
    //fonction qui renvoie le formulaire pour changer le mot de passe d'un utilisateur cook
    public function modif_mdpCook(Request $request)
    {

        return view('admin.mdp_cook',['id'=>$request->id]);
    }
    //fonction qui modifie le mot de passe d'un utilisateur cook
    public function modifier_mdpCook(Request $request)
    {
        $request->validate(
            [

                'mdp'=>'required|string',
            ]
        );
            $u =User::where('id','=',"$request->id")->first();
            $u->mdp =Hash::make($request->mdp);
            $u->save();
            return redirect('/')->with('etat','Mot de passe modifié !');


    }
}
