@extends('modele')

@section('title','Les utilisateurs cook')
       <style>
            h3{
                color: white;
            }
       </style>

@section('contenu')
    <h3>Liste des utilisateurs Cook</h3>
    <table border="1">
        <th>Nom</th>
        <th>Prenom</th>
        <th>Login</th>
        @foreach($users as $user)
            @if($user ->type!="admin" && $user ->type!="user")
            <tr>
                <td>{{$user->nom}}</td>
                <td>{{$user->prenom}}</td>
                <td>{{$user->login}}</td>
                <td><a href="{{route('modifMdpCook',['id'=>$user->id])}}"><button>Modifier le mot de passe</button></a></td>
            </tr>
                @endif
        @endforeach

    </table>

@endsection
