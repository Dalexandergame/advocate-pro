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
            <h5 class="font-weight-bold">{{$vignette->category->name}}</h5>
            <span>vignettes</span>
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
    <div class="row mt-4 mx-2">
        <div class="col-md">
            <img src="/storage/{{$vignette->photo}}" class="w-100 h-100" alt="">
        </div>
        <div class="col-md ml-4" style="background-color: #FAFAFA ; padding: 2.5rem">
            <span class="font-wright-bold mr-5">Vignettes</span><br>
            <span class="font-wright-bold mr-5">Alerte du stock</span><br>
            <span class="font-wright-bold mr-5">Date</span><br>
        </div>
        <div class="col-md mr-3" style="background-color: #FAFAFA ; padding: 2.5rem">
            <span class="">Reste en stock {{$vignette->stock->quantity ?? 0}} </span><br>
            <span class="text-danger"><img class="mr-1" src="{{ url('img/alarm.png') }}"/> {{$vignette->alert_en_stock}} </span><br>
            <span class="">{{Carbon\Carbon::now()->format('d.m.Y')}}</span>
            <button id="showInvoice" class="btn btn-link text-danger font-weight-bold {{isset($invoice->invoice_number) ? '': 'collapse'}}">Visualiser la facture</button>
        </div>
        <div id="panel" class="mt-4 offset-4" style="background-color: #FAFAFA; display:none">
            <span class="float-right p-2" id="hide"><img src="{{url('img/hide.svg')}}"/><br></span>
            <img src="/storage/{{$invoice->invoice_number ?? ''}}" class="ml-5 mt-2 {{isset($invoice->invoice_number) ? '' : 'collapse'}}"/><br>
            <button class="btn btn-secondary">Imprimer</button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md offset-7">
            <div>
                <a class="btn btn-secondary py-2 px-3 mr-3" href="{{ route('productstock.index') }}">Choisir autre produit</a>
                <a href="{{ route('vignettes.create') }}" class="btn btn-dark px-4">
                    <img class="mr-1" src="{{ url('img/stock.svg') }}"/>
                    <span>Gestion du stock</span>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#showInvoice").click(function(){
            $("#panel").slideDown("slow");
        });
        $("#hide").click(function(){
            $("#panel").slideUp("slow");
        });
    });
</script>
</body>
