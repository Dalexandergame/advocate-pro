@extends('layouts.app')

@section('content')
    <div class="container">
        <!--catégories-->
        <div class="row align-items-center ml-1 w-75">
            <div class=" col categorie d-flex justify-content-between align-items-center">
                <span>Catégorie</span>
                <img src="img/dropdown.svg" width="13" height="6.5"/>
            </div>
            <div class="col categorie d-flex justify-content-between align-items-center">
                <span>Sous catégorie</span>
                <img src="img/dropdown.svg" width="13" height="6.5"/>
            </div>
            <button class="col config-btn btn-dark">
                <img src="img/config.svg"/>
                <span class="pl-1">Gestion des catégorie</span>
            </button>
        </div>
        <!--menu-->
        <div class="row menu ml-1 pt-4 ">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F2F2F2">
                <div class="container-fluid p-0">
                    <div class="navbar-nav sm-menu">
                        <a class="nav-link px-md-5" href="#">Entre</a>
                        <a class="nav-link px-md-5 active" aria-current="page" href="#">Sortie</a>
                        <a class="nav-link px-md-5" href="#">Demandes</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row pt-5">
            <div class="col-1"></div>
            <div class="col"></div>
            <div class="col text-center font-weight-bold">Nom du produit</div>
            <div class="col text-center font-weight-bold">Quantité</div>
            <div class="col text-center font-weight-bold">Personne</div>
            <div class="col-3 text-center font-weight-bold">État de la demande</div>

        </div>
        <div class="row bg-white products mt-2 py-5">
            <div class="col-1 pl-5 pt4">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"></label>
            </div>
            <div class="col"><img class="pl-4" src="img/produit-default.svg"/></div>
            <div class="col text-center">Nom de produit</div>
            <div class="col text-center">2</div>
            <div class="col text-center">Nom de personne</div>
            <div class="col-3 text-center font-weight-bold text-success">Aprouver</div>
        </div>

        <a href="#" class="btn-danger float-lg-right p-2 px-5 mt-4 ml-3">liste des produits</a>
        <a href="#" class="btn-dark float-lg-right p-2 px-5 mt-4">Nouvelle demande</a>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
@endsection
