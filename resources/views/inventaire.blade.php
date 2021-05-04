@extends('layouts.app')

@section('content')
    <div class="container">
        <!--catégories-->
        <div class="row align-items-center ml-1 w-75">
            <div class=" col categorie d-flex justify-content-between align-items-center">
                <span>Catégorie</span>
                <img src="img/dropdown.svg" width="13" height="6.5"/>
            </div>
            <div class="col categorie d-flex justify-content-between align-items-center">
                <span>Sous catégorie</span>
                <img src="img/dropdown.svg" width="13" height="6.5"/>
            </div>
            <button class="col config-btn btn-dark">
                <img src="img/config.svg"/>
                <span class="pl-1">Gestion des catégorie</span>
            </button>
        </div>
        <!--menu-->
        <div class="row menu ml-1 pt-4 ">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F2F2F2">
                <div class="container-fluid p-0">
                    <div class="navbar-nav sm-menu">
                        <a class="nav-link px-md-5" href="#">Entre</a>
                        <a class="nav-link px-md-5 active" aria-current="page" href="#">Sortie</a>
                        <a class="nav-link px-md-5" href="#">Demandes</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <h5 class="font-weight-bold ml-5 pt-4">Liste des produit</h5>
    <div class="pr-container pt-1">
       <div class="pr-wrapper row pl-2">
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/produit-default.svg"/>
                   <div>Nom du produit</div>
               </a>
           </div>
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/produit-default.svg"/>
                   <div>Nom du produit</div>
               </a>
           </div>
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/produit-default.svg"/>
                   <div>Nom du produit</div>
               </a>
           </div>
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/produit-default.svg"/>
                   <div>Nom du produit</div>
               </a>
           </div>
       </div>
       <div class="pr-wrapper row pl-2">
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/produit-default.svg"/>
                   <div>Nom du produit</div>
               </a>
           </div>
           <div class="col products bg-danger">
               <a href="#" class="w-100">
                   <img src="img/vignette.svg"/>
                   <div style="color: white">Vignettes</div>
               </a>
           </div>
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/timbre.svg"/>
                   <div>Timbres</div>
               </a>
           </div>
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/produit-default.svg"/>
                   <div>Nom du produit</div>
               </a>
           </div>
       </div>
       <div class="pr-wrapper row pl-2">
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/produit-default.svg"/>
                   <div>Nom du produit</div>
               </a>
           </div>
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/produit-default.svg"/>
                   <div>Nom du produit</div>
               </a>
           </div>
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/produit-default.svg"/>
                   <div>Nom du produit</div>
               </a>
           </div>
           <div class="col products">
               <a href="#" class="w-100">
                   <img src="img/produit-default.svg"/>
                   <div>Nom du produit</div>
               </a>
           </div>
       </div>
    </div>
    <ul class="pagination d-flex justify-content-center pt-3">
        <li class="pl-3">
            <a href="#"><img src="img/previous.svg"/></a>
        </li>
        <li class="pl-3"><a style="color:#6c757d" href="#">1-10</a></li>
        <li class="pl-3">
            <a href="#"><img src="img/next.svg"/></a>
        </li>
    </ul>
@endsection

@section('styles')
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
@endsection
