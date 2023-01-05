@extends('modele')

@section('title','Suppression des utilisateurs')

@section('contenu')
    <p>Voulez-vous supprimer l'utilisateur {{$user->login}}</p>
    <form action="{{route('suppressU',['id'=>$user->id])}}" method="post">
        @csrf
        <input type="submit" value="Supprimer">
    </form>
    <button style="padding-left: 15px;margin-top: 10px;"><a href="{{route('listeU')}}" type="submit" value="Annuler" style="color: black ;text-decoration: none;width: 70px">Annuler</a></button>
@endsection
