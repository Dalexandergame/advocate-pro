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
    <link rel="stylesheet" href="{{ asset('/css/dossierjuridiquevue.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/createdossierjuridique.css') }}">
    <link href="{{ asset('css/tachesdetails.css') }}" rel="stylesheet">
    <link href="{{ asset('css/taches.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendrier.css') }}" rel="stylesheet">
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
        <div class="col-md">
            <img src="/storage/{{$FDvignette->screen}}" class="w-100 h-100" alt="">
        </div>
        <div class="col-md ml-4" style="background-color: #FAFAFA ; padding: 2.5rem">
            <span class="font-wright-bold mr-5">Vignette N° {{$FDvignette->serial_number}}</span>
            <div class="mt-3">{!! $FDvignette->description !!}</div>
            
        </div>
    </div>
</div>    
<div class="col-2.5" id="red-writing-3">Historique du Vignette</div>
<div class="row">
    <div class="float-child" style="width: 100%">
        <div class="big-grid2" >
            <div class="row">
                <hr class="red-line2" style="width:1px;">

                
                @foreach($fraisvignettes as $fraivignette)

                <div class="style-n-all2">
                    <div class="style-n1">Vignette N° {{ $fraivignette->serial_number }}</div>
                    <div class="style-n2 mx-1">Dossier {{ $fraivignette->dossierjuridique->file_number }}</div>
                    <div class="style-n3"> Marrakech le ({{ $fraivignette->created_at->format('d/m/Y') }})</div>
                </div>
                <hr class="red-line2" style="width:50px;">
        
                @endforeach
        

                {{-- <div class="style-n-all2"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div>
                <hr class="red-line2">
                <div class="style-n-all2"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div> --}}
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
