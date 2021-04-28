@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pro"><H3>Profile</H3></div>
    <div class="profile">
            <div class="pic">
                <img src="/img/Profile.png" height="175px" width="175px" />
            </div> 
        <div class="form-group">
            <label for="usr">Nom</label>
            <input type="text" class="form-control" id="usr" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="usr">Prenom</label>
            <input type="text" class="form-control" id="usr" placeholder="Prenom">
        </div>
        <div class="form-group">
            <label for="usr">adresse</label>
            <input type="text" class="form-control" id="usr" placeholder=" Lorem Ipsum is simply dummy text.">
        </div>
        <div class="form-group">
            <label for="usr">Tel</label>
            <input type="text" class="form-control" id="usr" placeholder="+212 600 666 666">
        </div>
        <div class="form-group">
            <label for="usr">E-mail</label>
            <input type="text" class="form-control" id="usr" placeholder="nom&prenom@gmail.com">
        </div>
    </div>  
    <div class="sec"><H3>Sécurité</H3></div>
    <div class="securite">
        <div class="form-group">
            <label for="usr">Identifiant</label>
            <input type="text" class="form-control" id="usr" placeholder="nom&prenom@gmail.com">
        </div>
        <div class="form-group">
             <label for="pwd">Mot de passe</label>
        <input type="password" class="form-control" id="pwd" placeholder="RHZNK@@Lc">
        <button type="button" class="btn btn-outline-dark" id="mod">Modifier mot de passe</button>

</div>
    </div>
    <div class="tac"><H3>Tâches</H3></div>
    <div class="taches">
    <div id="but" class="col-md-3">
            <button onclick="" type="button" class="btn btn-secondary">Vue</button>
            <button type="button" class="btn btn-outline-secondary">Imprimer</button>
    </div>
    </div>
    <div class="htac"><H3>historique des tâches</H3></div>
    <div class="historique"></div>
</div> 
@endsection

@section('styles')

@endsection
@section('scripts')

@endsection
 