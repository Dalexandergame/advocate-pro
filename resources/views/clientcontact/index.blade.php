@extends('layouts.app')

@section('content')
<div class="client-menu">
    <ul class="ulclient">
           <li class="licompte"><a class="acontact" href="#">Contact</a></li>
        <li class="licontact"><a class="acontact" href="{{url('../clientcomptes')}}">Compte</a></li>
    </ul>
</div>
<br>

<form style="margin-left: 35px">
	<div class="form-row align-items-center">
		<div class="col-3">
			<label class="sr-only" for="inlineFormInput">tagwords</label>
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="#Recherche par tagwords">
		</div>
		<div class="col-3">
			<label class="sr-only" for="inlineFormInput">Nametele</label>
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Recherche par nom ou telephone">
		</div>

		<div class="customSelect" style="width:300px; height: 45px; margin-left: 5px; margin-right: -8px;" >
			<select>
				<option value="0">Type du compte</option>
				<option value="Particulier">Particulier</option>
				<option value="societe">Société</option>
				<option value="Famille">Famille</option>
				<option value="OrganisationG">Organisation gouvernementale</option>
				<option value="OrganisationNG">Organisation non gouvernementale</option>
			</select>
		</div>


		<div class="col-auto">
			<button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit"><img src="img/search.svg"></button>
		</div>
	</div>
</form>
<br>
<a class="button button5" href="{{ url('/clientcontacts/create') }}"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</a>
<button class="buttonx1 button-supprimer1" class="btn btn-default btn-lg"><img src="/img/trash.png" height="12px" width="12px" style="margin-top: -5px"> Supprimer la selection</button>

<br><br><br>
<div class="container">
	<table class="table table-borderless">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Nom & Prénom</th>
				<th scope="col">Ville</th>
				<th scope="col">Tél</th>
				<th scope="col">Mail</th>
				<th scope="col">Nombre de dossier</th>
			</tr>
		</thead>
		<tbody>
@foreach($clientcontacts as $clientcontact)
			<tr>
				<td height="20" colspan="2"></td>
			</tr>

			<tr class="shadowrow">
				<td><input type="checkbox" name="checkbox"/></td>
				<td>{{$clientcontact->nom_contact}}</td>
				<td>{{$clientcontact->ville}}</td>
				<td>{{$clientcontact->tel}}</td>
				<td style="width: 400px">{{$clientcontact->mail}}<br> <button onclick="showMessage()" class="buttonx button-vue" class="btn btn-default btn-lg">  <img src="/img/eye2.png" height="15px" width="15px" style="margin-top: -3px"/> Vue</button>
				<button class="buttonx button-editer" onclick="window.location='{{ url('clientcontacts/'.$clientcontact->id.'/edit') }}'" class="btn btn-default btn-lg">  <img src="/img/edit.png" height="15px" width="15px" style="margin-top: -3px"/> Editer</button></td>
				<td style="width: 200px">{{$clientcontact->dossier_lier}}<br>

				<form action="{{ url('clientcontacts/'.$clientcontact->id) }}" method="post">

					{{ csrf_field() }}
					{{ method_field('DELETE') }}

					  <button type="submit" class="buttonx button-supprimer" class="btn btn-default btn-lg">  <img src="/img/trash.png" height="15px" width="15px" style="margin-top: -3px"/> Supprimer</button></td>
					
</form>
               
			</tr>
@endforeach
		</tbody>

	</table>
</div>

<br>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('../css/clientcontactview.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('../js/menuselector.js') }}"></script>
<script src="{{ asset('../js/notyetconfig.js') }}"></script>
@endsection
