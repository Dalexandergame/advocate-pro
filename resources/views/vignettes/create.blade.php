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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('vignettes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col font-weight-bold">Vignettes</div>
                    <div class="col pl-5">
                        <span class="pl-1">Reste en stock<span class="ml-2 font-weight-bold">{{$vignette->stock->quantity ?? 0}}</span></span><br>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col font-weight-bold">Numéro de série</div>
                    <div class="col">
                        <div class="d-flex align-items-baseline mb-2"><span class="pr-2">Du</span><input id="first" type="number" name="serial_number1" class="serial_number form-control" placeholder="N° de série"></div>
                        <div class="d-flex align-items-baseline"><span class="pr-2">Au</span><input id="last" type="number" name="serial_number2" class="serial_number form-control" placeholder="N° de série"></div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col font-weight-bold">Quantité</div>
                    <div class="col">
                        <input id="quantity" type="number" name="quantity" class="stock-alert" value="" placeholder="À difinir automatiquement" readonly="readonly">
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="invoice-input" class="add-catg pl-1 py-1" style="margin-left: 53%">
                        <img class="pr-1" src="{{url('img/grey-plus.svg')}}"/>
                        <span class="">Ajouter la facture</span>
                    </label>
                    <input id="invoice-input" name="invoice" type="file" style="position: absolute;z-index: -1;" />
                </div>
                <div class="row mt-3">
                    <div class="col font-weight-bold">Date</div>
                    <div class="col">{{Carbon\Carbon::now()->format('d.m.Y')}}</div>
                </div>
                <div class="col-md-5 offset-5 d-inline">
                    <a class="btn btn-secondary py-2 px-5 mr-3" href="{{ route('vignettes.index') }}">Annuler</a>
                    <button class=" Enr-button" id="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.serial_number').on('change',function(){
            var first = $('#first').val();
            var last = $('#last').val();
            var qty = last-first;
            console.log(qty);

            $('#quantity').val(qty);
            
        })

     });
        

</script>
</body>
