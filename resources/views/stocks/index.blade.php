@extends('layouts.app')

@section('content')
    <div class="container">

        <!--menu-->
        <div class="row menu ml-1 pt-4 ">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F2F2F2">
                <div class="container-fluid p-0">
                    <div class="navbar-nav sm-menu">
                        <a class="nav-link px-md-5" href="{{route('stocks.index')}}">Entre</a>
                        <a class="nav-link px-md-5 active" aria-current="page" href="{{route('demands.store')}}">Sortie</a>
                        <a class="nav-link px-md-5" href="{{route('demands.index')}}">Demandes</a>
                    </div>
                </div>
            </nav>
        </div>


        <div class="row pt-5">
            <div class="col-1"></div>
            <div class="col"></div>
            <div class="col text-center font-weight-bold">Nom du produit</div>
            <div class="col text-center font-weight-bold">Prix d’achat unitaire</div>
            <div class="col text-center font-weight-bold">Quantité</div>
            <div class="col-3 text-center font-weight-bold">Méthode de paiement</div>

        </div>
        <div class="row products mt-2 py-5">
            <div class="col-1 pl-5 pt4">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"></label>
            </div>
            <div class="col"><img class="pl-4" src="img/produit-default.svg"/></div>
            <div class="col text-center">Nom de produit</div>
            <div class="col text-center">60 DH</div>
            <div class="col text-center">200</div>
            <div class="col-3 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, repudiandae.</div>
        </div>
        <button class="btn-danger float-lg-right p-2 px-5 mt-4">liste des produits</button>
    </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
@endsection

