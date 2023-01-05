@extends('modele')

@section('title','Suppression des pizzas')

@section('contenu')
    <p>Voulez-vous supprimer la Pizza {{$pizza->nom}}</p>
    <form action="{{route('suppressionP',['id'=>$pizza->id])}}" method="post">
    @csrf
        <input type="submit" value="Supprimer">
    </form>
    <button style="padding-left: 15px;margin-top: 10px;"><a href="{{route('listeP')}}" type="submit" value="Annuler" style="color: black ;text-decoration: none;width: 70px">Annuler</a></button>
@endsection
