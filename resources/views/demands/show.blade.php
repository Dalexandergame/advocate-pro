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
                    <h5 class="col-3 font-weight-bold text-center">Quantité</h5>
                </div>
                    @foreach(\App\Models\DemandProduct::where('demand_id', '=', $demand->id)->get() as $demandedproduct)
                        <div class="row mb-2">
                            <span class="col">{{$products[$demandedproduct->product_id][0]->name}}</span>
                            <span class="col-3 text-center">{{$quantities[$demandedproduct->product_id]}}</span>
                        </div>
                    @endforeach
            </div>
        </div>
        <div class="row mt-5 mx-4">
            <div class="container">
                <div class="row mt-3">
                    <div class="col-4">
                        <h5 class="font-weight-bold">Date</h5>
                        <div>{{ Carbon\Carbon::now()->format('d.m.Y') }}</div>
                    </div>
                    <div class="col-4">
                        <h5 class="font-weight-bold">Détails de la demande</h5>
                        <textarea id="details" name="details" rows="4" cols="50" disabled>{{$demand->details}}</textarea>
                    </div>
                </div>
                <form action="{{ route('demands.handle', $demand->id) }}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-md-4 offset-8">
                            <button type="submit" name="handle" value="decline" class="btn-outline-dark py-1 px-4 mr-2">Refuser</button>
                            <button type="submit" name="handle" value="accept" class="btn-dark py-1 px-4">Accepter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
