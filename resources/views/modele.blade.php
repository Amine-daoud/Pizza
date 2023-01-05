<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title','Pizza')</title>

    <style>

    .error{
    background: red;
    }
    .etat{
    background:lightsteelblue;
    }
    .vertical-menu {
        width: 200px;
    }

    .vertical-menu a {
        background-color: #eee;
        color: black;
        display: block;
        padding: 12px;
        text-decoration: none;
    }

    .vertical-menu a:hover {
        background-color: #ccc;
    }

    .vertical-menu a.active {
        background-color: #04AA6D;
        color: white;
    }
    table,
    th,
    td
    {

        background-color: darkgrey;
        padding: 8px;
        border: 0.5px solid black;
        border-collapse: collapse;
    }
    body{
        background-color:lightsteelblue;
        background-image: url("https://cdn.pixabay.com/photo/2020/03/21/02/26/pizza-4952509_1280.jpg");
    }
    p,h1{
        color: white;
    }
    h1{
        font-family: "Times New Roman";
        font-style: italic;
    }


    </style>

</head>
<body>
@section('contenu')
    @guest()
        <h1>Bienvenue sur La Pizzeria</h1>
        <div class="vertical-menu">
        <a href="{{route('login')}}">Connexion</a>
            <hr>
        <a href="{{route('register')}}">Inscription</a>
        </div>
    @endguest
    @auth
        <h1>Bienvenue sur La Pizzeria</h1>
        @if(Auth::user()->IsAdmin())
            <div class="vertical-menu">
                <p>Bonjour {{ Auth::user()->login}}</p>
                <a href="{{route('listeP')}}">Les Pizzas</a>
                <a href="{{route('ajouterP')}}">Créer une Pizza</a>
                <a href="{{route('listeU')}}">Les Utilisateurs</a>
                <a href="{{route('listeC')}}">Les Utilisateurs Cook</a>
                <a href="{{route('creerU')}}">Créer un Utilisateur</a>
                <hr>
                <a style="background-color: #4a5568;" href="{{route('modifMdp')}}">Changer mon mot de passe</a>
                <a style="background-color: #4a5568;" href="{{route('logout')}}">Deconnexion</a>
            </div>
        @elseif(Auth::user()->isUser())
            <div class="vertical-menu">
                <p>Bonjour {{ Auth::user()->login}}</p>
                <a href="{{route('listeP')}}">Nos Pizzas</a>
                <hr>
                <a style="background-color: #4a5568;" href="{{route('modifMdp')}}">Changer mon mot de passe</a>
                <a style="background-color: #4a5568;" href="{{route('logout')}}">Deconnexion</a>
            </div>
        @else(Auth::user()->isCook())
            <div class="vertical-menu">
                <p>Bonjour {{ Auth::user()->login}}</p>
                <a>Liste des commandes</a>
                <hr>
                <a style="background-color: #4a5568;" href="{{route('modifMdp')}}">Changer mon mot de passe</a>
                <a style="background-color: #4a5568;" href="{{route('logout')}}">Deconnexion</a>
            </div>
        @endif
    @endauth
@show
@if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('etat'))
    <p class="etat">{{session()->get('etat')}}</p>
@endif
</body>
</html>
