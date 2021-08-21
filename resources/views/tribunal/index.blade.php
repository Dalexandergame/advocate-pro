@extends('layouts.app')

@section('content')

<br>
<a class="buttona button55" href="{{ url('/tribunals/create') }}"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</a>
<button class="buttonx1 button-supprimer1" class="btn btn-default btn-lg"><img src="/img/trash.png" height="12px" width="12px" style="margin-top: -5px"> Supprimer la selection</button>


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
@foreach($tribunals as $tribunal)
			<tr class="shadowrow">
				<td><input type="checkbox" name="checkbox"/></td>
				<td>{{$tribunal->nom_tribunal}}</td>
				<td>{{$tribunal->ville}}</td>
				<td>{{$tribunal->adresse}}</td>
				<td></td>
				<td>{{$tribunal->type}}</td>
			</tr>
			<tr class="shadowrow1">
				<td></td>
				<td></td>
				<td></td>
				<td style="text-align:right;"> <button class="buttonx" class="btn btn-default btn-lg">  <img src="/img/eye2.png" height="15px" width="15px"/> Vue</button></td>
				<td><button class="buttonw" class="btn btn-default btn-lg"  onclick="window.location='{{ url('tribunals/'.$tribunal->id.'/edit') }}'">  <img src="/img/edit.png" height="13px" width="13px"/> Editer</button></td>

				<td  style="text-align:left;">
				<form  action="{{ url('tribunals/'.$tribunal->id) }}" method="post">

					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button class="buttonz" class="btn btn-default btn-lg">  <img src="/img/trash.png" height="12px" width="12px"/> Supprimer</button>
				</form></td>
			</tr>
			<tr>
				<td height="20" colspan="2"></td>
			</tr>
@endforeach
		</tbody>

	</table>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('../css/tribunalcourts.css') }}">
@endsection

@section('scripts')
@endsection