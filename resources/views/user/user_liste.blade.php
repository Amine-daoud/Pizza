@extends('modele')

@section('title','Liste des Utilisateurs')

@section('contenu')
    <style>
        h3{
            color: white;
        }
    </style>
    <a href="{{route('home')}}"><button style="background-color:white;color: dark;border-color:white;">Retour à l'accueil</button></a>
    <h3>Liste des utilisateurs</h3>
    <table border="1">
        <th>Id</th>
        <th>Nom</th>
        <th>Penom</th>
        <th>Login</th>
        <th>Type</th>
        @foreach($users as $user)
            <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->nom}}</td>
            <td>{{$user->prenom}}</td>
            <td>{{$user->login}}</td>
            <td>{{$user->type}}</td>
            <td><a href="{{route('supprimU',['id'=>$user->id])}}"><button>Supprimer</button></a></td>
            </tr>

        @endforeach
    </table>
@endsection
