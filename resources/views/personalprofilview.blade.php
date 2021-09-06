@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pro"><H3>Profile</H3></div>

    
    <div class="profile">
    <form method="POST" action="{{ url('/profile/update', $user->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
            <div class="pic">
                <img src="/img/Profile.png" height="175px" width="175px" />
            </div>
            <br>
        <div class="form-group">
            <label for="usr">Nom complet</label>
            <input type="text" name="name" class="form-control"  value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="usr">Tel</label>
            <input type="text" name="phone" class="form-control"  value="{{ $user->phone }}">
        </div>
        <div class="form-group">
            <label for="usr">E-mail</label>
            <input type="text" name="email" class="form-control"  value="{{ $user->email }}">
        </div>
        <br><br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">modifier les informations</button>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
        @endif

        </form>  
    </div>
    

    <div class="sec"><H3>Sécurité</H3></div>
    <div class="securite">
    <form method="POST" action="{{ url('/profile/updatepass', $user->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <div class="form-group">
            <label for="usr">Identifiant</label>
            <input type="text" class="form-control" id="usr" value="{{ $user->email }}">
        </div>
        <div class="form-group">
             <label for="pwd">Mot de passe</label>
        <input type="password" class="form-control" id="pwd" placeholder="vote nouveau mot de passe">
        <button type="submit" class="btn btn-primary" id="mod">Modifier mot de passe</button>
        <br>
        @if ($message = Session::get('successe'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
        @endif
    </form>
    </div>

    </div>
    <div class="tac"><H3>Tâches</H3></div>
    <div class="taches">
    <div id="but" class="col-md-3">
            <button onclick="" type="button" class="btn btn-secondary">Vue</button>
            <button type="button" class="btn btn-primary">Imprimer</button>
    </div>
    </div>
    <div class="htac"><H3>historique des tâches</H3></div>
    <div class="historique"></div>
     <div class="form-group">
            <a class="btn btn-dark" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('déconnecter') }}
            </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
    </div>
</div>

@endsection

@section('styles')
    <link href="{{ asset('css/personalprofilview.css') }}" rel="stylesheet">
@endsection
