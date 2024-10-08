@extends('layouts.app')
@section('content')
    <div class="container-xl">
        <button class="btn btn-default btn-lg" type="button" data-toggle="modal" data-target="#modalAdd"><img
                src="img/plus.svg"> Ajouter Nouveau
        </button>
    {{-- <button class="button button2"> <img src="img/edit.svg"> Editer</button> --}}


    <!-- Add Modal -->
        <div id="modalAdd" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 mx-auto w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-400">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-md text-sm p-1 ml-auto inline-flex items-center dark:hover:bg-gray-300 dark:hover:text-white" data-dismiss="modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <form action="{{ url('taches') }}" method="POST">
                            {{ csrf_field() }}

                            <label class="f-label" for="type">Type</label>
                            <br>
                            <select class="f-input" id="typetache" type="text" name="type"
                                    aria-label="Default select example" style="height: 28px;width: 159px;" required>
                                <option value="" disabled selected>Type de Tâche</option>
                                <option id="tachesimple" value="tache bureau">Tache Bureau</option>
                                <option id="rendezvous" value="rendez-vous">Rendez-Vous</option>
                                <option id="audiance" value="audiance">Audience</option>
                            </select>

                            <br><br>

                            <div id="tachesimple_input" style="display:none;">
                                <label class="f-label" for="dateecheance">Date & heure d’échéance</label>
                                <br>
                                <input class="f-input px-2" type="text" name="dateecheance"
                                       placeholder="Date d’échéance de la tâche" onfocus="(this.type='datetime-local')"
                                       style="height: 28px;width: 180;">
                            </div>
                            <div id="audiance_input" style="display:none;">
                                <label class="f-label" for="dateecheance">Date & Heure d’Audience</label>
                                <br>
                                <input class="f-input px-2" type="text" name="dateaudiance"
                                       placeholder="Date de la Prochaine Audience"
                                       onfocus="(this.type='datetime-local')" style="height: 28px;width: 180;">
                                <br><br>
                                <label class="f-label" for="file_number">Numero du Dossier Juridique</label>
                                <br>
                                <input class="f-input px-2" type="text" name="file_number"
                                       placeholder="Saisir le Numero du Dossier" style="height: 28px;width: 180;">
                                <br><br>
                                <label class="f-label" for="tribunal_number">Numero du Tribunal</label>
                                <br>
                                <input class="f-input px-2" type="text" name="tribunal_number"
                                       placeholder="Saisir le Numero du Tribunal" style="height: 28px;width: 180;">
                            </div>

                            <br>

                            <label class="f-label" for="titre">Titre de la Tâche</label>
                            <br>
                            <input class="f-input px-2" type="text" name="titre" placeholder="Tapez Votre Titre Ici ..."
                                   style="height: 43px;width: 550px;" required>
                            <br><br>
                            <label class="f-label" for="description">Description de la Tâche</label>
                            <br>
                            <textarea class="f-input px-2" type="text" name="description"
                                      placeholder="Tapez Votre Texte Ici ..." style="height: 135px;width: 550px;"
                                      required></textarea>

                            <button class="buttonu" type="button" id="formButton"><img class="tprof"
                                                                                       src="img/roundplus.svg"/>Assigner
                                Une Tâche
                            </button>

                            <br><br>

                            <label class="f-label" for="assigned_user_id" style="display:none;" id="labelUser">Assigner
                                Une Tâche</label>
                            <br>
                            <select class="f-input" style="display:none;" id="selectUser" type="text"
                                    name="assigned_user_id" aria-label="Default select example"
                                    style="height: 28px;width: 159px;">
                                <option value="" disabled selected>Choisir l'Utilisateur</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

                            <br><br>
                            <button class="buttone" class="btn btn-default btn-lg"> Enregister</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <div class="row menu ml-1 pt-4 ">
            <nav class="navbar navbar-expand-lg navbar-light" id="tnav">
                <div class="container-fluid p-0" id="tmenu">
                    <div class="navbar-nav sm-menu">
                        <a class="nav-link px-md-4 active" href="{{ url('/taches') }}">Mes Tâches de Bureau <span
                                style="color: #989898;">( {{ $data5 }} )</span></a>
                        <a class="nav-link px-md-4" href="{{ url('/taches/rendez-vous') }}">Mes Rendez-Vous <span
                                style="color: #989898;">( {{ $data6 }} )</span></a>
                        <a class="nav-link px-md-4" href="{{ url('/taches/audiances') }}">Mes Audiences <span
                                style="color: #989898;">( {{ $data7 }} )</span></a>
                    </div>
                </div>
            </nav>
        </div>
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
                        <div style="margin-top: 15px;">Ouvert <span style="color: #989898;">{{ $data1 }}</span>
                            <hr color="red">
                        </div>
                    </div>
                </div>
            </div>
            <!--taches ouvert-->
            @foreach($ouvert as $tache)
                <div class="shadow py-3 my-3 tasks">
                    <div style="margin-right:20px;">
                        <form action="{{ url('/taches', $tache->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button class="buttonu1" style="color: #ED741C;" type="submit" name="etat" value="en cours">
                                .
                            </button>
                            <button class="buttonu1" style="color: #3AE341;" type="submit" name="etat" value="finis">.
                            </button>
                            <button class="buttonu1" style="color: #989898;" type="submit" name="etat"
                                    value="en attente">.
                            </button>
                        </form>
                    </div>
                    <br>
                    <div>
                        <img class="tprof" src="img/profile.svg"/>
                        <p class="tdate">Debut de la Tache {{ $tache['created_at']->format('d/m/Y') }}
                            <br>
                            <span
                                style="color: #EC1E24;">Fin de Tache {{ $tache['dateecheance']->format('d/m/Y') }}</span>
                        </p>
                        <br>
                        <br>
                        <h5>{{ $tache['titre'] }}</h5>
                        <p class="desc">{{ $tache['description'] }}</p>
                        <br>
                        <button class="button0 button4" style="margin-left: 20px;"
                                onclick="window.location.href='{{ url('./taches-details', $tache->id) }}'">Ouvert
                        </button>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="mx-auto" style="width: 272px;height: 226px;">
            <div class="tl-container pt-1">
                <div class="tl-wrapper row pl-2">
                    <div class="col title">
                        <div style="margin-top: 15px;">En Cours <span style="color: #989898;">{{ $data2 }}</span>
                            <hr color="orange">
                        </div>
                    </div>
                </div>
            </div>
            <!--taches en cours-->
            @foreach($encours as $tache)
                <div class="shadow py-3 my-3 tasks">
                    <div style="margin-right:20px;">
                        <form action="{{ url('/taches', $tache->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button class="buttonu1" style="color: #3AE341;" type="submit" name="etat" value="finis">.
                            </button>
                            <button class="buttonu1" style="color: #989898;" type="submit" name="etat"
                                    value="en attente">.
                            </button>
                        </form>
                    </div>
                    <br>
                    <div>
                        <img class="tprof" src="img/profile.svg"/>
                        <p class="tdate">Debut de la Tâche {{ $tache['created_at']->format('d/m/Y') }}
                            <br>
                            <span
                                style="color: #ED741C;">Fin de Tâche {{ $tache['dateecheance']->format('d/m/Y') }}</span>
                        </p>
                        <br>
                        <br>
                        <h5>{{ $tache['titre'] }}</h5>
                        <p class="desc">{{ $tache['description'] }}</p>
                        <br>
                        <button class="button0 button5" style="margin-left:20px;"
                                onclick="window.location.href='{{ url('./taches-details', $tache->id) }}'">En Cours
                        </button>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="mx-auto" style="width: 272px;height: 226px;">
            <div class="tl-container pt-1">
                <div class="tl-wrapper row pl-2">
                    <div class="col title">
                        <div style="margin-top: 15px;">Finis <span style="color: #989898;">{{ $data3 }}</span>
                            <hr color="#3AE341">
                        </div>
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
                        <img class="tprof" src="img/profile.svg"/>
                        <p class="tdate">Debut de la Tâche {{ $tache['created_at']->format('d/m/Y') }}
                            <br>
                            <span
                                style="color: #3AE341;">Fin de Tâche {{ $tache['dateecheance']->format('d/m/Y') }}</span>
                        </p>
                        <br>
                        <br>
                        <h5>{{ $tache['titre'] }}</h5>
                        <p class="desc">{{ $tache['description'] }}</p>
                        <br>
                        <button class="button0 button6" style="margin-left:20px;"
                                onclick="window.location.href='{{ url('./taches-details', $tache->id) }}'">Finis
                        </button>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="mx-auto" style="width: 272px;height: 226px;">
            <div class="tl-container pt-1">
                <div class="tl-wrapper row pl-2">
                    <div class="col title">
                        <div style="margin-top: 15px;">En Attente <span style="color: #989898;">{{ $data4 }}</span>
                            <hr color="#989898">
                        </div>
                    </div>
                </div>
            </div>
            <!--taches en attente-->
            @foreach($attente as $tache)
                <div class="shadow py-3 my-3 tasks">
                    <div style="margin-right:20px;">
                        <form action="{{ url('/taches', $tache->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button class="buttonu1" style="color: #ED741C;" type="submit" name="etat" value="en cours">
                                .
                            </button>
                            <button class="buttonu1" style="color: #3AE341;" type="submit" name="etat" value="finis">.
                            </button>
                        </form>
                    </div>
                    <br>
                    <div>
                        <img class="tprof" src="img/profile.svg"/>
                        <p class="tdate">Debut de la Tâche {{ $tache['created_at']->format('d/m/Y') }}
                            <br>
                            <span
                                style="color: #989898;">Fin de Tâche {{ $tache['dateecheance']->format('d/m/Y') }}</span>
                        </p>
                        <br>
                        <br>
                        <h5>{{ $tache['titre'] }}</h5>
                        <p class="desc">{{ $tache['description'] }}</p>
                        <br>
                        <button class="button0 button7" style="margin-left:20px;"
                                onclick="window.location.href='{{ url('./taches-details', $tache->id) }}'">En Attente
                        </button>
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
        $(document).ready(function () {
            $("#formButton").click(function () {
                $("#selectUser").toggle();
                $("#labelUser").toggle();
                $("#formButton").toggle();
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $("#typetache").change(function () {
                if ($("#tachesimple").is(":selected")) {

                    $("#tachesimple_input").show();
                    $("#audiance_input").hide();
                } else if ($("#audiance").is(":selected")) {
                    $("#audiance_input").show();
                    $("#tachesimple_input").hide();
                } else if ($("#rendezvous").is(":selected")) {

                    $("#tachesimple_input").show();
                    $("#audiance_input").hide();
                }
            }).trigger('change');
        });
    </script>
@endsection
