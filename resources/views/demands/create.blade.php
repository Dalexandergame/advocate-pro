<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AdvocatePRO') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            padding-top: 5%;
            height: 50%;
            width: 75%;
            margin-left: 15%;
        }
    </style>

</head>
<body>
<div class="container bg-white p-4">
    <div class="row">
        <div class="col-4">
            <h5 class="font-weight-bold">Utilisateur</h5>
            <div>Nom d’étulisateur</div>
            <div>Tel<span>+212 600 137 224</span></div>
            <div>Mail<span>nom&prénom@gmail.com</span></div>
        </div>
        <div class="col-8">
            <div class="row">
                <h5 class="col font-weight-bold">Listes des produits</h5>
                <h5 class="col-3 font-weight-bold">Quantité</h5>
            </div>
            @foreach()
                <div class="row mb-3">
                    <span class="col">{{$products->name}}</span>
                    <span class="col-3">{{$quantity}}</span>
                </div>
            @endforeach
            <a href="{{ route('AddDemandProducts') }}" class="add-catg pl-1 py-1" style="">
                <img class="pr-1" src={{url('img/grey-plus.svg')}}>
                <span class="">Ajouter produit</span>
            </a>
        </div>
    </div>
    <div class="row mt-5 mx-4">
        <div class="container">
                <div class="row mt-3">
                    <div class="col-4">
                        <h5 class="font-weight-bold">Date</h5>
                        <div>JJ.MM.AAAA</div>
                    </div>
                    <div class="col-4">
                        <h5 class="font-weight-bold">Détails de la demande</h5>
                        <form action="">
                            <textarea id="details" name="details" rows="4" cols="50" placeholder="Raison de la demande ici ..."></textarea>
                        </form>
                    </div>
                </div>
                <button class="col-md-5 offset-7 Enr-button" id="submit">Enregistrer</button>
        </div>
    </div>
</div>
</body>
