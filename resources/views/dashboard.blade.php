@extends('layouts.app')

@section('content')
    <div class="grow">
        <div class="flex flex-row gap-x-7">
            <div class="basis-2/5">
                <h5 class="pb-3 font-bold">Utilisateurs</h5>
                <div class="bg-grey-50 shadow-lg p-5">
                    <div class="flex justify-between">
                        <div class="text-sm font-bold">Nombre de Taches</div>
                        <div class="text-sm font-light">Auôt 2020 (Date)</div>
                    </div>
                    <div class="pt-2">Nom d'utilisateur 1</div>
                    <div class="flex justify-between border border-solid border-gray-200 rounded-r-lg bg-gray-200">
                        <div class="bg-black h-6 w-3/5"></div>
                        <span class="pl-3 h-6 w-1/5">21 Taches</span>
                    </div>
                    <div class="pt-2">Nom d'utilisateur 1</div>
                    <div class="flex justify-between border border-solid border-gray-200 rounded-r-lg bg-gray-200">
                        <div class="bg-black h-6 w-3/5"></div>
                        <span class="pl-3 h-6 w-1/5">21 Taches</span>
                    </div>
                    <div class="pt-2">Nom d'utilisateur 1</div>
                    <div class="flex justify-between border border-solid border-gray-200 rounded-r-lg bg-gray-200">
                        <div class="bg-black h-6 w-3/5"></div>
                        <span class="pl-3 h-6 w-1/5">21 Taches</span>
                    </div>
                </div>
            </div>
            <div class="basis-3/5">
                <h5 class="pb-3 font-bold">Dossiers Juridiques</h5>
                <div class="bg-grey-50 shadow-lg p-5 flex justify-between">
                    <div class="w-52 h-52 rounded-full bg-gray-200"></div>
                    <div class="basis-2/5 justify-center">
                        <div class="flex items-center"> <div class="w-6 h-6 rounded-full bg-gray-200"></div><span class="p-2">Dossier Gagné</span> </div>
                        <div class="flex items-center"> <div class="w-6 h-6 rounded-full bg-black"></div><span class="p-2">Dossier Perdu</span> </div>
                        <div class="flex items-center"> <div class="w-6 h-6 rounded-full bg-red-800"></div><span class="p-2">Dossier Fermé</span> </div>
                        <div class="flex items-center"> <div class="w-6 h-6 rounded-full bg-gray-600"></div><span class="p-2">Dossier Ouvert</span> </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-row gap-x-5 pt-5">
            <div class="basis-1/2">
                <h5 class="pb-4 font-bold">Taches en cours de fermeture</h5>
                <div class="shadow-lg bg-white p-5 border-l-4 border-red-500">
                    <div class="flex justify-between">
                        <div>18072954 (Numero du dossier)</div>
                        <div class="flex">
                            <img class="mr-4" src="img/notific.svg">
                            <img class="mr-4" src="img/Prof.png" height="28px" width="28px"/>
                        </div>
                    </div>
                    <div class="font-bold">Nom du dossier où du client</div>
                    <div class="text-sm flex justify-between items-center pt-3">
                        <div class="flex items-center">
                            <x-calendar-icon></x-calendar-icon>
                            <span class="ml-3">Déc 19 (Date d’ouverture du dossier)</span>
                        </div>
                        <div class="flex items-center">
                            <img class="inline mr-3" src="img/alarm.png"/>
                            <span class="text-red-500">Reste 2 jours avant la fermeture</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="basis-1/2">
                <h5 class="pb-4 font-bold">Historique des activités récentes</h5>
                <div class="bg-white p-4">
                    <div class="grid grid-cols-7 gap-2">
                        <span class="col-span-3 pb-2 font-bold">Utilisateur</span>
                        <span class="col-span-2 pb-2 font-bold">Type d’activité</span>
                        <span class="col-span-2 pb-2 font-bold">Date et heure</span>
                    </div>
                    <div class="grid grid-cols-7 gap-2">
                        <div class="col-span-3">
                            <div class="flex items-center space-x-2">
                                <img src="img/Prof.png" height="22" width="22"/>
                                <span class="pl-2">Nom d’utilisateur</span>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <span>Type d’activité</span>
                        </div>
                        <div class="col-span-2">
                            <span>Il y a 5h</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="taches">
        <img class="w-auto py-5" src="img/taskspermonth.png"/>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection
