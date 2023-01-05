@extends('modele')

@section('title','Créer un utilisateur')

@section('contenu')
    <style>
        label,h3{
            color: white;
        }
    </style>
    <a href="{{route('home')}}"><button style="background-color:white;color: dark;border-color:white;">Retour à l'accueil</button></a><br>
    <br><a href="{{route('creerA')}}"><button style="background-color:darkslategrey;color: white;border-color:darkslategrey;">Admin</button></a>
    <a href="{{route('creerK')}}"><button style="background-color:darkslategrey;color: white;border-color:darkslategrey;">Cook</button></a>

@endsection
