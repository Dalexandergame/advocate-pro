@extends('layouts.app')

@section('content')

<br>
<button class="button button5" class="btn btn-default btn-lg"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</button>


<br><br><br>
<div class="container">

	<table class="table table-borderless">
		<col width="20">
		<col width="140">
		<col width="140">
		<col width="140">
		<col width="10">
		<col width="140">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Tribunal</th>
				<th scope="col">Ville</th>
				<th scope="col">adresse</th>
				<th scope="col"></th>
				<th scope="col">Type</th>
			</tr>
		</thead>
		<tbody>
			<tr class="shadowrow">
				<td><input type="checkbox" name="checkbox"/></td>
				<td>Nom du tribunal</td>
				<td>Nom de la ville</td>
				<td>Zone industrielle, Sidi Ghanem Numéro 292, bureau 1 et 2 40000 Marrakech</td>
				<td></td>
				<td>Premiére instance</td>
			</tr>
			<tr class="shadowrow1">
				<td></td>
				<td></td>
				<td></td>
				<td style="text-align:right;"> <button class="buttonx" class="btn btn-default btn-lg">  <img src="/img/eye2.png" height="15px" width="15px"/> Vue</button></td>
				<td><button class="buttonw" class="btn btn-default btn-lg">  <img src="/img/edit.png" height="13px" width="13px"/> Editer</button></td>
				<td style="text-align:left;"><button class="buttonz" class="btn btn-default btn-lg">  <img src="/img/trash.png" height="12px" width="12px"/> Supprimer</button></td>
			</tr>
			<tr>
				<td height="20" colspan="2"></td>
			</tr>

			<tr class="shadowrow">
				<td><input type="checkbox" name="checkbox"/></td>
				<td>Nom du tribunal</td>
				<td>Nom de la ville</td>
				<td>Zone industrielle, Sidi Ghanem Numéro 292, bureau 1 et 2 40000 Marrakech</td>
				<td></td>
				<td>Cour d'appel</td>
			</tr>
			<tr class="shadowrow1">
				<td></td>
				<td></td>
				<td></td>
				<td style="text-align:right;"> <button class="buttonx" class="btn btn-default btn-lg">  <img src="/img/eye2.png" height="15px" width="15px"/> Vue</button></td>
				<td><button class="buttonw" class="btn btn-default btn-lg">  <img src="/img/edit.png" height="13px" width="13px"/> Editer</button></td>
				<td style="text-align:left;"><button class="buttonz" class="btn btn-default btn-lg">  <img src="/img/trash.png" height="12px" width="12px"/> Supprimer</button></td>
			</tr>
			<tr>
				<td height="20" colspan="2"></td>
			</tr>
		</tbody>

	</table>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/tribunalcourts.css') }}">
@endsection

@section('scripts')
@endsection