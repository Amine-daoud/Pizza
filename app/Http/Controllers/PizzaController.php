<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PizzaController extends Controller
{
    //fonction qui affiche la liste des pizzas avec pagination
    public function listePizza(){
        $p = Pizza::paginate(5);
        return view('pizza.liste_pizza',['pizza'=>$p]);
    }

    //fonction qui renvoie le formulaire pour créer une nouvelle pizza
    public function ajouterPizza(){
        return view('pizza.ajout_pizza');
    }
    //fonction qui crée une nouvelle pizza
    public function sauvegarderajout(Request $request){

        $v = $request->validate(
            [
                'nom'=>'required|string|max:30',
                'description'=>'required|string|max:30',
                'prix'=>'required|integer'
            ]

        );

        $p = new Pizza();
        $p->nom = $v['nom'];
        $p->description = $v['description'];
        $p->prix= $v['prix'];
        $p->created_at=now();
        $p->updated_at=now();
        $p->deleted_at=null;
        $p->save();

        return redirect()->route('listeP')->with('etat','Pizza ajoutée !');

    }

    //fonction qui renvoie le formulaire pour supprimer une nouvelle pizza
    public function supprimer($id){

        $p = Pizza::findOrFail($id);
        return view('pizza.supp_pizza',['pizza'=>$p]);
    }
    //fonction qui permet de supprimer une pizza
    public function supprimerPizza($id){

        $p = Pizza::findOrFail($id);
        $p->delete();

        return redirect()->route('listeP')->with('etat','Pizza supprimée !');
    }
    //fonction qui renvoie le formulaire pour modifier une nouvelle pizza
    public function modifier($id){
        $p = Pizza::findOrFail($id);
        return view('pizza.modif_pizza',['pizza'=>$p]);

    }
    //fonction qui permet de modifier une pizza
    public function modifierPizza(Request $request,$id){
        $p = Pizza::findOrFail($id);
        if($request->has('Modifier')){
            $r = $request ->validate(
                [
                    'nom'=>'required|string|max:30',
                    'description'=>'required|string|max:30',
                    'prix'=>'required|integer'
                ]
            );
            $p->updated_at=now();

            $p->nom = $r['nom'];
            $p->description = $r['description'];
            $p->prix = $r['prix'];

            $p->save();

            return redirect()->route('listeP')->with('etat','Pizza modifiée !');
        }else{
            return redirect()->route('listeP')->with('etat','modification annulée !');
        }
    }
}
