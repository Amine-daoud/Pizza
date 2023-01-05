@extends('modele')

@section('title','Inscription')

@section('contenu')
    <style>
        label,h3,p{
            color: white;
        }
        #form{
            width: 350px;
            height: auto;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
        }


    </style>
    <a href="{{route('home')}}"><button style="background-color:white;color: dark;border-color:white;">Page principale</button></a>

    <div id="form">
    <form method="post">
        <h3>Inscription</h3>
        @csrf
        <label for="nom">Nom</label><br>
        <input type="text" name="nom" value="{{old('nom')}}"><br>
        <label for="nom">Prenom</label><br>
        <input type="text" name="prenom" value="{{old('prenom')}}"><br>
        <label for="nom">Login</label><br>
        <input type="text" name="login" value="{{old('login')}}"><br>
        <label for="nom">Mot de passe</label><br>
        <input type="password" name="mdp"><br>
        <label for="nom">Confirmation mot de passe</label><br>
        <input type="password" name="mdp_confirmation"><br>
        <br>
        <button style="background-color:lightseagreen;color: white;border-color: lightseagreen;"type="submit" value="Envoyer">S'inscrire</button>
    </form>

        <p>Vous avez un compte ? <a href="{{route('login')}}"><button style="background-color:royalblue;color: white;border-color: royalblue;">Se connecter</button></a></p>
    </div>

@endsection
