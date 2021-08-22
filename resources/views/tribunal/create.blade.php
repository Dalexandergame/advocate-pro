<@extends('layouts.app')

@section('content')


<br>
<a class="buttona button55" href="{{ url('/tribunals/create') }}"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</a>
<a class="buttonx1 button-supprimer1" href=""><img src="/img/trash.png" height="13px" width="13px" style="margin-top: -5px;margin-right: 5px">supprimer la selection</a>
<div style="margin-top: 40px;"></div>

<table class="table table-borderless" style="width: 900px; margin-left: 100px;">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Tribunal</th>
				<th scope="col">ville</th>
				<th scope="col">adresse</th>
				<th scope="col">type</th>
			</tr>
		</thead>
</table>
<div style="margin-top: -10px;"></div>
<div class="container">
	<div class="big-grid" style="margin-right: -20px; height: 600px">
		<div class="row" style="margin-top: 20px">
			
			<form action="{{ url('tribunals')}}" method="post">

				{{ csrf_field()}}

				<div class="form-column col-md-8 type-move0">
					<div class="col">
						<input type="checkbox" name="checkbox"/>
						<div class="dot"><img src="/img/court.png" style="margin-top: 13px; margin-left: 13px; margin-bottom: 20px;height: 45px; width: 45px"></div>
						<input type="text" class="form-control" placeholder="Nom du tribunal" name="nom_tribunal" style="margin-top: -50px;margin-left: 120px; width: 200px"> 
					</div><div style="margin-top: 5px"></div>
					<div class="col" >
						


				</div>
				
				<div class="form-column type-move21">
					
					<div class="col movedown">
						<label for="" style="font-weight: bold;padding-top: 12px;">Nom de la ville:</label>
						<span class="span1"><input type="text" class="form-control" placeholder="Tapez la ville" name="ville" style="width: 160px;"></span>
						
					</div>
				</div>

                <div class="form-column type-move22">
					
					<div class="col movedown">
						<label for="" style="font-weight: bold;padding-top: 12px;">L'adresse:</label>
						<span class="span1"><input type="text" class="form-control" placeholder="Tapez l'adresse" name="adresse" style="width: 160px;"></span>
						
					</div>
					
				</div>

				<div class="form-column type-move23">
					
					<div class="col movedown">
						<label for="cars" style="margin-top: 13px; font-weight: bold; padding-bottom: 6px">Choisir un type:</label>
  <select id="type" name="type" style="padding: 5 20 5 20">
    <option value="Premiere instance">Premiere instance</option>
    <option value="Cour appel">Cour d'appel</option>
    <option value="Cour de cassation">Cour de cassation</option>
    
  </select>	
					</div>
				</div>
				<div style="margin-top: 100px; margin-left: 50px">
					<iframe style="height: 350px; width: 900px; margin-top: 10px; margin-left: 50px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6049.881319200985!2d-74.00151372674895!3d40.69730452928296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a47df06b185%3A0xc889234bc07c42ee!2sBrooklyn+Heights%2C+Brooklyn%2C+NY+11201!5e0!3m2!1sen!2sus!4v1461598289488" width="425" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
                <button type="submit" name="enregistrer" value="enregistrer" class="buttonsave"><img src="/img/save.png" height="13px" width="13px" style="margin-top: 3px;margin-right: 5px;">enregitrer</button>
				 <a class="button button3" href=""><img src="/img/trash.png" height="13px" width="13px" style="margin-top: -5px;margin-right: 5px">supprimer</a>
			</form>

			
		</div>
	</div>
</div>
<br>

</div>
<br><br>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('../css/createtribunal.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('../js/menuselector.js') }}"></script>

@endsection