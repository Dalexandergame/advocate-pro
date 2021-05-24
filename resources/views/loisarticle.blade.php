@extends('layouts.app')
@section('content')
<div class="container-xl">
<select class="form-select filois" aria-label="Default select example">
  <option selected>Lois de travaille</option>
  <option value="1"></option>
  <option value="2"></option>
</select>

<br>
<br>

<table class="table table-borderless">

		<thead>

			<tr>
				<th scope="col" class="title">Nom du fichier</th>
				<th scope="col" class="title">Date de mise a jour</th>
				<th scope="col"></th>
				<th scope="col"></th>
			</tr>

		</thead>

		<tbody>

			@foreach($articles as $article)

			<tr class="fich1">

				<td><img src="img/fichier.svg">{{$article['nom']}}</td>
				<td class="date">{{$article['date']}}</td>
				<td style="text-align:right;"><button class="vue" class="btn btn-default btn-lg"><img src="img/vue.svg"/> Vue</button></td>
				<td style="text-align:left;"><button class="load" class="btn btn-default btn-lg"><img src="img/load.svg"/> Telecharger</button></td>

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
<link href="{{ asset('css/loisarticle.css') }}" rel="stylesheet">
@endsection