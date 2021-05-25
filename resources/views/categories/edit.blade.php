@extends('layouts.app')

@section('content')
    <div class="container">
        <!--catégories-->
        <div class="row align-items-center ml-1 w-75">
            <div class=" col d-flex justify-content-between align-items-center">
                <span>Catégorie</span>
                <img src="img/dropdown.svg" width="13" height="6.5"/>
            </div>
            <div class="col d-flex justify-content-between align-items-center">
                <span>Sous catégorie</span>
                <img src="img/dropdown.svg" width="13" height="6.5"/>
            </div>
            <a href="/gestion-des-categories" class="col config-btn btn-dark">
                <img class="px-2" src="img/config.svg"/>
                <span class="pl-1">Gestion des catégorie</span>
            </a>
        </div>
        <!--menu-->
        <div class="row menu ml-1 pt-4 ">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F2F2F2">
                <div class="container-fluid p-0">
                    <div class="navbar-nav sm-menu">
                        <a class="nav-link px-md-5" href="/inv-entre">Entre</a>
                        <a class="nav-link px-md-5 active" aria-current="page" href="/inv-sortie">Sortie</a>
                        <a class="nav-link px-md-5" href="/inv-demandes">Demandes</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="mx-3">
        <div class="d-flex justify-content-between align-items-baseline">
            <h5 class="font-weight-bold pt-4">Gestion des catégorie</h5>
            <a href="#">
                <img src="img/red-plus.svg"/>
                <span class="text-danger font-weight-bold pr-5">Ajouter catégorie</span>
            </a>
        </div>
        <div class="catg-container pb-5">
            <div class="pr-wrapper row">
                <div class="col p-2 pl-5 bg-danger">
                    <span class="text-white">Catégorie 1</span>
                    <img class="px-3" src="img/dropdown.svg">
                </div>
                <div class="col p-2 pl-5 bg-danger">
                    <span class="text-white">Catégorie 2</span>
                    <img class="px-3" src="img/dropdown.svg">
                </div>
                <div class="col p-2 pl-5 bg-danger">
                    <span class="text-white">Catégorie 3</span>
                    <img class="px-3" src="img/dropdown.svg">
                </div>
                <div class="col p-2 pl-5 bg-danger">
                    <span class="text-white">Catégorie 4</span>
                    <img class="px-3" src="img/dropdown.svg">
                </div>
            </div>
            <div class="pr-wrapper row pt-3">
                <div class="col shadow py-2 produit">
                    <a href="/cat-produit" class="d-flex text-decoration-none text-black-50">
                        <img class="mr-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                        <div>
                            <span class=" lead font-weight-bold">Nom de produit</span><br>
                            <span class="txt-small">Rest en stock 400</span>
                            <div>
                                <img src="img/alarm.png"/>
                                <span class="text-danger font-weight-bold txt-xx-small text">Alerte minimum du stock à 40</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col shadow py-2 produit">
                    <a href="/cat-produit" class="d-flex text-decoration-none text-black-50">
                        <img class="mr-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                        <div>
                            <span class=" lead font-weight-bold">Nom de produit</span><br>
                            <span class="txt-small">Rest en stock 400</span>
                            <div>
                                <img src="img/alarm.png"/>
                                <span class="text-danger font-weight-bold txt-xx-small text">Alerte minimum du stock à 40</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col shadow py-2 produit">
                    <a href="/cat-produit" class="d-flex text-decoration-none text-black-50">
                        <img class="mr-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                        <div>
                            <span class=" lead font-weight-bold">Nom de produit</span><br>
                            <span class="txt-small">Rest en stock 400</span>
                            <div>
                                <img src="img/alarm.png"/>
                                <span class="text-danger font-weight-bold txt-xx-small">Alerte minimum du stock à 40</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col shadow py-2 produit">
                    <a href="/cat-produit" class="d-flex text-decoration-none text-black-50">
                        <img class="mr-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                        <div>
                            <span class=" lead font-weight-bold">Nom de produit</span><br>
                            <span class="txt-small">Rest en stock 400</span>
                            <div>
                                <img src="img/alarm.png"/>
                                <span class="text-danger font-weight-bold txt-xx-small">Alerte minimum du stock à 40</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="pr-wrapper row pt-3">
                <div class="col shadow py-2 produit">
                    <a href="/cat-produit" class="d-flex text-decoration-none text-black-50">
                        <img class="mr-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                        <div>
                            <span class=" lead font-weight-bold">Nom de produit</span><br>
                            <span class="txt-small">Rest en stock 400</span>
                            <div>
                                <img src="img/alarm.png"/>
                                <span class="text-danger font-weight-bold txt-xx-small text">Alerte minimum du stock à 40</span>
                            </div>
                        </div>
                    </a>
                </div>
                <a href="" class="col add-catg shadow" style="">
                    <img class="pr-1" src="img/grey-plus.svg"/>
                    <span class="">Ajouter sous catgéorie</span>
                </a>
                <div class="col shadow py-2 produit">
                    <a href="/cat-produit" class="d-flex text-decoration-none text-black-50">
                        <img class="mr-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                        <div>
                            <span class=" lead font-weight-bold">Nom de produit</span><br>
                            <span class="txt-small">Rest en stock 400</span>
                            <div>
                                <img src="img/alarm.png"/>
                                <span class="text-danger font-weight-bold txt-xx-small">Alerte minimum du stock à 40</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col shadow py-2 produit">
                    <a href="/cat-produit" class="d-flex text-decoration-none text-black-50">
                        <img class="mr-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                        <div>
                            <span class=" lead font-weight-bold">Nom de produit</span><br>
                            <span class="txt-small">Rest en stock 400</span>
                            <div>
                                <img src="img/alarm.png"/>
                                <span class="text-danger font-weight-bold txt-xx-small">Alerte minimum du stock à 40</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="pr-wrapper row pt-3">
                <a href="" class="col add-catg shadow" style="">
                    <img class="pr-1" src="img/grey-plus.svg"/>
                    <span class="">Ajouter sous catgéorie</span>
                </a>
                <div class="col offset-md-3 shadow py-2 produit">
                    <a href="/cat-produit" class="d-flex text-decoration-none text-black-50">
                        <img class="mr-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                        <div>
                            <span class=" lead font-weight-bold">Nom de produit</span><br>
                            <span class="txt-small">Rest en stock 400</span>
                            <div>
                                <img src="img/alarm.png"/>
                                <span class="text-danger font-weight-bold txt-xx-small">Alerte minimum du stock à 40</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col shadow py-2 produit">
                    <a href="/cat-produit" class="d-flex text-decoration-none text-black-50">
                        <img class="mr-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                        <div>
                            <span class=" lead font-weight-bold">Nom de produit</span><br>
                            <span class="txt-small">Rest en stock 400</span>
                            <div>
                                <img src="img/alarm.png"/>
                                <span class="text-danger font-weight-bold txt-xx-small">Alerte minimum du stock à 40</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="pr-wrapper row pt-3">
                <a href="" class="col offset-md-6 add-catg shadow" style="">
                    <img class="pr-1" src="img/grey-plus.svg"/>
                    <span class="">Ajouter sous catgéorie</span>
                </a>
                <div class="col shadow py-2 produit">
                    <a href="/cat-produit" class="d-flex text-decoration-none text-black-50">
                        <img class="mr-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                        <div>
                            <span class=" lead font-weight-bold">Nom de produit</span><br>
                            <span class="txt-small">Rest en stock 400</span>
                            <div>
                                <img src="img/alarm.png"/>
                                <span class="text-danger font-weight-bold txt-xx-small">Alerte minimum du stock à 40</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="pr-wrapper row pt-3">
                <a href="" class="col offset-md-9 add-catg shadow" style="">
                    <img class="pr-1" src="img/grey-plus.svg"/>
                    <span class="">Ajouter sous catgéorie</span>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
@endsection
