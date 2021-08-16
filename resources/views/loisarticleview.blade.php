@extends('layouts.app')
@section('content')
<div class="container-xl">
               <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item me-3 me-lg-1">
                    <i class="nav-link" style="text-align:right;">
                     <a style="color: black;" href="{{url ('/lois-et-articles') }}"><-Retour</a>
                    </i>
                  </li>
                </ul>
</div>
<div class="view">
    <div class="ligne">
        <h4>Titre d'article:</h4>
        <h5>{{$data->nom}}</h5>
    </div>
    <div class="ligne">
        <h4>Type de lois: </h4>
        <h5>{{$data->type}}</h5>
    </div>
    <div class="ligne">
        <h4>Date d'ajout: </h4>
        <h5>{{$data->created_at->format('d-m-Y')}}</h5>
    </div>
    <div class="ligne" style="height:880px;">
        <h4>Contenu d'article:</h4>
        <iframe class="art" height="800"  width="90%" src="../../assets/{{$data->file}}"></iframe>
    </div>
    
</div>
@endsection
@section('styles')
    <link href="{{ asset('css/loisarticle.css') }}" rel="stylesheet">
@endsection
