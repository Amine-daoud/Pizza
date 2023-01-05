@extends('modele')
@section('title','Modifier le mot de passe de cook')
    <style>
           h3,form{
               color: white;
           }
    </style>
@section('contenu')
    <a href="{{route('home')}}"><button style="background-color:white;color: dark;border-color:white;">Retour à l'accueil</button></a><br>
    <h3>Changement de mot de passe</h3>
    <div id="form">
        <form action="{{route('modifierMdpCook')}}" method="post">
            @csrf
            <input type="hidden" name="id" value={{$id}}>
            Nouveau Mot de passe <br><input type="password" name="mdp"> <br>
            Confirmation de mot de passe <br> <input type="password" name="mdp_confirmation">
            <button style="background-color:royalblue;color: white;border-color: royalblue;" type="submit" value="Envoyer">Modifier le mot de passe</button>
        </form>
@endsection
