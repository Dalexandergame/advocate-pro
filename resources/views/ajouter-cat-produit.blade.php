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
    <div class="row mt-5 mx-4">
        <div class="container offset-4 p-3" style="background-color: #FAFAFA">
            <form action="">
                <div class="row">
                    <div class="col font-weight-bold">Vignettes</div>
                    <div class="col pl-5">
                        <span class="pl-1">Reste en stock 784</span><br>
                        <div class="mt-1">
                            <a href="#" class="add-catg pl-1 py-1" style="">
                                <img class="pr-1" src="img/grey-plus.svg"/>
                                <span class="">Ajouter la facture</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col font-weight-bold">Numéro de série</div>
                    <div class="col">
                        <div class="d-flex align-items-baseline mb-2"><span class="pr-2">Du</span><input type="text" name="serial-number" class="form-control" placeholder="N° de série"></div>
                        <div class="d-flex align-items-baseline"><span class="pr-2">Au</span><input type="text" name="serial-number" class="form-control" placeholder="N° de série"></div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col font-weight-bold">Alerte du stock</div>
                    <div class="col">
                        <div class="d-flex">
                            <div><img class="mr-3" src="img/alarm.png"/></div>
                            <input type="text" name="quantity" class="stock-alert" placeholder="100">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col font-weight-bold">Date</div>
                    <div class="col">JJ.MM.AAAA</div>
                </div>
                <button class="col-md-5 offset-7 Enr-button" id="submit">Enregistrer</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md offset-md-8">
            <div class="mt-4 ml-2">
                <a href="#" class="bg-secondary p-2 px-4">
                    <img class="mr-1" src="img/edit.svg"/>
                    <span>Bon de commande</span>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
