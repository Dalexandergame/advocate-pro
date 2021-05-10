@extends('layouts.app')

@section('content')
<div class="cont">
    <div class="filter">
        <input type="text" class="form-control" placeholder="Selection filtre">
    </div>
    <div class="prof">
        <div class="pi">
            <img src="/img/Profile.png" height="100px" width="100px" />
        </div>
        <div class="if">
            <h3>Nom & Prènom</h3>
            <p>+212 600 137 224</p>
            <p>nom&prenom@advocatepro</p>
            <p>zone industrielle, sidi ghanem Numero 292, bureau 1 et 2 40000 marrakech</p>
            <h4 id="or"> 04 Ordres de missions</h3>
        </div>
    </div>
    <div class="info">
        <div class="nested">
            <div class="ord"><h3>Titre d'ordre de mission</h3></div>
            <div></div>
            <div class="div3">
                <h4>Description</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo natus illum tenetur nesciunt at voluptate adipisci praesentium mollitia asperiores deserunt!</p>
            </div>
            <div class="div4">
                <h4>Destination</h4>
                <p>zone industrielle, sidi ghanem Numero 292, bureau 1 et 2 40000 marrakech</p>
            </div>
            <div class="div5">
                <p>Déc 19 (date de debut de mission)</p>
                <p>jusqu'au 39 Déc (date de fin de mission)</p>
            </div>
            <div class="div6">
                <h4 id="cout">Cout de mission</h4>
                <p>vignette N 2345379 - 120.00 DHs</p>
                <p>vignette N 2345666 - 220.00 DHs</p>
                <H2 id="total">Total 320.00 Dhs</H2>
            </div>
            <div class="div7">
                <h4 id="etat">En cours de traitement</h4>
            </div>
        </div>
    </div>
    <div class="paim">
        <h3 id="mt">Méthode de paiement</h3>
        <p  id="pt">* chèque</p>
        <p  id="pt">* Virement banquaire</p>
        <p  id="pt">* Espèces</p>
    </div>
    <div class="comm">
        <div class="tit">
            <h4>Commentaire</h4>
        </div>
        <div class="lescom">
            <img src="/img/Profile.png" height="30px" width="30px" />
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum ut incidunt sequi molestias deleniti iusto perferendis neque animi dignissimos quas.</p>
            <div class="lescom2">
                <img src="/img/Profile.png" height="30px" width="30px" />
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, neque. Aut provident atque culpa, optio beatae dolorum laboriosam dolor ab quas sapiente eaque numquam accusantium iste eos, rem dolorem commodi.</p>
            </div>
            <img src="/img/Profile.png" height="30px" width="30px" />
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum ut incidunt sequi molestias deleniti iusto perferendis neque animi dignissimos quas.</p>
        </div>
    </div>
    <div class="ace">
            <button type="button" class="btn btn-success">Accepter</button>
    </div>
</div>
@endsection

@section('styles')
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
@endsection
