@extends('modele')

@section('title','Connexion')

@section('contenu')
    <style>
        label{
            color: white;
        }
        p,h3,form{
            color: white;
        }
    </style>
    <a href="{{route('home')}}"><button style="background-color:white;color: dark;border-color:white;">Page principale</button></a>
    <h3>Connexion</h3>
    <div id="form">
    <form method="post">
        @csrf
        Login: <input type="text" name="login" value="{{old('login')}}">
        Mot de passe: <input type="password" name="mdp">
        <button style="background-color:royalblue;color: white;border-color: royalblue;" type="submit" value="Envoyer">Se connecter</button>
    </form>
    <hr>
    <p>Vous n'avez pas de compte ? <a href="{{route('register')}}"><button style="background-color:lightseagreen;color: white;border-color: lightseagreen;">Créer un compte</button></a></p>
    </div>
@endsection
