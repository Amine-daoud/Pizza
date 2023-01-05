<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class Admin extends Controller
{
    //fonction qui renvoie la liste des utilisateurs
    public function listUtilisateur(){
        $users =DB::table('users')->get();
        return view('user.user_liste',['users'=>$users]);
    }
    //fonction qui renvoie la liste des utilisateurs cook
    public function listCook(){
        $users =DB::table('users')->get();
        return view('user.list_cook',['users'=>$users]);
    }
    public function vueCreerU(){
        return view('admin.creer_utilisateur');
    }
    //fonction qui renvoie le formulaire pour créer un compte admin
    public function creerA(){
        return view('admin.creer_admin');

    }
    //fonction qui renvoie le formulaire pour créer un compte cook
    public function creerK(){
        return view('admin.creer_cook');

    }
    //fonction qui crée le compte admin
    public function creationAdmin(Request $request){
        $request ->validate(
            [
                'nom'=>'required|string|max:30',
                'prenom'=>'required|string|max:30',
                'login'=>'required|string|max:30|unique:users',
                'mdp'=>'required|string|confirmed'
            ]
        );
        $user = new User();
        $user ->nom = $request->nom;
        $user ->prenom = $request->prenom;
        $user ->login = $request->login;
        $user ->mdp = Hash::make($request->mdp);

            $user ->type="admin";
            $user ->save();

            return redirect(route('listeU'))->with('etat','Un compte admin a été crée !');

    }
    //fonction qui crée le compte cook
   public function creationCook(Request $request){
        $request ->validate(
            [
                'nom'=>'required|string|max:30',
                'prenom'=>'required|string|max:30',
                'login'=>'required|string|max:30|unique:users',
                'mdp'=>'required|string|confirmed'
            ]
        );
        $user = new User();
        $user ->nom = $request->nom;
        $user ->prenom = $request->prenom;
        $user ->login = $request->login;
        $user ->mdp = Hash::make($request->mdp);

           $user ->type="cook";
           $user ->save();

           return redirect(route('listeU'))->with('etat','Un compte cook a été crée !');
       }

    //fonction qui renvoie le formulaire pour supprimer un utilisateur
    public function supprimerU($id){

        $u = User::findOrFail($id);
        return view('user.supp_user',['user'=>$u]);
    }
    //fonction qui supprime un utilisateur
    public function suppressionU($id){

        $u = User::findOrFail($id);
        $u->delete();
        return redirect(route('listeU'))->with('etat','Utilisateur supprimé !');
    }


}
