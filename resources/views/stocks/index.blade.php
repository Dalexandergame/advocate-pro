@extends('layouts.app')

@section('content')
    <div class="container">

        <!--menu-->
        <div class="row menu ml-1 pt-4 ">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F2F2F2">
                <div class="container-fluid p-0">
                    <div class="navbar-nav sm-menu">
                        <a class="nav-link px-md-5" href="{{route('stocks.index')}}">Entre</a>
                        <a class="nav-link px-md-5 active" aria-current="page" href="{{route('demands.approved')}}">Sortie</a>
                        <a class="nav-link px-md-5" href="{{route('demands.store')}}">Demandes</a>
                    </div>
                </div>
            </nav>
        </div>


        <div class="row pt-5">
            <div class="col-1"></div>
            <div class="col"></div>
            <div class="col text-center font-weight-bold">Nom du Produit</div>
            <div class="col text-center font-weight-bold">Prix d’Achat Unitaire</div>
            <div class="col text-center font-weight-bold">Quantité</div>
            <div class="col-3 text-center font-weight-bold">Description</div>

        </div>
        @foreach ( $stocks as $stock )
        <div class="row products mt-2 py-4 align-content-center">
            <div class="col-1 pl-5 pt4">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"></label>
            </div>
            <div class="col">
                <img  class="w-100" src="/storage/{{ $stock->product->photo }}" />
            </div>
            <div class="col text-center">{{$stock->product->name}}</div>
            <div class="col text-center">{{$stock->product->price}}</div>
            <div class="col text-center">{{$stock->quantity}}</div>
            <div class="col-3 text-center">{{$stock->product->description}}.</div>
        </div>
        @endforeach
        <a href="/inventaire" class="btn-danger float-lg-right p-2 px-5 mt-4 mb-3">Liste des Produits</a>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
@endsection

