@extends('layouts.app')

@section('content')
    <div class="container" style="{ margin: 0;padding-left: 2rem ;}">
        <div class="row">
            <div class="col-5">
                <h5 class="pb-3 font-weight-bold">Utilisateurs</h5>
                <div class="user-task bg-white">
                    <div class="d-flex justify-content-between px-4 pt-2 pb-4">
                        <div>Nombre de Taches</div>
                        <div>Auôt 2020 (Date)</div>
                    </div>
                    <div class="pt-2 pl-4 border-secondary">Nom d'utilisateur 1</div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" style="width:70%"></div>
                        <span class="pt-3 pl-5">21 Taches</span>
                    </div>
                    <div class="pt-2 pl-4 border-secondary">Nom d'utilisateur 2</div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" style="width:70%"></div>
                        <span class="pt-3 pl-5">21 Taches</span>
                    </div>
                    <div class="pt-2 pl-4 border-secondary">Nom d'utilisateur 3</div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" style="width:70%"></div>
                        <span class="pt-3 pl-5">21 Taches</span>
                    </div>
                    <div class="pt-2 pl-4 border-secondary">Nom d'utilisateur 4</div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" style="width:70%"></div>
                        <span class="pt-3 pl-5">21 Taches</span>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <h5 class="pb-3 font-weight-bold">Dossiers Juridiques</h5>
                <div class=" dossjur row bg-white">
                    <div class="circle"></div>
                    <div class="index">
                        <div class="d-flex align-items-center"> <div class="sm-circle bg-red"></div><span class="p-2">Dossier Gagné</span> </div>
                        <div class="d-flex align-items-center"> <div class="sm-circle bg-dark"></div><span class="p-2">Dossier Perdu</span> </div>
                        <div class="d-flex align-items-center"> <div class="sm-circle bg-primary"></div><span class="p-2">Dossier Fermé</span> </div>
                        <div class="d-flex align-items-center"> <div class="sm-circle bg-red"></div><span class="p-2">Dossier Ouvert</span> </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-5">
                <h5 class="pb-3 font-weight-bold">Taches en cours de fermeture</h5>
                <div class="folder bg-white p-3">
                    <div class="d-flex justify-content-between">
                        <div>18072954 (Numero du dossier)</div>
                        <div>
                            <img src="img/notific.svg" class="pr-2">
                            <img src="img/Prof.png" height="28px" width="28px"/>
                        </div>
                    </div>
                    <div class="font-weight-bold">Nom du dossier où du client</div>
                    <div class="info d-flex justify-content-between align-items-center pt-3">
                        <div>
                            <x-calendar-icon></x-calendar-icon>
                            <span>Déc 19 (Date d’ouverture du dossier)</span>
                        </div>
                        <div>
                            <img src="img/alarm.png"/>
                            <span>Reste 2 jours avant la fermeture</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <h5 class="pb-3 font-weight-bold">Historique des activités récentes</h5>
                <div class="tasks bg-white p-3">
                    <div class="row">
                        <div class="col-5">
                            <h6 class="pb-2 font-weight-bold">Utilisateur</h6>
                            <div>
                                <img src="img/Prof.png" height="22" width="22"/>
                                <span class="pl-2">Nom d’utilisateur</span><hr>
                            </div>
                            <div>
                                <img src="img/Prof.png" height="22" width="22"/>
                                <span class="pl-2">Nom d’utilisateur</span><hr>
                            </div>
                            <div>
                                <img src="img/Prof.png" height="22" width="22"/>
                                <span class="pl-2">Nom d’utilisateur</span><hr>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="pb-2 font-weight-bold">Type d’activité</h6>
                            <span>Type d’activité</span><hr>
                            <span>Type d’activité</span><hr>
                            <span>Type d’activité</span><hr>
                        </div>
                        <div class="col">
                            <h6 class="pb-2 font-weight-bold">Date et heure</h6>
                            <span>Il y a 5h</span><hr>
                            <span>Il y a 5 min</span><hr>
                            <span>Il y a 45 min</span><hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="taches">
        <img class="w-auto p-5" src="img/taskspermonth.png"/>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection
