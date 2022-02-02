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
        <div class="col-md-4">
            <h5 class="font-weight-bold">Dossier N° {{$dossier->file_number}}</h5>
            <div>Marrakech le ({{ Carbon\Carbon::now()->format('d/m/Y') }})</div>
        </div>
        <div class="col-md-4">
            <h5 class="font-weight-bold">Utilisateur en charge</h5>
            <div>{{$dossier->user->name}}</div>
            <div>Tel<span>{{$dossier->user->phone}}</span></div>
            <div>Mail<span>{{$dossier->user->email}}</span></div>
        </div>
    </div>
    <div class="row mt-4 mx-2">
        <div class="col-md-8 offset-4" style="background-color: #FAFAFA ; padding: 2.5rem">
            <div class="row mb-3">
                <div class="col">
                    <h5 class="font-weight-bold">Nom du produit</h5>
                    <span>{{$fraisp->name}}</span>
                </div>
                <div class="col">
                    <h5 class="font-weight-bold">Cout</h5>
                    <span>{{$fraisp->cost}}</span>
                </div>
            </div>
            <div class="mb-3">
                <h5 class="font-weight-bold">Description du besoin</h5>
                <div>{{$fraisp->description}}</div>
            </div>
            <div>
                <img src="/storage/{{$fraisp->screen}}" alt="">
            </div>
        </div>
    </div>
</div>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#showInvoice").click(function(){
            $("#panel").slideDown("slow");
        });
        $("#hide").click(function(){
            $("#panel").slideUp("slow");
        });
    });
</script> --}}
</body>
