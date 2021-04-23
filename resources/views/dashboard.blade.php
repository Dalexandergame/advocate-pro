<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AdvocatePRO') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<div class="sidebar">
    @include('layouts.sidebar')
</div>
<div class="navigation">
    @include('layouts.navbar')
    <main class="py-4">
        @yield('content')
    </main>
</div>
<div class="content" style="margin-left: 20%">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <h5 class="pb-3 font-weight-bold">Utilisateurs</h5>
                <div class="user-task bg-white">
                    <div class="d-flex justify-content-between px-2 pt-2 pb-4">
                        <div>Nombre de taches</div>
                        <div>Auôt 2020 (Date)</div>
                    </div>
                    <div class="p-2 border-secondary">Nom d'utilisateur 1</div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" style="width:70%"></div>
                        <span class="pt-3 pl-5">21 Taches</span>
                    </div>
                    <div class="p-2 border-secondary">Nom d'utilisateur 2</div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" style="width:70%"></div>
                        <span class="pt-3 pl-5">21 Taches</span>
                    </div>
                    <div class="p-2 border-secondary">Nom d'utilisateur 3</div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" style="width:70%"></div>
                        <span class="pt-3 pl-5">21 Taches</span>
                    </div>
                    <div class="p-2 border-secondary">Nom d'utilisateur 4</div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" style="width:70%"></div>
                        <span class="pt-3 pl-5">21 Taches</span>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <h5 class="pb-3 font-weight-bold">Dossiers Juridiques</h5>
                <div class="row bg-white">
                    <div class="circle"></div>
                    <div class="index">
                        <div class="d-flex align-items-center"> <div class="sm-circle bg-red"></div><span class="p-3">Dossier gagnier</span> </div>
                        <div class="d-flex align-items-center"> <div class="sm-circle bg-dark"></div><span class="p-3">Dossier perdu</span> </div>
                        <div class="d-flex align-items-center"> <div class="sm-circle bg-primary"></div><span class="p-3">Dossier fermer</span> </div>
                        <div class="d-flex align-items-center"> <div class="sm-circle bg-red"></div><span class="p-3">Dossier ouvert</span> </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col">
                <h5 class="pb-3 font-weight-bold">Taches en cours de fermeture</h5>
                <div class="tasks">
                    <div class="d-flex justify-content-between">
                        <div>18072954 (Numero du dossier)</div>
                        <div>
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5995 11.9091C12.9477 11.0993 12.5724 10.0919 12.5724 9.04505V7.03036C12.5724 4.64038 10.8935 2.62568 8.64178 2.13188V1.18379C8.64178 0.591234 8.16773 0.117188 7.57517 0.117188C6.98261 0.117188 6.50857 0.591234 6.50857 1.18379V2.13188C4.25685 2.62568 2.57794 4.62063 2.57794 7.03036V9.04505C2.57794 10.0919 2.2224 11.0993 1.55084 11.9091L0.662001 12.9954C0.0496911 13.746 0.582993 14.8916 1.55084 14.8916H13.5798C14.5476 14.8916 15.1007 13.7658 14.4686 12.9954L13.5995 11.9091Z" fill="#EC1E24"/>
                            </svg>
                        </div>
                    </div>
                    <div class="font-weight-bold">Nom du dossier où du client</div>
                    <div></div>
                </div>
            </div>
            <div class="col">
                <h5 class="pb-3 font-weight-bold">Historique des activités récentes</h5>
            </div>

        </div>
    </div>
</div>
</body>
