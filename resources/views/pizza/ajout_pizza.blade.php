@extends('modele')

@section('title','Ajout des pizzas')

@section('contenu')

    <style>
        h3,form{
            color: white;
        }
    </style>
    <a href="{{route('home')}}"><button style="background-color:white;color: dark;border-color:white;">Retour à l'accueil</button></a>
    <h3>Création des pizzas</h3>
    <form action="{{route('ajouterP')}}" method="post">
        @csrf
        Nom <br>
        <input type="text" name="nom"><br>
        Description <br>
        <input type="text" name="description"><br>
        Prix <br>
        <input type="decimal" name="prix">

        <button style="background-color:darkslategrey;color: white;" type="submit" value="Envoyer" >Créer</button>
    </form>
@endsection

