@extends('modele')

@section('title','Modification des pizzas')
<style>
    form{
        color: white;
    }
</style>

@section('contenu')
    <p>Voulez-vous modifier la pizza {{$pizza->nom}}</p>
    <form action="{{route('modification',['id'=>$pizza->id])}}" method="post">
        @csrf
        Nom:
        <input type="text" name="nom" value="{{$pizza->nom}}">
        Description:
        <input type="text" name="description" value="{{$pizza->description}}">
        Prix:
        <input type="decimal" name="prix" value="{{$pizza->prix}}">

        <input type="submit" name="Modifier" value="Modifier">

        <input type="submit" name="Annuler" value="Annuler">
    </form>
@endsection
