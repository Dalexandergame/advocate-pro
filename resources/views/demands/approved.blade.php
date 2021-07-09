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
            <div class="col text-center font-weight-bold">Nom du produit</div>
            <div class="col text-center font-weight-bold">Quantité</div>
            <div class="col text-center font-weight-bold">Personne</div>
            <div class="col-3 text-center font-weight-bold">Raison</div>

        </div>
        @foreach ($aprouveddemands as $demand)
        <div class="row bg-white products mt-2 py-5">
            <div class="col-1 pl-5 pt4">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"></label>
            </div>
            <div class="col"><img class="pl-4" src="{{{url('img/produit-default.svg')}}}"/></div>
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
            <div class="col-3 text-center">{{ $demand->details }}</div>
        </div>
        @endforeach
        <button class="btn-danger float-lg-right p-2 px-5 mt-4">liste des produits</button>
    </div>

    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
@endsection

