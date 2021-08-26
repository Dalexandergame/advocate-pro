@extends('layouts.app')
@section('content')
{{-- <div class="container-xl">
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
</div> --}}
<br>
<br>
<div class="container-xl">
  <div class="row">
    <div class="col-md-8">
    <button class="button0 button4">{{ $data->etat }}</button>
                <p class="tdate">Debut de la tache {{$data->created_at->format('d/m/Y')}} 
                    <br>
                <span style="color: #EC1E24;">Fin de tache {{$data->dateecheance->format('d/m/Y')}} </span>
                </p>
    </div>
    <div class="col-md-4">
                <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item me-3 me-lg-1">
                    <i class="nav-link" style="text-align:right;">
                     <a href="{{  url()->previous()}}"><img src="{{ url('/img/arrow.svg') }}">Retour</a>
                    </i>
                  </li>
                </ul>
     </div>
  </div>

  <div class="col-md-6" style="margin-left: 115px;">
                <br>
                <h5>{{$data->titre}} </h5>
                <br>

                <h6>Description</h6>

                <p class="desc">{{$data->description}}</p>
                
                <div class="block-vide"> </div>

                <h6>Utilisateur en charge : {{$data->getUsers['name'] }}</h6>
                <img class="tprof" src="{{ url('/img/profile.svg') }}"/>

                <div class="block-vide"> </div>

                <h6>Utilisateur assigner : {{$data->assignedUsers['name'] }}</h6>
                <img class="tprof" src="{{ url('/img/profile.svg') }}"/>

                <div class="block-vide"> </div>

                <h6>Commentaire</h6>

               <div>

                                @include('tache.replies', ['comments' => $data->comments, 'tache_id' => $data->id])

               {{--  <img class="tprof" src="../img/profile.svg"/>
                <p class="desc" > Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam consectetur adipiscing elit, sed do eiusmod tempor ipsum dolor sit amet.
                </p>
                </div>
                <br>

                <div>
                  <img class="tprof" src="../img/profile.svg"/>
                <p class="desc" > Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="filej"><img src="../img/pinfile.svg"/>2 Fichiers joints</div>
                </div>
                <br>

                <div>
                  <img class="tprof" src="../img/profile.svg"/>
                <p class="desc" > Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam consectetur adipiscing elit, sed do eiusmod tempor ipsum dolor sit amet.
                </p>
                <div class="filej"><img src="../img/pinfile.svg"/>3 Fichiers joints</div> --}}

                </div>
                 <div class="card-body">
                <h5>Ajouter un commentaire</h5>
                <form method="post" action="{{ route('comment.add') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" />
                        <input type="hidden" name="tache_id" value="{{ $data->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
                        <input type="file" name="file" id="file" class="inputfile" multiple onchange="javascript:updateList()"  />
                      <label for="file" id="fileList">+ Ajouter piece jointe</label>
                    </div>
                </form>
               </div>
                <br>

                <div class="block-vide"> </div>


                <button class="button button2" class="btn btn-default btn-lg" onclick="window.location.href='{{ url('./taches-details/edit', $data->id) }}'"> <img class="imgbtn" src="{{url ('/img/edit.svg') }}">Editer</button>

                <form action="{{ url('./taches-details/delete', $data->id) }}" method="POST" style="display:inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                      <button class="button button1"> <img class="imgbtn" src="{{ url('/img/trash.svg') }}" >Supprimer</button>
                    </form>

                 <div class="block-vide"> </div>
  </div>
</div>


@endsection  

@section('styles')
<link href="{{ asset('css/tachesdetails.css') }}" rel="stylesheet">
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
    updateList = function() {
  var input = document.getElementById('file');
  var output = document.getElementById('fileList');

  output.innerHTML = '<ul>';
  for (var i = 0; i < input.files.length; ++i) {
    output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
  }
  output.innerHTML += '</ul>';
}
</script>
@endsection