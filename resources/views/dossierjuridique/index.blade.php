<@extends('layouts.app')

@section('content')

<br>
<br>
<form style="margin-left: 34px" action="/dossierjuridiques/search" method="get">
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

		<div class="col-auto">
			<button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit" style="margin-top: 10px"><img class="icon-center" src="img/search.svg"></button>
		</div>
	</div>
</form>

<a class="button button5" href="{{ url('/dossierjuridiques/create') }}"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</a>

<div style="margin-top: 40px;"></div>
@foreach($dossierjuridiques as $dossierjuridique)

<div class="container">
	<div class="big-grid" style="margin-right: -20px">
		<div class="row" style="margin-top: 20px">
			<div class="col-2.5" id="red-writing">Dossier N {{ $dossierjuridique->file_number }}</div>
			<div class="col gray-bold1">Sous dossiers(05)</div>
			<div class="col titre col3-marg">Type</div>
			<div class="col-3 titre">Pour</div>
			<div class="col-3 titre">Contre</div>
			<div class="w-100"></div>
			<div class="col-2.5 marg-c1 bold-description1">Marrakech le({{ $dossierjuridique->date_creation }})</div>
			<div class="col marg"></div>
			<div class="col marg-c2">{{ $dossierjuridique->type_dossier }}</div>
			<div class="col-3 marg-c3"><div class=" bold-description1">{{ $dossierjuridique->for }}</div><br><div class=" bold-description1">Tel </div> +212 600 137 224<br><div class=" bold-description1">Mail </div> nom&prenom@gmail.com</div>
			<div class="col-3 marg-c4"> <div class=" bold-description2">{{ $dossierjuridique->against }}</div> <br><div class=" bold-description2">Tel </div> +212 600 137 224<br><div class=" bold-description2">Mail </div> nom&prenom@gmail.com</div>
		</div>
		<div class="row">
			<div class="edit-paragraph"><h5 class="gray-bold">Commentaire principal</h5><p style="font-size: 14px">{{ $dossierjuridique->comments }}</p> <div style="color: #696262; font-weight: bold;font-size: 13px">#{{ $dossierjuridique->tagwords }}</div></div>
		</div>
		<div class="row" style="margin-bottom: -20px">
			<div><img src="/img/qr-code.png" height="70px" width="70px" style="margin-left: 35px"></div>
			<div class="buttons-position"> 
				<form action="{{ url('dossierjuridiques/'.$dossierjuridique->id) }}" method="post" style="margin-top: -80px">

					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button class="buttonxx button-supprimer" class="btn btn-default btn-lg" type="submit">  <img src="/img/trash.png" height="15px" width="15px" style="margin-top: -3px"/> Supprimer</button>
</form>
					<button class="buttonx buttonview" class="btn btn-default btn-lg" onclick="window.location='{{ url('dossierjuridiques/'.$dossierjuridique->id.'/vue') }}'"><img src="/img/eye2.png" height="15px" width="15px" /> Vue</button>

				    <button style="margin-left: 20px" class="buttonw" class="btn btn-default btn-lg" onclick="window.location='{{ url('dossierjuridiques/'.$dossierjuridique->id.'/edit') }}'"><img src="/img/edit.png" height="13px" width="13px"/> Editer</button>
				
				

				
			</div>
		</div>
		
		<br>
	</div>
</div>
@endforeach
<br>


@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('../css/dossierjuridique.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('../js/menuselector.js') }}"></script>
@endsection