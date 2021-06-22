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
            <div class="col text-center font-weight-bold">Liste des produits</div>
            <div class="col text-center font-weight-bold">Quantités</div>
            <div class="col text-center font-weight-bold">Personne</div>
            <div class="col-3 text-center font-weight-bold">État de la demande</div>

        </div>
        @foreach(\App\Models\Demand::all() as $demand )
            <a href="{{ route('demands.show' , $demand->id )}}" style="text-decoration: none; color: inherit">
                <div class="row bg-white products mt-2 py-5">
                <div class="col-1 pl-5 pt4">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
                <div class="col"><img class="pl-4" src="{{url('img/produit-default.svg')}}"/></div>
                <div class="col text-center">
                    @if( @isset($products) )
                        @foreach(\App\Models\DemandProduct::where('demand_id', '=', $demand->id)->get() as $item)
                            <span>{{$products[$item->demand_id][$item->product_id][0]->name}}</span> <br>
                        @endforeach
                    @endif
                </div>
                <div class="col text-center">
                    @if( isset($quantities) )
                        @foreach(\App\Models\DemandProduct::where('demand_id', '=', $demand->id)->get() as $item)
                            <span>{{$quantities[$item->demand_id][$item->product_id]}}</span> <br>
                        @endforeach
                    @endif
                </div>
                <div class="col text-center">Nom de personne</div>
                <div class="col-3 text-center font-weight-bold">{{$demand->state}}</div>
            </div>
            </a>
        @endforeach
        <a href="/inventaire" class="btn-danger float-lg-right p-2 px-5 mt-4 ml-3">liste des produits</a>
        <a href="{{route('demands.create')}}" class="btn-dark float-lg-right p-2 px-5 mt-4 mb-3">Nouvelle demande</a>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
@endsection
