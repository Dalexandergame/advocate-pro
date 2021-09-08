<@extends('layouts.app')

@section('content')

<br>

<form style="margin-left: 34px" action="{{ url('/dossier-juridiques/search') }}" method="get">
	<div class="form-row align-items-center">
		<div class="col-2.7">
			<label class="sr-only" for="inlineFormInput">Numero du dossier</label>
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Numero du dossier" name="file_number">
		</div>
		<div class="col-2.7" style="margin-left: 18px">
			<label class="sr-only" for="inlineFormInput">Client</label>
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Client" name="for">
		</div>
		<div class="col-2.9" style="margin-left: 18px">
			<label class="sr-only" for="inlineFormInput">#recherche par tagwords</label>
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="#recherch par tagwords" name="tagwords">
		</div>

		<div class="customSelect" style="width:220px; height: 45px; margin-left: 30px; margin-right: -7px;" >
			<select>
				<option value="0">Type du dossier</option>
				<option value="type1">type 1</option>
				<option value="type2">type 2</option>
				<option value="type3">type 3</option>
				<option value="type4">type 4</option>
			</select>
		</div>

		<div class="col-auto"style="margin-top:-6px">
			<button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit" style="margin-top: 10px"><img class="icon-center" src="{{ url('img/search.svg') }}"></button>
		</div>
	</div>
</form>

<button  id="btnadd" {{-- class="button button5" --}} style="background: #000000;width: 252px;height: 40px;color: #FFFFFF;margin-left:30px;" class="btn btn-default btn-lg"><img src="{{ url('/img/plus.png ')}}" height="12px" width="12px"> Ajouter nouveau</button>

{{-- add dossier --}}

<div class="container" style="display: none;" id="divadd">
	<div class="big-grid" style="margin-right: -20px; height: 450px">
		<div class="row" style="margin-top: 20px">
			
			<form action="{{ url('dossier-juridiques')}}" method="post">

				{{ csrf_field()}}

				<div class="form-column col-md-8 type-move0">
					<div class="col">
						<input type="text" class="form-control" placeholder="numero dossier" name="file_number">
					</div><div style="margin-top: 5px"></div>
					<div class="col">
						<input type="date" class="form-control" placeholder="date creation" name="date_creation">
					</div><div style="margin-top: 5px"></div>
					<div class="col">
						<input type="text" class="form-control" placeholder="tagwords" name="tagwords">
					</div>
				</div>
				<div class="form-group col-md-7 type-move">
					<label for="inputState">Type</label>
					<select id="inputState" name="type_dossier" class="form-control">
						<option value="">Choose type</option>
						<option value="type1">type 1</option>
						<option value="type2">type 2</option>
					</select>
				</div>
				<div class="form-row type-move2">
					<div class="col">
						<label for="">Pour</label>
						{{-- <input type="text" class="form-control" placeholder="Nom du compte" name="for"> --}}
						<select name="for" class="form-control">
							<option disabled selected>Choisir un compte</option>
							@foreach($clientcomptes as $compte)
							<option value="{{ $compte->id }}"> {{ $compte->nom_entreprise }}</option>
							@endforeach
						</select>
					</div>
					<div class="col">
						<label for="">Contre</label>
						{{-- <input type="text" class="form-control" placeholder="Nom du compte" name="against"> --}}
						<select name="against" class="form-control">
							<option disabled selected>Choisir un compte</option>
							@foreach($clientcomptes as $compte)
							<option value="{{ $compte->id }}"> {{ $compte->nom_entreprise }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-row type-move3">
					<div class="col">
						<label for="">Client indirect</label>
						{{-- 						<input type="text" class="form-control" placeholder="Nom du compte" name="indirect_pour"> --}}
						`					<select name="indirect_pour" class="form-control">
							<option disabled selected>Choisir un compte</option>
							@foreach($clientcomptes as $compte)
							<option value="{{ $compte->id }}"> {{ $compte->nom_entreprise }}</option>
							@endforeach
						</select>
					</div>
					<div class="col">
						<label for="">Client indirect</label>
						{{-- <input type="text" class="form-control" placeholder="Nom du compte" name="indirect_contre"> --}}
						<select name="indirect_contre" class="form-control">
							<option disabled selected>Choisir un compte</option>
							@foreach($clientcomptes as $compte)
							<option value="{{ $compte->id }}"> {{ $compte->nom_entreprise }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group text-area-move">
					<label for="exampleFormControlTextarea1">Commentaire principal</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="commentaire"></textarea>
				</div>
				{{-- <div class="form-row type-move4">
					<div class="col">
						<input type="text" class="form-control" placeholder="numero tribunal" name="tribunal_number">
					</div>
				</div> --}}
				<input type="submit" name="enregistrer" value="enregistrer" class="buttonw">
			</form>

			{{-- <a class="button button3" href="" style="margin-left:250px;"><img src="{{ url('/img/trash.png') }}" height="13px" width="13px" style="margin-top: -5px;margin-right:5px">Enregistrer dans la brouillon</a> --}}
		</div>
	</div>
</div>
<br>

{{-- @foreach($dossierjuridiques as $dossierjuridique) --}}

<div class="container">
	<div class="big-grid">
		<div class="row" style="margin-top: 20px">
			<div class="col-2.5" id="red-writing">Dossier N {{ $dossierjuridique->file_number }}</div>
			<div class="col gray-bold1">Sous dossiers({{ $sousdossiers }})</div>
			<div class="col titre col3-marg">Type</div>
			<div class="col-3 titre">Pour</div>
			<div class="col-3 titre">Contre</div>
			<div class="w-100"></div>
			<div class="col-2.5 marg-c1 bold-description-kech">Marrakech le({{ $dossierjuridique->date_creation->format('d/m/Y') }})</div>
			<div class="col marg"></div>
			<div class="col marg-c2">{{ $dossierjuridique->type_dossier }}</div>
			<div class="col-3 marg-c3"><div class=" bold-description1">{{ $dossierjuridique->for->nom_contact_principal }}</div><br><div class=" bold-description1">Tel </div> {{ $dossierjuridique->for->tel_contact_principal }}<br><div class=" bold-description1">Mail </div> {{ $dossierjuridique->for->mail_contact_principal }}
			@if(isset($dossierjuridique->indirectfor))
			<br><br><div class=" bold-description1">{{ $dossierjuridique->indirectfor->nom_contact_principal }}</div><br><div class=" bold-description1">Tel </div> {{ $dossierjuridique->indirectfor->tel_contact_principal }}<br><div class=" bold-description1">Mail </div> {{ $dossierjuridique->indirectfor->mail_contact_principal }}
			@endif
		</div>
		<div class="col-3 marg-c4"> <div class=" bold-description2">{{ $dossierjuridique->against->nom_contact_principal }}</div> <br><div class=" bold-description2">Tel </div> {{ $dossierjuridique->against->tel_contact_principal }}<br><div class=" bold-description2">Mail </div> {{ $dossierjuridique->against->mail_contact_principal }}
		@if(isset($dossierjuridique->indirectagainst))
		<br><br><div class=" bold-description2">{{ $dossierjuridique->indirectagainst->nom_contact_principal }}</div> <br><div class=" bold-description2">Tel </div> {{ $dossierjuridique->indirectagainst->tel_contact_principal }}<br><div class=" bold-description2">Mail </div> {{ $dossierjuridique->indirectagainst->mail_contact_principal }}
		@endif
	</div>
</div>
<div class="row">
	<div class="edit-paragraph"><h5 class="gray-bold">Commentaire principal</h5><p style="font-size: 14px">{{ $dossierjuridique->commentaire }}</p> <div style="color: #696262; font-weight: bold;font-size: 13px">#{{ $dossierjuridique->tagwords }}</div></div>
</div>
<br>
</div>
</div>


<br>
<div style="margin-top: 10px;"></div>

<h4 style="color: red; font-weight: bold; margin-left: 45px; margin-bottom: -30px">Dossiers</h4>
<div class="float-container">
	<div class="float-child">
		<div class="big-grid2">
			<div class="row">
				<div class="col-2.5"> 
					<img src="{{ url('/img/profile.png')}}" height="38px" width="38px" style="margin-left: 40px;margin-top: 20px"/> <div class="marg-responsable-dossier"><div class="gray-bold">Responsable du dossier</div><br><div class="gray-normal">{{ $dossierjuridique->user->name }}</div></div>
					@if(isset($dossierjuridique->parent))
					<h3 id="red-writing" style="color:#827E7E">Dossier parent</h3>
					<a href="#" class="text-button-red" style="color: #827E7E;">{{ $dossierjuridique->parent }} v</a>
					<div class="line-vertical" style="height:10px;"></div>
					<div class="line-horizontal"></div>
					@endif
					<div style="margin-left:50px;">	<h3 id="red-writing">Dossier</h3>
						<a href="#" class="text-button-red">{{ $dossierjuridique->file_number }}<i class="arrow-down"></i></a>
						<div class="line-vertical"></div>
						<div class="line-horizontal"></div>
						<div class="plus-dossier"><a class="hover-plus-dossier" type="button" data-toggle="modal" data-target="#Modalsous"><div style="color: black">+</div><div class="colored-gray">Ajouter un sous-dossier</div></a></div>
						@foreach($allsousdossiers as $ssdossier)
						<div class="plus-dossier color-text"><a style="color:grey;" href="{{ url('dossier-juridiques/vue', $ssdossier->id) }}"> {{ $ssdossier->file_number }}<i class="arrow-right"></i></a></div>
						@endforeach
						<div style="margin-top: 17px"></div>
						<div class="plus-dossier"><a class="hover-plus-dossier" type="button" data-toggle="modal" data-target="#Modalsous"><div style="color: black">+</div><div class="colored-gray">Ajouter un sous-dossier</div></a>

					</div>

					<div class="modal fade" id="Modalsous" tabindex="-1" role="dialog" aria-labelledby="sousLabel" aria-hidden="true" data-backdrop="static">
						<div class="modal-dialog" role="document">   
							<div class="modal-content" style="width: 663px;height: 520px;">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"  style="font-size: 50px;">&times;</span>
									</button>

									<form action="{{ url('dossier-juridiques/sous') }}" method="POST">
										{{ csrf_field() }}

										<span class="numberd" style="margin-left:30px;">Dossier parent N° {{ $dossierjuridique->file_number }}</span>

										<input class="f-input numberd" type="hidden" name="parent" value="{{ $dossierjuridique->file_number }}">
										<input class="f-input numberd" type="hidden" name="tagwords" value="{{ $dossierjuridique->tagwords }}">
										<input class="f-input numberd" type="hidden" name="commentaire" value="{{ $dossierjuridique->commentaire }}">
										<input class="f-input numberd" type="hidden" name="for" value="{{ $dossierjuridique->for->id }}">
										<input class="f-input numberd" type="hidden" name="against" value="{{ $dossierjuridique->against->id }}">

										<div class="ddate">{{date('d/ m/ Y à H:i ')}}</div>
										<br>

										<label class="f-label" for="file_number">Numero sous dossier</label>
										<br>
										<input class="f-input" type="text" name="file_number" value="{{ $dossierjuridique->file_number }}" placeholder="Enter numero du sous dossier" style="height: 28px;width: 180;">
										<br><br>

										<label  class="f-label" for="type">Type</label>
										<br>
										<select class="f-input" type="text" name="type_dossier" aria-label="Default select example" style="height: 28px;width: 180px;" required>
											<option value="" selected disabled>Choisir sous type</option>
											<option value="type1">type 1</option>
											<option value="type2">type 2</option>
										</select>
										<br><br>


										<label class="f-label" for="date_creation">Date creation</label>
										<br>
										<input class="f-input" type="text" name="date_creation" placeholder="Enter la date creation" onfocus="(this.type='date')" style="height: 28px;width: 180;">

										<br><br>
										<div style="display:inline-block;">

											<label  class="f-label" for="indirect_pour">Client indirect pour</label>
											<br>
											<select class="f-input" type="text" name="indirect_pour" aria-label="Default select example" style="height: 28px;width: 259px;">
												<option value="" selected disabled>Choisir client pour</option>
												@foreach($clientcomptes as $compte)
												<option value="{{ $compte->id }}"> {{ $compte->nom_entreprise }}</option>
												@endforeach
											</select></div>

											<div style="display:inline-block">

												<label  class="f-label" for="indirect_contre">Client indirect contre</label>
												<br>
												<select class="f-input" type="text" name="indirect_contre" aria-label="Default select example" style="height: 28px;width: 259px;">
													<option value = "" selected disabled>Choisir client contre</option>
													@foreach($clientcomptes as $compte)
													<option value="{{ $compte->id }}"> {{ $compte->nom_entreprise }}</option>
													@endforeach
												</select></div>

												<br><br><br>
												<button class="buttone" class="btn btn-default btn-lg"> Enregister</button>
											</form> 

										</div>
									</div>
								</div>
							</div>

						</div>
						<div style="margin-bottom: 60px"></div>

					</div>
					<div class="col-2.5">

						<div class="customSelect" style="width:220px; height: 50px; margin-left: 30px; margin-right: -7px;">
							<select>
								<option value="0">Type du dossier</option>
								<option value="type1">type 1</option>
								<option value="type2">type 2</option>
								<option value="type3">type 3</option>
								<option value="type4">type 4</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="float-child">
			<div class="big-grid2">
				<div class="row">
					<div class="col-2.5">

						@if(isset($audiance))        	
						<img src="{{ url('/img/alarm.png')}}" height="20px" width="20px" style="margin-left: 40px;margin-top: 20px"/>
						<div class="marg-red-bold"><div class="red-bold">
							{{-- @foreach($audiance as $audiance) --}}
							<span> Date du prochaine audience {{ $audiance->dateaudiance->format('d/m/Y H:i') }} </span><br>
							{{-- @endforeach --}}
						</div><br></div>




						<img src="{{ url('/img/profile.png')}}" height="38px" width="38px" style="margin-left: 40px;margin-top: 20px"/> <div class="marg-responsable-dossier"><div class="gray-bold">Utilisateur en charge</div><br><div class="gray-normal">{{ $audiance->name }}</div></div><br>

						<a type="button" data-toggle="modal" data-target="#Modalview" class="gray-bold-audience marg-responsable-dossier2">Afficher plus de détails sur l'audience</a>

						<!-- view audiance details Modal -->
						<div class="modal fade" id="Modalview" tabindex="-1" role="dialog" aria-labelledby="viewLabel" aria-hidden="true" data-backdrop="static">
							<div class="modal-dialog" role="document">   
								<div class="modal-content" style="width: 870px;height: 1020px;">
									<div class="modal-body">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true"  style="font-size: 50px;">&times;</span>
										</button>

          {{-- <form action="{{ url('') }}" method="POST">
          	{{ csrf_field() }} --}}

          	<span class="numberd" style="margin-left:30px;">Dossier N° </span><input class="f-input numberd" type="text" name="file_number" value="{{ $audiance->file_number }}">
          	<div class="ddate">{{date('d/ m/ Y à H:i ')}}</div>

          	<div class="marg-red-bold" style="display:inline-block;"><div class="red-bold">
          		{{-- @foreach($audiance as $audiance) --}}
          		<img src="{{ url('/img/alarm.png')}}" height="20px" width="20px" style="margin-left: 280px;margin-top:5px"/> <span>Audience {{ $audiance->dateaudiance->format('d/m/Y') }} </span><br>
          		{{-- @endforeach --}}
          	</div><br></div>

          	<br><br>

          	<img src="{{ url('/img/profile.png')}}" height="38px" width="38px" style="margin-left: 40px;margin-top: 20px"/> <div class="marg-responsable-dossier"><div class="gray-bold">Utilisateur en charge</div><br><div class="gray-normal">{{ $audiance->name }}</div></div>

          	<h5 class="commentaires">N° de tribunal: {{ $audiance->tribunal_number }}</h5>

          	<div class="gray-bold" style="margin-left: 40px;margin-top: 20px">Description d’audience</div><br>

          	<p class="desc" style="font-size: 14px; line-height: 180.5%;margin-left:40px;">{{$audiance->description}}</p>
          	<br>

          	<div class="gray-bold" style="margin-left: 40px;margin-top: 20px">Récap d’audiences</div><br>

          	<button class="vue" class="btn btn-default btn-lg" id="recapbtn"><img src="{{url('img/vue.svg')}}"/> Vue</button>
          	<button class="imprime" class="btn btn-default btn-lg"  onclick="imprimer('recapdiv')"><img src="{{url('img/imprimer.svg')}}"/> Imprimer</button>

          	<div id="recapdiv" style="display:none;" >
          		{{-- <span class="head">Avocat en charge:<br>  {{ $audiance->name }}</span> --}}
          		<span class="head">Séance de délit de circulation devant le tribunal de première instance à Marrakech</span>
                    {{-- <span class="head">Nom du juge:<br>Date audiance: {{$audiance['dateaudiance']->format('d/m/Y')}}</span>
                  </div> --}}

                  <table border="1" cellspacing="0" cellpadding="4" class="tab" style="margin-left:5px;">
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
                  			<td class="tab-input">{{ $audiance['tribunal_number'] }}</td>
                  			<td rowspan="2" class="tab-input">{{ $audiance->for->nom_contact_principal }}<br><span style="font-weight: bold;">Contre</span><br>{{ $audiance->against->nom_contact_principal }}</td>
                        {{-- <form action="{{ url('./taches/audiances/recap', $audiance->id) }}" method="POST" style="display:inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }} --}}
                            <td rowspan="2" class="tab-input"><textarea name="mesures" placeholder="..." style="border: none; height:120px;width: 250px;"><?php echo htmlspecialchars($audiance->mesures); ?></textarea></td>
                            <td rowspan="2" class="tab-input"><textarea name="remarque" placeholder="..." style="border: none; height:120px;width: 250px;"><?php echo htmlspecialchars($audiance->remarque); ?></textarea></td>

                          </tr>
                          <tr>
                          	<td class="tab-input">{{ $audiance->dossier_num }}</td>
                          </tr>

                        </tbody>


                      </table></div>
               {{--  <br>
               
                <button class="button button2" type="submit" class="btn btn-default btn-lg" style="float:right; margin-right:20px;background-color:white;"> <img class="imgbtn" src="{{url ('/img/edit.svg') }}">Remplir</button></form>
                <button class="button button2" style="float:right; margin-right:20px;background-color:#C4C4C4;border:none;" class="btn btn-default btn-lg"><img src="{{url('img/imprimer.svg')}}"/> Imprimer</button> --}}

                


                     {{-- <img src="{{ url('/img/blockmodal.svg')}}"style="margin-left: 40px;margin-top: 20px"/>

                     <img src="{{ url('/img/blockmodal2.svg')}}"style="margin-left: 40px;margin-top: 20px"/> --}}
{{-- 
</form>  --}}

<h5 class="commentaires">Historique des audiences</h5>

@foreach($audiancehes as $audiancehes)

<div style="display:inline-block;">
	<img src="{{ url('/img/profile.png')}}" height="38px" width="38px" style="margin-left: 40px;margin-top: 20px"/> <div class="marg-responsable-dossier"><div class="gray-bold">{{ $audiancehes->name }} <span style="color:red;">____</span></div><br><div class="gray-normal">{{ $audiancehes->dateaudiance->format('d/m/Y') }}</div></div>
</div>

@endforeach

</div>
</div>
</div>
</div>


<h5 class="commentaires">Commentaires</h5>
<img src="{{ url('/img/profile.png')}}" height="30px" width="30px" style="margin-left: 40px;margin-top: 20px"/><div class="marg-responsable-dossier"><div class="gray-normal2"><span style="color:black;">{{ $audiance->name }}</span><br><br>{{ $audiance->comment }}</div>


<a type="button" data-toggle="modal" data-target="#Modalcomments" class="a-afficher"><div class="gray-bold-rep">

	<img src="{{ url('/img/attach.png')}}" height="11px" width="11px" style="margin-left: 50px;"/><div class="colored-gray-joint">{{ $audiance->file }}</div><br>Afficher les réponses </div><div class="gray-number">{{-- (14) --}}</div></div></a>
	<div class="plus-dossier"><a class="hover-plus-dossier" href="#"><div class="plus-black">{{-- + --}}</div><div class="colored-gray-comment">{{-- Ajouter un commentaire --}}</div></a></div><br>

	<!-- comments Modal -->
	<div class="modal fade" id="Modalcomments" tabindex="-1" role="dialog" aria-labelledby="addMissionLabel" aria-hidden="true" data-backdrop="static">
		<div class="modal-dialog" role="document">   
			<div class="modal-content" style="width: 663px;height: 1020px;">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"  style="font-size: 50px;">&times;</span>
					</button>

					{{-- <form action="{{ url('comment.add') }}" method="POST">
						{{ csrf_field() }} --}}

						<span class="numberd" style="margin-left:30px;">Dossier N° </span><input class="f-input numberd" type="text" name="file_number" value="{{ $dossierjuridique->file_number }}">
						<div class="ddate">{{date('d/ m/ Y à H:i ')}}</div>
						<br>

						@foreach($comments as $comment)
						<div class="display-comment">
							<div>
								<img class="tprof" src="{{ url('/img/profile.svg') }}"/> <span style="font-family: Gotham;font-style: normal;font-weight: bold;font-size: 14px;line-height: 15px;color: #989898;">{{ $comment->name }}</span> <span class="tdate">il y a {{$comment->created_at->diffForHumans()}}</span>

								<p style="font-family: Gotham;font-style: normal;font-weight: normal;font-size: 14px;line-height: 180.5%;color: #000000;margin-left: 20px;"> {{ $comment->comment }}
									<br>
									<a class="filej" href="{{ url('./comment/download', $comment->file) }}"><img src="{{ url('/img/pinfile.svg') }}"/> {{ $comment->file }}</a>
								</p>


							</div>
							<form method="post" action="{{ route('reply.add') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-inline" style="margin-left:50px;">
									<input type="hidden" name="tache_id" value="{{ $audiance->tache_id }}" />
									<input type="hidden" name="comment_id" value="{{ $audiance->comment_id }}" />
									<input type="text" class="comment" name="comment" placeholder="Ajouter une reponse" required/>
									<input type="file" name="file" id="file" class="inputfile" multiple onchange="javascript:updateList()"  />
									<label for="file" id="fileList">+ Ajouter piece jointe </label>

									<input type="submit" class="btnr btn-sm py-0" style="font-size: 0.8em;" value="Repondre" />
								</div>
							</form>


							{{-- <button type="button" id="formButton">Repondre</button> --}}
    {{-- <form id="form1" style="display: none;" method="post" action="{{ route('reply.add') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-inline">
            <input type="hidden" name="tache_id" value="{{ $comment->commentable_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            <input type="text" class="comment" name="comment" placeholder="Ajouter une reponse" required/>
            <input type="file" name="file" id="file" class="inputfile" multiple onchange="javascript:updateList()"  />
            <label for="file" id="fileList">+ Ajouter piece jointe </label>
        
            <input type="submit" class="btnr btn-sm py-0" style="font-size: 0.8em;" value="Repondre" />
        </div>
      </form> --}}  
    </div>
    {{-- <div style="margin-left:30px;"> @include('tache.replies', ['comments' => $comment->replies])</div> --}}
    @endforeach


  </div>
</div>
</div>
</div>



<form method="post" action="{{ route('reply.add') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="form-inline" style="margin-left:50px;">
		<input type="hidden" name="tache_id" value="{{ $audiance->tache_id }}" />
		<input type="hidden" name="comment_id" value="{{ $audiance->comment_id }}" />
		<input type="text" class="comment" name="comment" placeholder="Ajouter une reponse" required/>
		

		<input type="submit" class="btnr btn-sm py-0" style="font-size: 0.8em;" value="Repondre" />
	</div>
</form>


<div style="margin-bottom: 98px;"></div>
</div>
<br>
<br>
<div class="col-2.5">
	<div style="margin-top: -430px; margin-left: -10px"><div class="loader">Loading...</div><div class="gray-cours-traitement">En cours de traitement</div> </div>

	<a href="{{ url('/audiance-details', $audiance->tache_id) }}" class="a-afficher"><div class="gray-bold-details">Voir détails</div></a>

	@endif



	<div style="margin-left: 430px;margin-top: 45px"><a href="{{ url('./dossier-juridiques/alltaches', $dossierjuridique->file_number) }}" class="a-afficher"><div class="gray-bold-rep3">Tâches</div><div class="gray-number2">{{ $taches }}</div> <i class="arrow-right-tache"></i></a></div>



	<div style="margin-left: 335px;margin-top: 190px"><a href="" class="a-afficher"><img src="{{-- {{ url('/img/attach.png')}} --}}" height="11px" width="11px" style="margin-left: 50px;"/>  <div class="colored-gray-joint">{{-- {{ $audiance->file }} --}}</div></a></div>
</div>

<br><br>

<a class="marg-circle-button"type="button" data-toggle="modal" data-target="#Modaladd" style="margin-top: -100px"><div class="circle">+</div><div class="gray-bold-rep2">Assigner une tâche</div></a>


<div style="margin-top: -100px; margin-right:-185px;"><div class="frais-color">Frais</div><div class="frais-color-dh">200 Dhs</div></div>
<a href="#" class="ajouer-frais" style="margin-top: -50px"><div><div class="style-plus">+</div><div class="style-ajouter-frais">Ajouter frais</div></div></a>

<!-- Add Tache Modal -->
<div class="modal fade" id="Modaladd" tabindex="-1" role="dialog" aria-labelledby="addMissionLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog" role="document">   
		<div class="modal-content" style="width: 663px;height: 720px;">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"  style="font-size: 50px;">&times;</span>
				</button>

				<form action="{{ url('taches') }}" method="POST">
					{{ csrf_field() }}

					<span class="numberd" style="margin-left:30px;">Dossier N° </span><input class="f-input numberd" type="text" name="file_number" value="{{ $dossierjuridique->file_number }}">
					<div class="ddate">{{date('d/ m/ Y à H:i ')}}</div>
					<br>


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
						<br>
						<label class="f-label" for="tribunal_number">Numero du tribunal</label>
						<br>
						<input class="f-input" type="text" name="tribunal_number" placeholder="saisir le numero du tribunal" style="height: 28px;width: 180;">
						<br>
					</div>

					<br>

					<label class="f-label" for="titre">Titre de la tâche</label>
					<br>
					<input class="f-input" type="text" name="titre" placeholder="Tapez votre titre ici ..." style="height: 43px;width: 550px;"  required>
					<br><br>
					<label  class="f-label" for="description">Description de la tâche</label>
					<br>
					<textarea class="f-input" type="text"  name="description" placeholder="Tapez votre texte ici ..." style="height: 135px;width: 550px;" required></textarea>

					<button class="buttonu" type="button" id="formButton" style="margin-top:30px;"><img class="tprof" src="{{ url('img/roundplus.svg') }}"/>Assigner une tâche</button>

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


</div>
</div>
</div>
</div></div>

<div class="float-container">
	<div class="float-child" style="margin-left: 400px; width: 1160px">
		<div class="big-grid2" >
			<div class="row">
				<div class="col-2.5" id="red-writing-3">Historique du dossier</div>

				<div class="style-n-all"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div>
				<hr class="red-line2" style="width:1px;">

				
				@foreach($audiancehes2 as $audiancehes2)

				<hr class="red-line2" style="width:50px;">
				<div class="style-n-all2"><div class="style-n1">{{ $audiancehes2['file_number'] }}</div><div  class="style-n2">{{ $audiancehes2['tribunal_number'] }}</div><div class="style-n3">  {{ $audiancehes2['type_dossier'] }}</div><div class="style-n3">{{ $audiancehes2['dateaudiance']->format('d-m-Y') }}</div></div>
		
				@endforeach
       

				{{-- <div class="style-n-all2"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div>
				<hr class="red-line2">
				<div class="style-n-all2"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div> --}}
			</div>
		</div>
	</div>
</div>

<div class="float-container">
	<div class="float-child" style="margin-left: 400px; width: 1160px">
		<div class="big-grid2" >
			<div class="row">

				<div class="col-2.5" id="red-writing-dossier">Dossier N {{ $dossierjuridique->file_number }}</div>
				@if(isset($audiance->tribunal_number))
				<div class="col-2.5" id="red-writing-dossier2">Numéro du tribunal</div>
				<div class="w-100"></div>
				<div class="col-2.5 marg-c1-date bold-description1"style="margin-left:190px;"> {{ $audiance->tribunal_number }}</div>
				@endif
			</div>
			<div class="row">
				<form action="{{ url('dossier-juridiques/jugement',$dossierjuridique->id)}}" method="post">
				{{ csrf_field()}}
				{{ method_field('PUT') }}
				<div class="edit-paragraph2"><h5 class="gray-bold-2">Jugement 

          @if(isset($audiance))
					<div class="date-style">{{ $audiance->dateaudiance->format('d/m/Y') }}</div>
				  @endif
				  </h5><br><textarea name="jugement" placeholder="Entrer un jugement............" rows="6" style="font-size: 14px; color: gray;width:850px;border: none;"><?php echo htmlspecialchars($dossierjuridique->jugement); ?></textarea>

          <button class="jugement-btn" type="button" data-toggle="modal" data-target="#Modaljugement">+ Ajouter une demande de copie du jugement</button><br>
          <div class="modal fade" id="Modaljugement" tabindex="-1" role="dialog" aria-labelledby="sousLabel" aria-hidden="true" data-backdrop="static">
						<div class="modal-dialog" role="document">   
							<div class="modal-content" style="width: 663px;height: 520px;">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"  style="font-size: 50px;">&times;</span>
									</button>
          {{-- <form action="{{ url('dossier-juridiques/gouver',$dossierjuridique->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('PUT') }} --}}

										<span class="numberd" style="margin-left:30px;">Dossier N° {{ $dossierjuridique->file_number }}</span>
										<br>
										<img src="{{ url('/img/profile.png')}}" height="38px" width="38px" style="margin-left: 40px;margin-top: 20px"/> <div class="marg-responsable-dossier"><div class="gray-bold">Avocat en charge</div><br><div class="gray-normal">{{ $audiance->name }}</div></div>

          	<h5 class="commentaires">N° de tribunal: {{ $audiance->tribunal_number }}</h5>
          	<h5 class="commentaires">Type: {{ $audiance->type_dossier }}</h5>
          	<h5 class="commentaires">Date audiance: {{ $audiance->dateaudiance->format('d-m-Y') }}</h5>
          	<br>

											<label style="float: right;" class="f-label" for="exepmle_id">طلب نسخة من الحكم</label>
											<br><br>
											<select class="f-input" type="text" name="exepmle_id" aria-label="Default select example" style="height: 28px;width: 259px;float: right;" >
												<option value="" selected disabled>اختر نموذج</option>
												@foreach($gouvers as $gouver)
												<option value="{{ $gouver->id }}">نموذج {{ $gouver->id }}</option>
												@endforeach
											</select>

												<button class="buttone" class="btn btn-default btn-lg"> Enregister</button>
											{{-- </form> --}}
										</div>
									</div>
								</div>
							</div>
          <button class="jugement-view" type="button" data-toggle="modal" data-target="#Modalvoir">voir la copie du jugement </button>

          <div class="modal fade" id="Modalvoir" tabindex="-1" role="dialog" aria-labelledby="sousLabel" aria-hidden="true" data-backdrop="static">
						<div class="modal-dialog" role="document">   
							<div class="modal-content" style="width: 663px;height: 380px;">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"  style="font-size: 50px;">&times;</span>
									</button>

										<span class="numberd" style="margin-left:30px;">Dossier N° {{ $dossierjuridique->file_number }}</span>
										<br>
										<img src="{{ url('/img/profile.png')}}" height="38px" width="38px" style="margin-left: 40px;margin-top: 20px"/> <div class="marg-responsable-dossier"><div class="gray-bold">Avocat en charge</div><br><div class="gray-normal">{{ $audiance->name }}</div></div>

          	<h5 class="commentaires">N° de tribunal: {{ $audiance->tribunal_number }}</h5>
          	<h5 class="commentaires">Type: {{ $audiance->type_dossier }}</h5>
          	<h5 class="commentaires">Date audiance: {{ $audiance->dateaudiance->format('d-m-Y') }}</h5>
          	<br>

											<label style="float: right;" class="f-label" for="exepmle_id">طلب نسخة من الحكم</label>
											<br><br>
											<select class="f-input" type="text" name="exepmle_id" aria-label="Default select example" style="height: 28px;width: 259px;float: right;" >
												<option value="نموذج  {{ $dossierjuridique->exemple_id }}" selected disabled>نموذج  {{ $dossierjuridique->exemple_id }}</option>
											</select>

										</div>
									</div>


										<div class="modal-content" style="width: 663px;height: 980px;">
											<div class="modal-body">


											</div>
									</div>
								</div>
							</div>
				</div>
			
			</div>
			<div class="row">
				<div><img src="{{ url('/img/qr-code.png')}}" height="70px" width="70px" style="margin-left: 150px;margin-top: 20px"></div>
				<div class="buttons-position-3"> 
					<button class="buttonx2" class="btn btn-default btn-lg" onclick="window.location='{{ url('/dossier-juridiques') }}'"><img src="{{ url('/img/hide-eye.png')}}" height="16px" width="15px"  style="margin-right: 2px; margin-top: -2px"/> Masquer</button>

					<button style="margin-left: 10px" class="buttonw2" class="btn btn-default btn-lg"  type="button" data-toggle="modal" data-target="#Modalsous"><img src="{{ url('/img/folder.png')}}" height="14px" width="14px" style="margin-right: 2px; margin-top: -2px" /> Créer un sous dossier</button>
					<button class="buttonx-save"  type="submit" class="btn btn-default btn-lg"><img src="{{ url('/img/save.png ')}}" height="16px" width="15px"  style="margin-right: 2px; margin-top: -2px"/> Enregitrer</button></form>
				</div>
			</div>
			<br><br>
		</div>
	</div>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('/css/dossierjuridiquevue.css') }}">
<link rel="stylesheet" href="{{ asset('/css/createdossierjuridique.css') }}">
<link href="{{ asset('css/tachesdetails.css') }}" rel="stylesheet">
<link href="{{ asset('css/taches.css') }}" rel="stylesheet">
<link href="{{ asset('css/calendrier.css') }}" rel="stylesheet">
<style type="text/css">
.jugement-btn{
font-family: Greta Arabic;
font-style: normal;
font-weight: normal;
font-size: 12px;
line-height: 17px;
color: red;
opacity: 0.5;
border: none;
background-color:unset;
}
.jugement-view{
font-family: Greta Arabic;
font-style: normal;
font-weight: normal;
font-size: 12px;
line-height: 17px;
color: grey;
opacity: 0.5;
border: none;
background-color:unset;
margin-left: 9px;
}
.numberd{
	border: none transparent;
	outline: none;
	font-family: Gotham;
	font-style: normal;
	font-weight: bold;
	font-size: 20px;
	line-height: 22px;
	color: #EC1E24;
}
.ddate{
	font-family: Gotham;
	font-style: normal;
	font-weight: normal;
	font-size: 10px;
	line-height: 12px;
	color: #737171;
	margin-left:30px;
}
.imprime{
	margin-left: 40px;
}

.vue {
	margin-left: 40px;
}
</style>
<style type="text/css">
.comment{
	width: 260px;
}
input::placeholder{
	font-family: Gotham;
	font-style: normal;
	font-weight: normal;
	font-size: 12px;
	line-height: 14px;
	color: #737171;
	opacity: 0.3;
}
.btnr {
	font-family: Gotham;
	font-style: normal;
	font-weight: normal;
	font-size: 12px;
	line-height: 14px;
	color: white;
	margin-left: 10px;
	background-color: grey;
}
</style>
@endsection

@section('scripts')
<script src="{{ asset('/js/menuselector.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular.min.js"></script>
<script>
function imprimer(recapdiv) {
      var printContents = document.getElementById(recapdiv).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
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
<script type="text/javascript">
	$(document).ready(function() {
		$("#recapbtn").click(function() {
			$("#recapdiv").toggle();
			$("#recapbtn").toggle();
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#btnadd").click(function() {
			$("#divadd").toggle();

		});
	});
</script>
@endsection

