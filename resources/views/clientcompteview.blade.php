@extends('layouts.app')

@section('content')
<div class="client-menu">
    <ul>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Compte</a></li>
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
<button class="button button5" class="btn btn-default btn-lg"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</button>


<br><br><br>
<div class="container">

	<table class="table table-borderless">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Nom du compte</th>
				<th scope="col">Liste des contacts</th>
				<th scope="col">Contact principal</th>
				<th scope="col">Dossier</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td height="20" colspan="2"></td>
			</tr>
			<tr class="shadowrow">
				<td><input type="checkbox" name="checkbox"/></td>
				<td>Nom du compte</td>
				<td>Contact 01 information</td>
				<td style="width: 400px">Contact 01 information<br> <button onclick="showMessage()" class="buttonx button-vue" class="btn btn-default btn-lg">  <img src="/img/eye2.png" height="15px" width="15px" style="margin-top: -3px"/> Vue</button><button class="buttonx button-editer" class="btn btn-default btn-lg">  <img src="/img/edit.png" height="15px" width="15px" style="margin-top: -3px"/> Editer</button></td>
                <td style="width: 200px">05<br> <button class="buttonx button-supprimer" class="btn btn-default btn-lg">  <img src="/img/trash.png" height="15px" width="15px" style="margin-top: -3px"/> Supprimer</button></td>
			</tr>
		</tbody>

	</table>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/clientcompteview.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/menuselector.js') }}"></script>
<script src="{{ asset('js/notyetconfig.js') }}"></script>
@endsection
