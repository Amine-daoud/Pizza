@extends('modele')

@section('title','Changement de mot de passe')

@section('contenu')
    <style>
        h3,form{
            color: white;
        }
    </style>
    <a href="{{route('home')}}"><button style="background-color:white;color: dark;border-color:white;">Retour à l'accueil</button></a>
    <h3>Changement de mot de passe</h3>
    <div id="form">
        <form action="{{route('modifierMdp')}}" method="post">
            @csrf
            Nouveau Mot de passe <br><input type="password" name="mdp"> <br>
            Confirmation de mot de passe <br> <input type="password" name="mdp_confirmation">
            <button style="background-color:royalblue;color: white;border-color: royalblue;" type="submit" value="Envoyer">Modifier le mot de passe</button>
        </form>
@endsection

