@extends('layouts.app')
@section('content')
<div class="container-xl">
<!--   @if($errors->any())
    <div class="alert alert-danger">
		@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
		 @endforeach
	</div>
@endif
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif					  
 -->

 <form action="{{ url('/lois-et-articles/search') }}" method="GET">
      {{csrf_field()}}
<select class="filois select2" name="search" aria-label="Default select example">
  <option value="" disabled selected>Type de Lois de travaille</option>
                      @foreach($articles as $article)
                           <option value = "{{$article->type}}">{{$article->type}}</option>
                      @endforeach
</select>
<button type="submit" class="btn btn-default-sm">
            <img src="{{url('img/search.svg')}}">
          </button>
</form>
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
				<td class="date">{{$article->updated_at->todatestring()}}</td>
				<td style="text-align:right;"><button class="vue" class="btn btn-default btn-lg" onclick="window.location='{{ url('./lois-et-articles/view', $article->id) }}'" ><img src="img/vue.svg"/> Vue</button></td>
				<td style="text-align:left;"><button class="load" class="btn btn-default btn-lg" onclick="window.location='{{ url('./lois-et-articles/download', $article->file) }}'"><img src="img/load.svg"/> Telecharger</button></td>

			</tr>
			
			<tr>
				<td height="20" colspan="2"></td>
			</tr>

			@endforeach
		</tbody>
		
	</table>


<!-- Button trigger modal -->
	<button class="vue" class="btn btn-default btn-lg" type="button" data-toggle="modal" data-target="#Modal"><img src="img/plus.svg"/>  Ajouter nouveau</button>

	
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel" aria-hidden="true">
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
			  <div> Marrakech le: {{date('Y/m/d h:i A')}}</div>
			  </div>
			  
			  <div class="add-form">
				  <form action="{{ url('lois-et-articles') }}" method="POST" enctype="multipart/form-data">
				  	{{ csrf_field() }}
				  <div class="form-back">
					  <label class="f-label" for="fname">Nom du fichier:</label>
					  <br>
					  <input class="f-input" type="text" id="fname" name="fname" placeholder="">
					  <br><br>
					  <label  class="f-label" for="lname">Type de lois:</label>
					  <br>
					  <select class="form-select f-input" type="text" id="lname" name="lname" aria-label="Default select example">
					  <option value="unknown"></option>
					  <option value="lois1">lois1</option>
					  <option value="lois2">lois2</option>
					  <option value="lois3">lois3</option>
					  </select>
					  <br><br>
					  <input type="file" name="file" id="file" class="inputfile" multiple onchange="javascript:updateList()"  />
					  <label for="file" id="fileList">+ Ajouter piece jointe</label>
					  <div id="fileList"></div>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
// 	$('#file').change(function() {
//   var i = $(this).prev('label').clone();
//   var file = $('#file')[0].files[0].name;
//   $(this).next('label').text(file);
// });
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
    $('.select2').select2();
});
</script>
@endsection