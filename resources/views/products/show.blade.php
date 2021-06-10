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
        <div class="col">
            <h5 class="font-weight-bold">{{$product->category->name}}</h5>
            <span>{{$product->name}}</span>
        </div>
        <div class="col">
            <h5 class="font-weight-bold">Responsable du stock</h5>
            <div>Nom d’étulisateur</div>
            <div>Tel<span>+212 600 137 224</span></div>
            <div>Mail<span>nom&prénom@gmail.com</span></div>
        </div>
        <div class="col">
            <h5 class="font-weight-bold">Contact du fournisseur</h5>
            <div>Nom & prénom</div>
            <div>Tel<span>+212 600 137 224</span></div>
            <div>Mail<span>nom&prénom@gmail.com</span></div>
        </div>
    </div>
    <div class="row mt-4 mx-4">
        <div class="col-md offset-md-4" style="background-color: #FAFAFA ; padding: 2.5rem">
            <span class="font-wright-bold mr-5">{{$product->name}}</span><br>
            <span class="font-wright-bold mr-5">Alerte du stock</span><br>
            <span class="font-wright-bold mr-5">Date</span><br>
        </div>
        <div class="col-md" style="background-color: #FAFAFA ; padding: 2.5rem">
            <span class="">Reste en stock 784</span><br>
            <span class="text-danger"><img class="mr-1" src="{{ url('img/alarm.png') }}"/>{{$product->alert_en_stock}}</span><br>
            <span class="">{{$product->updated_at->format('d.m.Y')}}</span>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md offset-8">
            <div>
                <a href="/ajouter-cat-produit" class="btn btn-dark px-4">
                    <img class="mr-1" src="{{ url('img/stock.svg') }}"/>
                    <span>Gestion du stock</span>
                </a>
            </div>
            <div class="mt-3">
                <a href="#" class="bg-secondary p-2 px-4">
                    <img class="mr-1" src="{{url('img/edit.svg') }}"/>
                    <span>Bon de commande</span>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
