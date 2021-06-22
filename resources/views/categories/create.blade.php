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
    <form action="{{ route('categories.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">
            <div class="col-4">
                <h5 class="font-weight-bold">utilisateur en charge</h5>
                <div>Nom & prénom</div>
                <div>Tel<span>+212 600 137 224</span></div>
                <div>Mail<span>nom&prénom@gmail.com</span></div>
            </div>
            <div class="col row">
                <div class="col-md" style="background-color: #FAFAFA ; padding: 2.5rem">
                    <div class="font-weight-bold mr-5 mb-3 ">Date</div>
                    <div class="font-weight-bold mr-5 mb-5">Nom de categorie</div>
                    <div class="font-weight-bold mr-5 mb-3">description</div>
                </div>
                <div class="col-md" style="background-color: #FAFAFA ; padding: 2.5rem">
                    <div class="mb-3 font-weight-bold">{{Carbon\Carbon::now()->format('d.m.Y')}}</div>
                    <input type="text" name="name" class="form-control mb-3" >
                    <textarea name="description" class="form-control mb-3" cols="20" rows="4"></textarea>
                </div>
            </div>
        </div>
        <div>
            <div class="col-md offset-9">
                <button type="submit" class="Enr-button">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
</body>
