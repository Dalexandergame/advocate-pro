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
				<td style="text-align:right;"><button class="vue" class="btn btn-default btn-lg" onclick="window.location='{{ url('./view', $article->id) }}'" ><img src="img/vue.svg"/> Vue</button></td>
				<td style="text-align:left;"><button class="load" class="btn btn-default btn-lg"><img src="img/load.svg"/> Telecharger</button></td>

			</tr>
			
			<tr>
				<td height="20" colspan="2"></td>
			</tr>

			@endforeach

		</tbody>


	</table>

	<button class="vue" class="btn btn-default btn-lg" type="button" data-toggle="modal" data-target="#exampleModal"><img src="img/plus.svg"/>  Ajouter nouveau</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">	 
    <div class="modal-content" style="width: 796px; height: 500px;">
	      <div class="modal-body">
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		     <span aria-hidden="true"  style="font-size: 50px;">&times;</span>
		    </button>
			  <div class="user-infos">
			  	<h5>Utilisateur en charge</h5>
			  	<br>
			  <div class="user-label">Nom d'utilisateur</div>
			  <div class="user-label">Tel <span> +212 600 137 564</span> </div>
			  <div class="user-label">Mail <span> nom&prenom@gmail.com</span> </div>
			  <br>
			  <br>
			  <br>
			  <div>Marrakech le (19/05/2021)</div>
			  </div>
			  
			  <div class="add-form">
				  <form action="./action_page.php">
				  <div class="form-back">
					  <label class="f-label" for="fname">Nom du fichier:</label>
					  <br>
					  <input class="f-input" type="text" id="fname" name="fname" placeholder="Nom du fichier...">
					  <br><br>
					  <label  class="f-label" for="lname">Type de lois:</label>
					  <br>
					  <select class="form-select f-input" type="text" id="lname" name="lname" aria-label="Default select example">
					  <option selected></option>
					  <option value="1"></option>
					  <option value="2"></option>
					  </select>
					  <br><br>
					  <input type="file" name="file" id="file" class="inputfile" />
					  <label for="file">+ Ajouter piece jointe</label>
				  </div>
				  <br><br>
				  <button class="button0" class="btn btn-default btn-lg"> Enregister</button>
				  </form> 
			  </div>
			  
	      </div>
    </div>
  </div>
</div>

	<div style="height: 100px;"></div>
</div>
@endsection  

@section('styles')
<link href="{{ asset('css/loisarticle.css') }}" rel="stylesheet">
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
@endsection
