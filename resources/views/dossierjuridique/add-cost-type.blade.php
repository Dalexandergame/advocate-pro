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
                <h5 class="font-weight-bold">Dossier N° {{$dossier->file_number}}</h5>
                <div class="col">{{Carbon\Carbon::now()->format('d.m.Y')}}</div>
            </div>
            <div class="col-4">
                <h5 class="font-weight-bold">Utillisateur en charge</h5>
                <div>{{$user->name}}</div>
                <div>Tel : <span>{{$user->phone}}</span></div>
                <div>Mail : <span>{{$user->email}}</span></div>
            </div>
        </div>
        <div class="row mt-5 mx-4">
            <form class="offset-4 container" action="{{ route('dossierCost.choose', $dossier->id)}}" method="POST">
                @csrf
                <div class="p-4" style="background-color: #FAFAFA">
                    <input type="radio" name="product" value="vignette" id="">Vignettes</input><br><br>
                    <input type="radio" name="product" value="autre" id="">Autres</input>
                </div>
                <button class="col-md-5 offset-7 Enr-button" id="submit">Suivant</button>
            </form>
        </div>
    </div>
</body>
