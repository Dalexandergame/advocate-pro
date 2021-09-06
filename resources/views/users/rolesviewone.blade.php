@extends('layouts.app')

@section('content')
<ul>
    <li><a href="#">Priviléges</a></li>
    <li><a href="#">Rôles</a></li>
    <li><a href="{{ url('/users') }}">Utilisateurs</a></li>
</ul>

<div class="container">       
    <div class="card">
        <div class="card-header">
            <h3>Nom: {{$role['name']}}</h3>  
            <h4>Slug: {{$role['slug']}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Permissions</h5>
            <p class="card-text">
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-primary">retour</a>
        </div>
    </div>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/userview.css') }}">
@endsection

@section('scripts')
@endsection