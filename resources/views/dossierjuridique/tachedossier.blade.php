@extends('layouts.app')
@section('content')
<div class="container-xl">

<span class="numberd" style="margin-left:30px;">Dossier N° {{ $data->dossier_num }}</span>

                <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item me-3 me-lg-1">
                    <i class="nav-link" style="text-align:right;">
                     <a href="{{  url('./dossierjuridiques')}}"><img src="{{ url('/img/arrow.svg') }}">Retour</a>
                    </i>
                  </li>
                </ul>

    {{-- <button class="button button3" class="btn btn-default btn-lg" type="button" data-toggle="modal" data-target="#Modaladd"> <img src="img/plus.svg"> Ajouter nouveau</button> --}}
    {{-- <button class="button button2"> <img src="img/edit.svg"> Editer</button> --}}


    <!-- Add Modal -->
<div class="modal fade" id="Modaladd" tabindex="-1" role="dialog" aria-labelledby="addMissionLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">   
    <div class="modal-content" style="width: 663px;height: 720px;">
        <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true"  style="font-size: 50px;">&times;</span>
            </button>
        
          <form action="{{ url('taches') }}" method="POST">
            {{ csrf_field() }}

            <label  class="f-label" for="type">Type</label>
             <br>
            <select class="f-input" id="typetache" type="text" name="type" aria-label="Default select example" style="height: 28px;width: 159px;" required>
                      <option value="" disabled selected>Type de tâche</option>
                      <option id="tachesimple" value="tache bureau">tache bureau</option>
                      <option id="rendezvous" value="rendez-vous">rendez-vous</option>
                      <option id="audiance" value="audiance">audiance</option>
                      </select>

            <br><br>

            <div id="tachesimple_input" style="display:none;">
            <label class="f-label" for="dateecheance">Date & heur d’échéance</label>
            <br>
            <input class="f-input" type="text" name="dateecheance" placeholder="Date d’échéance de la tâche" onfocus="(this.type='datetime-local')" style="height: 28px;width: 180;">
            </div>
            <div id="audiance_input" style="display:none;">
            <label class="f-label" for="dateecheance">Date & heur d’audiance</label>
            <br>
            <input class="f-input" type="text" name="dateaudiance" placeholder="Date de la prochaine audiance" onfocus="(this.type='datetime-local')" style="height: 28px;width: 180;">
            <br><br>
            <label class="f-label" for="file_number">Numero du dossier juridique</label>
            <br>
            <input class="f-input" type="text" name="file_number" placeholder="saisir le numero du dossier" style="height: 28px;width: 180;">
            </div>

            <br>

            <label class="f-label" for="titre">Titre de la tâche</label>
            <br>
            <input class="f-input" type="text" name="titre" placeholder="Tapez votre titre ici ..." style="height: 43px;width: 550px;"  required>
            <br><br>
            <label  class="f-label" for="description">Description de la tâche</label>
            <br>
            <textarea class="f-input" type="text"  name="description" placeholder="Tapez votre texte ici ..." style="height: 135px;width: 550px;" required></textarea>

            <button class="buttonu" type="button" id="formButton"><img class="tprof" src="img/roundplus.svg"/>Assigner une tâche</button>

            <br><br>
            
            <label  class="f-label" for="assigned_user_id" style="display:none;" id="labelUser">Assigner une tâche</label>
            <br>
            <select class="f-input" style="display:none;" id="selectUser" type="text" name="assigned_user_id" aria-label="Default select example" style="height: 28px;width: 159px;">
                           <option value = "" disabled selected>Choisir l'utilisateur</option>
                      @foreach($users as $user)
                           <option value = "{{$user->id}}">{{$user->name}}</option>
                      @endforeach
            </select>

          <br><br><br>
          <button class="buttone" class="btn btn-default btn-lg"> Enregister</button>
          </form> 
        
        </div>
    </div>
  </div>
</div>

    {{-- <br> 
    <br>
    <div class="row menu ml-1 pt-4 ">
            <nav class="navbar navbar-expand-lg navbar-light" id="tnav">
                <div class="container-fluid p-0" id="tmenu">
                    <div class="navbar-nav sm-menu">
                        <a class="nav-link px-md-4 active" href="{{ url('/taches') }}">mes tâches de bureau <span style="color: #989898;">( {{ $data5 }} )</span></a>
                        <a class="nav-link px-md-4" href="{{ url('/taches/rendez-vous') }}">mes rendez-vous <span style="color: #989898;">( {{ $data6 }} )</span></a>
                        <a class="nav-link px-md-4" href="{{ url('/taches/audiances') }}">mes audiances <span style="color: #989898;">( {{ $data7 }} )</span></a>
                    </div>
                </div>
            </nav>
    </div> --}}
</div>
<br>
<br>
{{-- <div class="tl-container pt-1">
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
</div> --}}
<div class="d-flex justify-content-between">
                <div class="mx-auto" style="width: 272px;height: 226px;">
                    <div class="tl-container pt-1">
                    <div class="tl-wrapper row pl-2">
                    <div class="col title">
                    <div style="margin-top: 15px;">Ouverte <span style="color: #989898;">{{ $data1 }}</span><hr color="red"></div>
                    </div>
                    </div>
                    </div>
                    <!--taches ouvert-->
                    @foreach($ouvert as $tache)
                        <div class="shadow py-3 my-3 tasks">
                          <div style="margin-right:20px;">
                            <form action="{{ url('/taches', $tache->id) }}" method="POST">
                           {{ csrf_field() }}
                            <button class="buttonu1" style="color: #ED741C;" type="submit" name="etat" value="en cours">.</button>
                            <button class="buttonu1" style="color: #3AE341;" type="submit" name="etat" value="finis">.</button>
                            <button class="buttonu1" style="color: #989898;" type="submit" name="etat" value="en attente">.</button>
                             </form>
                           </div>  
                           <br>
                             <div>
                                <img class="tprof" src="{{ url('img/profile.svg') }}"/>
                                <p class="tdate">Debut de la tache {{ $tache['created_at']->format('d/m/Y') }}
                                    <br>
                                <span style="color: #EC1E24;">Fin de tache {{ $tache['dateecheance']->format('d/m/Y') }}</span>
                                </p>
                                <br>
                                <br>
                                <h5>{{ $tache['titre'] }}</h5>
                                <p class="desc">{{ $tache['description'] }}</p>
                                <br>
                                <button class="button0 button4" style="margin-left: 20px;" onclick="window.location.href='{{ url('./taches-details', $tache->id) }}'">ouverte</button>
                              </div>
                        </div>
                   @endforeach
                </div>
                

               
                <div class="mx-auto" style="width: 272px;height: 226px;">
                    <div class="tl-container pt-1">
                    <div class="tl-wrapper row pl-2">
                    <div class="col title">
                    <div style="margin-top: 15px;">En cours <span style="color: #989898;">{{ $data2 }}</span><hr color="orange"></div>
                    </div>
                    </div>
                    </div>   
                    <!--taches en cours-->
                     @foreach($encours as $tache)
                        <div class="shadow py-3 my-3 tasks">
                            <div style="margin-right:20px;">
                                <form action="{{ url('/taches', $tache->id) }}" method="POST">
                           {{ csrf_field() }}
                            <button class="buttonu1" style="color: #3AE341;" type="submit" name="etat" value="finis">.</button>
                            <button class="buttonu1" style="color: #989898;" type="submit" name="etat" value="en attente">.</button>
                               </form>
                           </div> 
                           <br>
                             <div>
                                <img class="tprof" src="{{ url('img/profile.svg') }}"/>
                                <p class="tdate">Debut de la tache {{ $tache['created_at']->format('d/m/Y') }}
                                    <br>
                                <span style="color: #ED741C;">Fin de tache {{ $tache['dateecheance']->format('d/m/Y') }}</span>
                                </p>
                                <br>
                                <br>
                                <h5>{{ $tache['titre'] }}</h5>
                                <p class="desc">{{ $tache['description'] }}</p>
                                <br>
                                <button class="button0 button5" style="margin-left:20px;" onclick="window.location.href='{{ url('./taches-details', $tache->id) }}'">En cours</button>
                             </div>
                        </div>
                        @endforeach
                </div>
                   

                 
                <div class="mx-auto" style="width: 272px;height: 226px;">
                    <div class="tl-container pt-1">
                    <div class="tl-wrapper row pl-2">
                    <div class="col title">
                    <div style="margin-top: 15px;">Finis <span style="color: #989898;">{{ $data3 }}</span><hr color="#3AE341"></div>
                    </div>
                    </div>
                    </div>
                    <!--taches finis-->
                    @foreach($finis as $tache)
                        <div class="shadow py-3 my-3 tasks">
                             <div style="margin-right:20px;">
                           </div> 
                           <br>
                             <div>
                                <img class="tprof" src="{{ url('img/profile.svg') }}"/>
                                <p class="tdate">Debut de la tache {{ $tache['created_at']->format('d/m/Y') }}
                                    <br>
                                <span style="color: #3AE341;">Fin de tache {{ $tache['dateecheance']->format('d/m/Y') }}</span>
                                </p>
                                <br>
                                <br>
                                <h5>{{ $tache['titre'] }}</h5>
                                <p class="desc">{{ $tache['description'] }}</p>
                                <br>
                                <button class="button0 button6" style="margin-left:20px;"onclick="window.location.href='{{ url('./taches-details', $tache->id) }}'">Finis</button>
                              </div>
                        </div>
                         @endforeach
                </div>
                  


                 
                <div class="mx-auto" style="width: 272px;height: 226px;">
                    <div class="tl-container pt-1">
                    <div class="tl-wrapper row pl-2">
                    <div class="col title">
                    <div style="margin-top: 15px;">En attente <span style="color: #989898;">{{ $data4 }}</span><hr color="#989898"></div>
                    </div>
                    </div>
                    </div>
                    <!--taches en attente-->
                    @foreach($attente as $tache)
                        <div class="shadow py-3 my-3 tasks">
                             <div style="margin-right:20px;">
                                <form action="{{ url('/taches', $tache->id) }}" method="POST">
                           {{ csrf_field() }}
                            <button class="buttonu1" style="color: #ED741C;" type="submit" name="etat" value="en cours">.</button>
                            <button class="buttonu1" style="color: #3AE341;" type="submit" name="etat" value="finis">.</button>
                                </form>
                           </div> 
                           <br>
                             <div>
                                <img class="tprof" src="{{ url('img/profile.svg') }}"/>
                                <p class="tdate">Debut de la tache {{ $tache['created_at']->format('d/m/Y') }}
                                    <br>
                                <span style="color: #989898;">Fin de tache {{ $tache['dateecheance']->format('d/m/Y') }}</span>
                                </p>
                                <br>
                                <br>
                                <h5>{{ $tache['titre'] }}</h5>
                                <p class="desc">{{ $tache['description'] }}</p>
                                <br>
                                <button class="button0 button7" style="margin-left:20px;" onclick="window.location.href='{{ url('./taches-details', $tache->id) }}'">En attente</button>
                              </div>
                        </div>
                         @endforeach
                </div>
                  
</div>


@endsection  

@section('styles')
<link href="{{ asset('css/taches.css') }}" rel="stylesheet">
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
  $("#formButton").click(function() {
    $("#selectUser").toggle();
    $("#labelUser").toggle();
    $("#formButton").toggle();
  });
});
</script>
<script type="text/javascript">
     $(function () {
  $("#typetache").change(function() {
     if ($("#tachesimple").is(":selected")) {

        $("#tachesimple_input").show();
        $("#audiance_input").hide();
    }
    else if ($("#audiance").is(":selected")) {
        $("#audiance_input").show();
        $("#tachesimple_input").hide();
    }
    else if ($("#rendezvous").is(":selected")) {

        $("#tachesimple_input").show();
        $("#audiance_input").hide();
    }
   }).trigger('change');
});
</script>
@endsection