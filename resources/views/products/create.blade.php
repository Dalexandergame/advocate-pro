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
            <h5 class="font-weight-bold">{{$category->name}}</h5>
            <span></span>
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
    <form action="{{ route('categories.products.store', $category->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row mt-4 mx-4">
            <div class="col-md-2">
                <h5 class="font-weight-bold px-3">Couverture</h5>
                <div class="image-upload" style="background-color: #FAFAFA">
                    <label for="file-input" style="cursor: pointer">
                    <img class="p-4" src="{{url('img\picto-couv.png')}}"/>
                    </label>
                    <input id="file-input" name="photo" type="file" style="opacity:0;position: absolute;z-index: -1;" />
                </div>
            </div>
            <div class="col-md-8 offset-md-2" style="background-color: #FAFAFA ; padding: 2.5rem">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif
                <div class="d-flex justify-content-between mb-3">
                    <span class="font-wright-bold mr-5">Nom de Produit</span>
                    <span> {{Carbon\Carbon::now()->format('d.m.Y')}} </span>
                </div>    
                <div class="d-flex justify-content-between mb-3">
                    <span class="font-wright-bold mr-5">Nom de Produit</span>
                    <input class="" type="text" name="name" class="" id="">
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="font-wright-bold mr-5">Prix d'achat unitaire</span>
                    <input class="" type="text" name="price" id="">
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="font-wright-bold mr-5">Alerte du stock</span>
                    <div class="d-flex">
                        <div><img class="mr-3" src="{{url('img/alarm.png')}}"/></div>
                        <input type="text" name="alert_en_stock" class="stock-alert" placeholder="100">
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="font-wright-bold mr-5">Description</span>
                    <textarea class="" name="description" id="" cols="20" rows="4"></textarea>
                </div> 
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md offset-8">
                <button class="Enr-button" type="submit">Enregister</button>
            </div>
        </div>
    </form>
</div>
</body>
