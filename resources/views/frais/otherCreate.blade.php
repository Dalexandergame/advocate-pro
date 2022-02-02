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
            <form action="{{route('dossierCost.other.store', $dossier->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label class="font-weight-bold" for="name">Nom du produit</label><br>
                <input class="p-3" style="width: 32rem" type="text" id="pname" name="name" placeholder="Nom du produit..."><br><br>
    
                <label class="font-weight-bold" for="cost">Cout</label><br>
                <input class="p-2" style="width: 32rem" type="number" id="cost" name="cost" ><br><br>
                
                <label class="font-weight-bold" for="description">Description du besoin</label><br>
                <textarea name="description" id="desc" cols="65" rows="6" placeholder="Tapez votre description ici ..."></textarea><br>
    
                <label for="screen-input" class="add-catg pl-1 py-1">
                    <img class="pr-1" src="{{url('img/grey-plus.svg')}}"/>
                    <span class="">Ajouter une capture</span>
                </label>
                <input id="screen-input" name="screen" type="file" style="position: absolute;z-index: -1;"/>
    
                <button class="Enr-button" style="margin-left: 60%" type="submit">Enregistrer</button>
            </form>
        </div>
    </div>
    <div class="row mt-4">
        
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
