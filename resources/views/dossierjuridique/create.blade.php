<@extends('layouts.app')

@section('content')

<br>

<form style="margin-left: 34px">
	<div class="form-row align-items-center">
		<div class="col-2.7">
			<label class="sr-only" for="inlineFormInput">Numero du dossier</label>
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Numero du dossier">
		</div>
		<div class="col-2.7" style="margin-left: 18px">
			<label class="sr-only" for="inlineFormInput">Client</label>
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Client">
		</div>
		<div class="col-2.9" style="margin-left: 18px">
			<label class="sr-only" for="inlineFormInput">#recherch par tagwords</label>
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="#recherch par tagwords">
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

<a class="buttonAjouter button5" href="{{ url('/dossierjuridiques/create') }}"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</a>


<div style="margin-top: 40px;"></div>

<div class="container">
	<div class="big-grid" style="margin-right: -20px; height: 450px">
		<div class="row" style="margin-top: 20px">
			
			<form action="{{ url('dossierjuridiques')}}" method="post">

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
						<input type="text" class="form-control" placeholder="Nom du compte" name="for">
					</div>
					<div class="col">
						<label for="">Contre</label>
						<input type="text" class="form-control" placeholder="Nom du compte" name="against">
					</div>
				</div>
				<div class="form-row type-move3">
					<div class="col">
						<label for="">Client direct</label>
						<input type="text" class="form-control" placeholder="Nom du compte" name="client_direct">
					</div>
					<div class="col">
						<label for="">Client indirect</label>
						<input type="text" class="form-control" placeholder="Nom du compte" name="client_indirect">
					</div>
				</div>
				<div class="form-group text-area-move">
					<label for="exampleFormControlTextarea1">Commentaire principal</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comments"></textarea>
				</div>
				<div class="form-row type-move4">
					<div class="col">
						<input type="text" class="form-control" placeholder="numero dossier" name="tribunal_number">
					</div>
				</div>
				<input type="submit" name="enregistrer" value="enregistrer" class="buttonw">
			</form>

			<a class="button button3" href=""><img src="/img/trash.png" height="13px" width="13px" style="margin-top: -5px;margin-right: 5px">Enregistrer dans la brouillon</a>
		</div>
	</div>
</div>
<br>

</div>
<br><br>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('/css/createdossierjuridique.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('/js/menuselector.js') }}"></script>
@endsection