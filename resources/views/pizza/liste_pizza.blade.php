@extends('modele')

<?php
$total=0;
$qte =0;
$cp = 0;
?>
@section('title','Liste des Pizzas')

@section('contenu')
    <style>
        h3{
            color: white;

        }
        button{
            background-color:white;
            color: dark;
            border-color: white;
        }

        .imgPizza{
            background: url("https://images5.alphacoders.com/369/369786.jpg");
            background-size: contain;
            background-repeat: no-repeat;
        }
    </style>
    @if(Auth::user()->IsAdmin())
        <a href="{{route('home')}}"><button style="background-color:white;color: dark;border-color:white;">Retour à l'accueil</button></a>
        <a href="{{route('ajouterP')}}"><button style="background-color:white;color: dark;border-color:white;">Créer une Pizza</button></a>
        <h3>Liste des Pizzas</h3>
    @else
        <a href="{{route('home')}}"><button style="background-color:white;color: dark;border-color:white;">Retour à l'accueil</button></a>
        <h3>Liste des Pizzas</h3>
    @endif
        <table>
        <tr>
            <td>Nom</td>
            <td>Description</td>
            <td>Prix</td>
            <td >Image </td>
        </tr>
        @foreach($pizza as $p)
            <tr>
                <td>{{$p['nom']}}</td>
                <td>{{$p['description']}}</td>
                <td>{{$p['prix']}}</td>
                <td class="imgPizza" ></td>
                @if(\Auth::user()->isAdmin())
                    <td><a href="{{route('supprimerP',[$p['id']])}}"><button>Supprimer</button></a></td>
                    <td><a href="{{route('modifierP',[$p['id']])}}"><button>Modifier</button></a></td>
                   {{--
                     - tentative d'ajout d'image via un televersement.
                     <td><form action="{{route('fupload')}}" method="post" enctype="multipart/form-data">
                         <input type="file" name="fichier" value="put">
                         <input type="submit" value="Téléverser">
                          @csrf
                      </form></td>--}}
                @endif
        </tr>
@endforeach
</table>
    <br>{{$pizza->links()}}<br>
@endsection
