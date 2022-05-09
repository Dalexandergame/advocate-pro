@extends('layouts.app')

@section('content')
<div class="cont">
    <div class="filter mx-4">
        <select class="pl-2 py-2" onchange="window.location.href=this.options[this.selectedIndex].value;">
            <option value="{{route('payments.index')}}">index</option>
            <option value="{{ route('paymission') }}">ordres de missions</option>
            <option value="{{ route('paydossier') }}">Paiements des dossiers</option>
            <option value="{{ route('refund') }}">Remboursements</option>
        </select>
    </div>

    <div class="prof">
        <div class="pi">
            <img src="/img/Profile.png" height="100px" width="100px" />
        </div>
        <div class="">
            <h3>{{ auth()->user()->name }}</h3>
            <p>{{ auth()->user()->phone }}</p>
            <p>{{ auth()->user()->email }}</p>
            <p>zone industrielle, sidi ghanem Numero 292, bureau 1 et 2 40000 marrakech</p>
            <h3 id="or">{{ $userMissions }} Ordres de missions</h3>
        </div>
    </div>
    @if(isset($userLastMission))
    <div class="info">
        <div class="nested">
            <div class="ord"><h3>{{$userLastMission->titre}}</h3></div>
            <div></div>
            <div class="div3">
                <h4>Description</h4>
                <p>{{$userLastMission->description}}</p>
            </div>
            <div class="div4">
                <h4>Destination</h4>
                <p>{{$userLastMission->destination}}</p>
            </div>
            <div class="div5">
                <p>{{$userLastMission->datecreation}} (date de debut de mission)</p>
                <p>{{$userLastMission->dateecheance}} (date de fin de mission)</p>
            </div>
            <div class="div6">
                <h4 id="cout">Cout de mission</h4>
                {{-- <p>vignette N 2345379 - 120.00 DHs</p> --}}
                {{-- <p>vignette N 2345666 - 220.00 DHs</p> --}}
                <H2 id="total">Total {{$userLastMission->cout}} Dhs</H2>
            </div>
            <div class="div7">
                <h4 id="etat">{{$userLastMission->paymentMission->status ?? 'En attente'}}</h4>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('styles')
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
@endsection
