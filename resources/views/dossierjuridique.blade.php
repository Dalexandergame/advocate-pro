<@extends('layouts.app')

@section('content')

<br>

<div class="row menu ml-1 pt-4 ">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F2F2F2; margin-left:50px;">
        <div class="container-fluid p-0">
            <div class="navbar-nav sm-menu">
                <a class="nav-link px-md-5" href="{{url('dossier-juridiques/mine')}}">Mes dossiers ({{ $count1 }})</a>
                <a class="nav-link px-md-5 active"  href="{{url('dossier-juridiques')}}">Tous les dossiers ({{ $count2 }})</a>
            </div>
        </div>
    </nav>
</div>
<br>
<br>
{{-- search dossier--}}

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
			<label class="sr-only" for="inlineFormInput">#recherch par tagwords</label>
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

		<div class="col-auto" style="margin-top:-6px">
			<button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit" style="margin-top:-2px"><img class="icon-center" src="{{url ('img/search.svg') }}"></button>
		</div>
	</div>
</form>

<a class="button button5" id="btnadd" {{-- href="{{ url('/dossierjuridiques/create') }}" --}}><img src="{{ url('/img/plus.png') }}" height="12px" width="12px"> Ajouter nouveau</a>

<div style="margin-top: 40px;"></div>

{{-- add dossier --}}
<div class="container" style="display: none;" id="divadd">
	<div class="big-grid" style="margin-right: -20px; height: 450px">
		<div class="row" style="margin-top: 20px">
			
			<form action="{{ url('dossier-juridiques')}}" method="post">

				{{ csrf_field()}}

				<div class="form-column col-md-8 type-move0">
					<div class="col">
						<input type="text" class="form-control" placeholder="numero dossier" name="file_number" required="saisir un numero">
					</div><div style="margin-top: 5px"></div>
					<div class="col">
						<input type="date" class="form-control" placeholder="date creation" name="date_creation" required="selectionner une date">
					</div><div style="margin-top: 5px"></div>
					<div class="col">
						<input type="text" class="form-control" placeholder="tagwords" name="tagwords">
					</div>
				</div>
				<div class="form-group col-md-7 type-move">
					<label for="inputState">Type</label>
					<select id="inputState" name="type_dossier" class="form-control" required="choisir un type">
						<option value="">Choose type</option>
						<option value="type1">type 1</option>
						<option value="type2">type 2</option>
					</select>
				</div>
				<div class="form-row type-move2">
					<div class="col">
						<label for="">Pour</label>
						{{-- <input type="text" class="form-control" placeholder="Nom du compte" name="for"> --}}
						<select name="for" class="form-control" required="choisir client pour">
						<option disabled selected>Choisir un compte</option>
						@foreach($clientcomptes as $compte)
						<option value="{{ $compte->id }}"> {{ $compte->nom_entreprise }}</option>
						@endforeach
					</select>
					</div>
					<div class="col">
						<label for="">Contre</label>
						{{-- <input type="text" class="form-control" placeholder="Nom du compte" name="against"> --}}
						<select name="against" class="form-control" required="choisir client contre">
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
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="commentaire" required="saisir un Commentaire"></textarea>
				</div>
				<div class="form-row type-move4">
					<div class="col">
						<input type="text" class="form-control" placeholder="Mode paiment" name="modepay" required>
					</div>
				</div>
				<br><br>
				<input type="submit" name="enregistrer" value="enregistrer" class="buttonw">
			</form>

			{{-- <a class="button button3" href=""><img src="{{ url('/img/trash.png') }}" height="13px" width="13px" style="margin-top: -1px;margin-right: 5px">Enregistrer dans la brouillon</a> --}}
		</div>
	</div>
</div>

{{-- tous les dossiers--}}
@foreach($dossierjuridiques as $dossier)
 <div class="container">
	<div class="big-grid" style="margin-right: -20px">
		<div class="row" style="margin-top: 20px">
			<div class="col-2.5" id="red-writing">Dossier N {{ $dossier->file_number }}</div>
			<div class="col gray-bold1">{{-- Sous dossiers() --}}</div>
			<div class="col titre col3-marg">Type</div>
			<div class="col-3 titre">Pour</div>
			<div class="col-3 titre">Contre</div>
			<div class="w-100"></div>
			<div class="col-2.5 marg-c1 bold-description1">Marrakech le ({{ $dossier->date_creation->format('d/m/Y') }})</div>
			<div class="w-100"></div>
			<div class="col titre col3-marg">Mode de paiment<br><span class="gray-bold">{{ $dossier->payment_mode }}</span></div>
			<div class="col marg"></div>
			<div class="col marg-c2">{{ $dossier->type_dossier }}</div>
			<div class="col-3 marg-c3"><div class=" bold-description1">{{ $dossier->for->nom_entreprise }}<br>{{ $dossier->for->nom_contact_principal }}</div><br><div class=" bold-description1">Tel </div> {{ $dossier->for->tel_contact_principal }}<br><div class=" bold-description1">Mail </div> {{ $dossier->for->mail_contact_principal }}<br><br>
			@if(isset($dossier->indirectfor))
			     <div class=" bold-description1">{{ $dossier->indirectfor->nom_entreprise }}<br>{{ $dossier->indirectfor->nom_contact_principal }}</div><br><div class=" bold-description1">Tel </div> {{ $dossier->indirectfor->tel_contact_principal }}<br><div class=" bold-description1">Mail </div> {{ $dossier->indirectfor->mail_contact_principal }}
			  @endif
		</div>
			<div class="col-3 marg-c4"> <div class=" bold-description2">{{ $dossier->against->nom_entreprise }}<br>{{ $dossier->against->nom_contact_principal }}</div> <br><div class=" bold-description2">Tel </div> {{ $dossier->against->tel_contact_principal }}<br><div class=" bold-description2">Mail </div> {{ $dossier->against->mail_contact_principal }}<br><br>
			@if(isset($dossier->indirectagainst))
		<div class=" bold-description2">{{ $dossier->indirectagainst->nom_entreprise }}<br>{{ $dossier->indirectagainst->nom_contact_principal }}</div> <br><div class=" bold-description2">Tel </div> {{ $dossier->indirectagainst->tel_contact_principal }}<br><div class=" bold-description2">Mail </div> {{ $dossier->indirectagainst->mail_contact_principal }}
           @endif
	</div>
		</div>
		<div class="row">
			<div class="edit-paragraph"><h5 class="gray-bold">Commentaire principal</h5><p style="font-size: 14px">{{ $dossier->commentaire}}</p> <div style="color: #696262; font-weight: bold;font-size: 13px">#{{ $dossier->tagwords }}</div></div>
		</div>
		<div class="row">
			<div><img src="{{ url('/img/qr-code.png') }}" height="70px" width="70px" style="margin-left: 35px"></div>
			<div class="buttons-position"> 
				<button class="buttonx" class="btn btn-default btn-lg" onclick="window.location='{{ url('dossier-juridiques/vue', $dossier->id) }}'"><img src="{{ url('/img/eye2.png') }}" height="15px" width="15px"/> Vue</button>

				<button style="margin-left: 20px; margin-top:-2px;" class="buttonw" class="btn btn-default btn-lg" onclick="window.location='{{ url('/dossier-juridiques/edit', $dossier->id) }}'"><img src="{{ url('/img/edit.png') }}" height="13px" width="13px"/> Editer</button>


				<form action="{{ url('dossier-juridiques', $dossier->id) }}" method="post" style="margin-top: -70px">

					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button class="buttonxx button-supprimer" class="btn btn-default btn-lg" type="submit" style="color:white;border: none;">  <img src="{{ url('/img/trash.png') }}" height="15px" width="15px" style="margin-top: -3px"/> Supprimer</button>
                </form>
			</div>
		</div>
		<br>
	</div>
</div>
@endforeach
<br><br>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dossierjuridique.css') }}">
<link rel="stylesheet" href="{{ asset('/css/createdossierjuridique.css') }}">

@endsection

@section('scripts')
<script src="{{ asset('js/menuselector.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
  $("#btnadd").click(function() {
    $("#divadd").toggle();
    
  });
});
</script>
@endsection