@extends('layouts.app')
@section('content')
<div class="container-xl">
    <div class="row menu ml-1 pt-4 ">
            <nav class="navbar navbar-expand-lg navbar-light" id="tnav">
                <div class="container-fluid p-0" id="tmenu">
                    <div class="navbar-nav sm-menu">
                        <a class="nav-link px-md-4  active" aria-current="page" href="#">tous les taches</a>
                        <a class="nav-link px-md-4" href="#">mes taches</a>
                    </div>
                </div>
            </nav>
    </div>
</div>
<br>
<br>
<div class="container-xl">
  <div class="row">
    <div class="col-md-8">
    <button class="button0 button4" onclick="window.location.href='./taches'">ouverte</button>
                <p class="tdate">Debut de la tache 20/02/2020
                    <br>
                <span style="color: #EC1E24;">Fin de tache 27/02/2020</span>
                </p>
    </div>
    <div class="col-md-4">
                <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item me-3 me-lg-1">
                    <i class="nav-link" style="text-align:right;">
                     <a href="./taches"><img src="img/arrow.svg">Retour</a>
                    </i>
                  </li>
                </ul>
     </div>
  </div>

  <div class="col-md-6" style="margin-left: 115px;">
                <br>
                <h5>Titre de la tâche</h5>
                <br>

                <h6>Description</h6>

                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam consectetur adipiscing elit, sed do eiusmod tempor ipsum dolor sit amet.</p>
                
                <div class="block-vide"> </div>

                <h6>Utilisateur en charge</h6>
                <img class="tprof" src="img/profile.svg"/>

                <div class="block-vide"> </div>

                <h6>Commentaire</h6>

               <div>
                <img class="tprof" src="img/profile.svg"/>
                <p class="desc" > Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam consectetur adipiscing elit, sed do eiusmod tempor ipsum dolor sit amet.
                </p>
                </div>
                <br>

                <div>
                  <img class="tprof" src="img/profile.svg"/>
                <p class="desc" > Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="filej"><img src="img/pinfile.svg"/>2 Fichiers joints</div>
                </div>
                <br>

                <div>
                  <img class="tprof" src="img/profile.svg"/>
                <p class="desc" > Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam consectetur adipiscing elit, sed do eiusmod tempor ipsum dolor sit amet.
                </p>
                <div class="filej"><img src="img/pinfile.svg"/>3 Fichiers joints</div>
                </div>
                <br>

                <div class="block-vide"> </div>


                <button class="button button2"> <img class="imgbtn" src="img/edit.svg">Editer</button>
                <button class="button button1"> <img class="imgbtn" src="img/trash.svg">Supprimer</button>

                 <div class="block-vide"> </div>
  </div>
</div>

@endsection  

@section('styles')
<link href="{{ asset('css/tachesdetails.css') }}" rel="stylesheet">
@endsection