@extends('modele')

@section('title','Créer un cook')

@section('contenu')
    <style>
        label,h3{
            color: white;
        }
    </style>
    <a href="{{route('home')}}"><button style="background-color:white;color: dark;border-color:white;">Retour à l'accueil</button></a>
    <h3>Création des Cook</h3>
    <form action="{{route('creerK')}}" method="post">
        @csrf
        <label for="nom">Nom</label><br>
        <input type="text" name="nom" value="{{old('nom')}}"><br>
        <label for="prenom">Prenom</label><br>
        <input type="text" name="prenom" value="{{old('prenom')}}"><br>
        <label for="login">Login</label><br>
        <input type="text" name="login" value="{{old('login')}}"><br>
        <label for="mdp">Mot de passe</label><br>
        <input type="password" name="mdp"><br>
        <label for="mdp_confirmation">Confirmation mot de passe</label><br>
        <input type="password" name="mdp_confirmation"><br>
        <br>
        <a><button style="background-color:lightseagreen;color: white;border-color: lightseagreen;"type="submit" value="Envoyer">Créer</button></a>
    </form>
@endsection
