@extends('layouts.app')
@section('content')
<div class="container-xl">
    <button class="button button3" class="btn btn-default btn-lg" onclick=""> <img src="img/plus.svg"> Ajouter nouveau</button>
    <button class="button button2"> <img src="img/edit.svg"> Editer</button>
    <br> 
    <br>
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
<div class="tl-container pt-1">
       <div class="tl-wrapper row pl-2">
           <div class="col title">
                   <div style="margin-top: 15px;">Ouverte</div>
           </div>
           <div class="col title">
                   <div style="margin-top: 15px;">En cours</div>
           </div>
           <div class="col title">
                   <div style="margin-top: 15px;">Finis</div>
           </div>
           <div class="col title">
                   <div style="margin-top: 15px;">En attente</div>
           </div>
       </div>
</div>
<div class="task-container pt-1">
       <div class="task-wrapper row pl-2">
           <div class="col tasks">
              <div>
                <img class="tprof" src="img/profile.svg"/>
                <p class="tdate">Debut de la tache 20/02/2020
                    <br>
                <span style="color: #EC1E24;">Fin de tache 27/02/2020</span>
                </p>
                <br>
                <br>
                <h5>Titre de la tâche</h5>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <br>
                <button class="button0 button4" onclick="window.location.href='./taches-details'">ouverte</button>
              </div>
           </div>
           <div class="col tasks">
              <div>
                <img class="tprof" src="img/profile.svg"/>
                <p class="tdate">Debut de la tache 20/02/2020
                    <br>
                <span style="color: #ED741C;">Fin de tache 27/02/2020</span>
                </p>
                <br>
                <br>
                <h5>Titre de la tâche</h5>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <br>
                <button class="button0 button5">En cours</button>
              </div> 
           </div>
           <div class="col tasks">
               <div>
                <img class="tprof" src="img/profile.svg"/>
                <p class="tdate">Debut de la tache 20/02/2020
                    <br>
                <span style="color: #3AE341;">Fin de tache 27/02/2020</span>
                </p>
                <br>
                <br>
                <h5>Titre de la tâche</h5>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <br>
                <button class="button0 button6">Finis</button>
              </div>
           </div>
           <div class="col tasks">
               <div>
                <img class="tprof" src="img/profile.svg"/>
                <p class="tdate">Debut de la tache 20/02/2020
                    <br>
                <span style="color: #989898;">Fin de tache 27/02/2020</span>
                </p>
                <br>
                <br>
                <h5>Titre de la tâche</h5>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <br>
                <button class="button0 button7">En attente</button>
              </div>
           </div>
       </div>


       <div class="task-wrapper row pl-2">
           <div class="col tasks">
              <div>
                <img class="tprof" src="img/profile.svg"/>
                <p class="tdate">Debut de la tache 20/02/2020
                    <br>
                <span style="color: #EC1E24;">Fin de tache 27/02/2020</span>
                </p>
                <br>
                <br>
                <h5>Titre de la tâche</h5>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <br>
                <button class="button0 button4" onclick="window.location.href='./taches-details'">ouverte</button>
              </div>
           </div>
           <div class="col tasks">
              <div>
                <img class="tprof" src="img/profile.svg"/>
                <p class="tdate">Debut de la tache 20/02/2020
                    <br>
                <span style="color: #ED741C;">Fin de tache 27/02/2020</span>
                </p>
                <br>
                <br>
                <h5>Titre de la tâche</h5>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <br>
                <button class="button0 button5">En cours</button>
              </div> 
           </div>
           <div class="col align-self-end tasks">
               
           </div>
           <div class="col tasks">
               <div>
                <img class="tprof" src="img/profile.svg"/>
                <p class="tdate">Debut de la tache 20/02/2020
                    <br>
                <span style="color: #989898;">Fin de tache 27/02/2020</span>
                </p>
                <br>
                <br>
                <h5>Titre de la tâche</h5>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <br>
                <button class="button0 button7">En attente</button>
              </div>
           </div>
       </div>

       <div class="task-wrapper row pl-2">
           <div class="col tasks">
              <div>
                <img class="tprof" src="img/profile.svg"/>
                <p class="tdate">Debut de la tache 20/02/2020
                    <br>
                <span style="color: #EC1E24;">Fin de tache 27/02/2020</span>
                </p>
                <br>
                <br>
                <h5>Titre de la tâche</h5>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <br>
                <button class="button0 button4" onclick="window.location.href='./taches-details'">ouverte</button>
              </div>
           </div>
          <div class="col align-self-end">
               
           </div>
           <div class="col align-self-end">
               
           </div>
           <div class="col tasks">
               <div>
                <img class="tprof" src="img/profile.svg"/>
                <p class="tdate">Debut de la tache 20/02/2020
                    <br>
                <span style="color: #989898;">Fin de tache 27/02/2020</span>
                </p>
                <br>
                <br>
                <h5>Titre de la tâche</h5>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <br>
                <button class="button0 button7">En attente</button>
              </div>
           </div>
       </div>
</div>

@endsection  

@section('styles')
<link href="{{ asset('css/taches.css') }}" rel="stylesheet">
@endsection
