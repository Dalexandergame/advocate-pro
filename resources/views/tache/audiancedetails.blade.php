@extends('layouts.app')
@section('content')
<!-- menu -->
<div class="container-xl" style="height:1000px;">

  <div class="blockd">{{$data->dateaudiance->format('l d.m.Y')}}</div>
  <div class="blockd" style="background-color:#C4C4C4;height:35px;">{{ $data->etat }}</div>
  <div style="display: inline-block; margin-left: 70px;"><img class="profile-img" src="{{url('img/profile.svg')}}"/></div>
  <div class="pro-av">
          <span class="infos-av">{{ $data->getUsers['name'] }}</span><br>
          <span class="infos-av">Tel: <span style="color: #989898;">{{ $data->getUsers['phone'] }}</span></span><br>
          <span class="infos-av">Mail: <span style="color: #989898;">{{ $data->getUsers['email'] }}</span></span>
  </div>
  <a class="count clock" href="{{ url('/taches/audiances') }}"><img src="{{ url('img/redclock.svg') }}"> Liste des audiences</a>

  <div class="col-md-6" style="margin-left: 120px;margin-top:30px;">
                <br>
                <h5>Titre: {{$data->titre}} </h5>
                <br>

                <h6>Description</h6>

                <p class="desc">{{$data->description}}</p>
                
                <div class="block-vide"> </div>

                <h6>Utilisateur assigner : {{$data->assignedUsers['name'] }}</h6>
                <img class="tprof" src="{{ url('/img/profile.svg') }}"/>


                <div class="block-vide"> </div>

                <h6>Commentaire</h6>

               <div>

                                @include('tache.replies', ['comments' => $data->comments, 'tache_id' => $data->id])

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

  </div>

                <div class="block-vide"> </div>

  <div class="cadre-tab" style="height:500px;">
                    <div>
                    <span class="head">Avocat en charge:<br>  {{ $data->assignedUsers['name'] }}</span>
                    <span class="head head1">Séance de délit de circulation<br>devant le tribunal de première instance à Marrakech</span>
                    <span class="head">Nom du juge:<br>Date audiance: {{$data['dateaudiance']->format('d/m/Y')}}</span>
                   </div>

                  <table border="1" cellspacing="0" cellpadding="4" class="tab">
                    <thead>
                        <tr>
                          <th class="tab-title">Numero de tribunal</th>
                          <th class="tab-title" rowspan="2">les parties</th>
                          <th class="tab-title" rowspan="2">Les mesures</th>
                          <th class="tab-title" rowspan="2">Remarque</th>
                        </tr>
                        <tr>
                          <th class="tab-title">ref</th>
                        </tr>
                    </thead>
                    <tbody> 
                      <tr>
                        <td class="tab-input">{{ $data['tribunal_number'] }}</td>
                        <td rowspan="2" class="tab-input">{{ $data->getDossierjuridique->for->nom_entreprise }}<br>{{ $data->getDossierjuridique->for->nom_contact_principal }}<br><span style="font-weight: bold;">Contre</span><br>{{ $data->getDossierjuridique->against->nom_entreprise }}<br>{{ $data->getDossierjuridique->against->nom_contact_principal }}</td>
                        <form action="{{ url('./taches/audiances/recap', $data->id) }}" method="POST" style="display:inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                        <td rowspan="2" class="tab-input"><textarea name="mesures" placeholder="Tapez votre texte ici ..." style="border: none; height:120px;width: 250px;"><?php echo htmlspecialchars($data->mesures); ?></textarea></td>
                        <td rowspan="2" class="tab-input"><textarea name="remarque" placeholder="Tapez votre texte ici ..." style="border: none; height:120px;width: 250px;"><?php echo htmlspecialchars($data->remarque); ?></textarea></td>
                        
                      </tr>
                      <tr>
                        <td class="tab-input">{{ $data->dossier_num }}</td>
                      </tr>
                        
                   </tbody>
                 

                </table>
                <br>
               
                <button class="button button2" type="submit" class="btn btn-default btn-lg" style="float:right; margin-right:20px;background-color:white;"> <img class="imgbtn" src="{{url ('/img/edit.svg') }}">Remplir</button></form>
                <button class="button button2" style="float:right; margin-right:20px;background-color:#C4C4C4;border:none;" class="btn btn-default btn-lg"><img src="{{url('img/imprimer.svg')}}"/> Imprimer</button>

                </div>    

                <div class="block-vide"> </div> 

                <button class="button button2" class="btn btn-default btn-lg" onclick="window.location.href='{{ url('./taches-details/edit', $data->id) }}'"> <img class="imgbtn" src="{{url ('/img/edit.svg') }}">Editer</button>

                <form action="{{ url('./taches-details/delete', $data->id) }}" method="POST" style="display:inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                      <button class="button button1"> <img class="imgbtn" src="{{ url('/img/trash.svg') }}" >Supprimer</button>
                    </form>

                 <div class="block-vide"> </div>  
</div>   


@endsection

@section('styles')
    <link href="{{ asset('css/tachesdetails.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendrier.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    
@endsection