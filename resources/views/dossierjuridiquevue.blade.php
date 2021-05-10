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
			<label class="sr-only" for="inlineFormInput">#recherche par tagwords</label>
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

<button class="button button5" class="btn btn-default btn-lg"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</button>

<div style="margin-top: 40px;"></div>
<div class="container">
	<div class="big-grid">
		<div class="row" style="margin-top: 20px">
			<div class="col-2.5" id="red-writing">Dossier N 37538</div>
			<div class="col gray-bold1">Sous dossiers(05)</div>
			<div class="col titre col3-marg">Type</div>
			<div class="col-3 titre">Pour</div>
			<div class="col-3 titre">Contre</div>
			<div class="w-100"></div>
			<div class="col-2.5 marg-c1 bold-description-kech">Marrakech le(07/02/2019)</div>
			<div class="col marg"></div>
			<div class="col marg-c2">Type 1<br>Type 2<br>Type 3<br>Type 4<br>Type 5</div>
			<div class="col-3 marg-c3"><div class=" bold-description1">Atelier IKS</div><br><div class=" bold-description1">Tel </div> +212 600 137 224<br><div class=" bold-description1">Mail </div> nom&prenom@gmail.com</div>
			<div class="col-3 marg-c4"> <div class=" bold-description2">Babanou Oumaima</div> <br><div class=" bold-description2">Tel </div> +212 600 137 224<br><div class=" bold-description2">Mail </div> nom&prenom@gmail.com</div>
		</div>
		<div class="row">
			<div class="edit-paragraph"><h5 class="gray-bold">Commentaire principal</h5><p style="font-size: 14px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> <div style="color: #696262; font-weight: bold;font-size: 13px">#IKS #Outhman</div></div>
		</div>
		<br>
	</div>
</div>
<br>
<div style="margin-top: 10px;"></div>

<h4 style="color: red; font-weight: bold; margin-left: 45px; margin-bottom: -30px">Dossiers</h4>
<div class="float-container">
	<div class="float-child">
		<div class="big-grid2">
			<div class="row">
				<div class="col-2.5"> 
					<img src="/img/profile.png" height="38px" width="38px" style="margin-left: 40px;margin-top: 20px"/> <div class="marg-responsable-dossier"><div class="gray-bold">Responsable du dossier</div><br><div class="gray-normal">Nom & Prénom</div></div>
					<h3 id="red-writing">Dossier parent</h3>
					<a href="#" class="text-button-red">12356<i class="arrow-down"></i></a>
					<div class="line-vertical"></div>
					<div class="line-horizontal"></div>
					<div class="plus-dossier"><a class="hover-plus-dossier" href="#"><div style="color: black">+</div><div class="colored-gray">Ajouter un sous-dossier</div></a></div>

					<div class="plus-dossier color-text">37538/1<i class="arrow-right"></i></div>
					<div class="plus-dossier color-text">37538/2</div>
					<div class="plus-dossier color-text">37538/4N</div>
					<div class="plus-dossier color-text">37538E</div>
					<div style="margin-top: 17px"></div>
					<div class="plus-dossier"><a class="hover-plus-dossier" href="#"><div style="color: black">+</div><div class="colored-gray">Ajouter un sous-dossier</div></a></div>
					<div style="margin-bottom: 60px"></div>

				</div>
				<div class="col-2.5">

					<div class="customSelect" style="width:220px; height: 50px; margin-left: 30px; margin-right: -7px;">
						<select>
							<option value="0">Type du dossier</option>
							<option value="type1">type 1</option>
							<option value="type2">type 2</option>
							<option value="type3">type 3</option>
							<option value="type4">type 4</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="float-child">
		<div class="big-grid2">
			<div class="row">
				<div class="col-2.5">
					<img src="/img/alarm.png" height="20px" width="20px" style="margin-left: 40px;margin-top: 20px"/> <div class="marg-red-bold"><div class="red-bold">Date du prochaine audience JJ/MM/AA</div><br></div>
					<img src="/img/profile.png" height="38px" width="38px" style="margin-left: 40px;margin-top: 20px"/> <div class="marg-responsable-dossier"><div class="gray-bold">Utilisateur en charge</div><br><div class="gray-normal">Nom & Prénom</div></div><br>
					<a href="#" class="gray-bold-audience marg-responsable-dossier2">Afficher plus de détails sur l'audience</a>
					<div><div class="frais-color">Frais</div><div class="frais-color-dh">200 Dhs</div></div>
					<a href="#" class="ajouer-frais"><div><div class="style-plus">+</div><div class="style-ajouter-frais">Ajouter frais</div></div></a>
					<h5 class="commentaires">Commentaires</h5>
					<img src="/img/profile.png" height="30px" width="30px" style="margin-left: 40px;margin-top: 20px"/> <div class="marg-responsable-dossier"><div class="gray-normal2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</div><br><a href="" class="a-afficher"><div class="gray-bold-rep">Afficher les réponses </div><div class="gray-number">(14)</div></div></a>

					<div class="plus-dossier"><a class="hover-plus-dossier" href="#"><div class="plus-black">+</div><div class="colored-gray-comment">Ajouter un commentaire</div></a></div>
					<a href="" class="marg-circle-button"><div class="circle">+</div><div class="gray-bold-rep2">Assigner une tâche</div></a>
					<div style="margin-bottom: 48px;"></div>
				</div>
				<div class="col-2.5">
					<div style="margin-top: -555px; margin-left: -10px"><div class="loader">Loading...</div><div class="gray-cours-traitement">En cours de traitement</div> </div>
					<div style="margin-left: 430px;margin-top: 45px"><a href="" class="a-afficher"><div class="gray-bold-rep3">Tâches </div><div class="gray-number2">(17)</div> <i class="arrow-right-tache"></i></a></div>
					<a href="" class="a-afficher"><div class="gray-bold-details">Voir détails</div></a>
					<div style="margin-left: 335px;margin-top: 190px"><a href="" class="a-afficher"><img src="/img/attach.png" height="11px" width="11px" style="margin-left: 50px;"/><div class="colored-gray-joint">2 Fichiers joints</div></a></div>
				</div>
			</div>
		</div>
	</div>
</div></div>
<div class="float-container">
	<div class="float-child" style="margin-left: 300px; width: 1160px">
		<div class="big-grid2" >
			<div class="row">
				<div class="col-2.5" id="red-writing-3">Historique du dossier
				</div>
				<div class="style-n-all"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div>
				<hr class="red-line">
				<div class="style-n-all2"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div>
				<hr class="red-line2">
				<div class="style-n-all2"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div>
				<hr class="red-line2">
				<div class="style-n-all2"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div>
			</div>
		</div>
	</div>
</div>
<div class="float-container">
	<div class="float-child" style="margin-left: 300px; width: 1160px">
		<div class="big-grid2" >
			<div class="row">

			<div class="col-2.5" id="red-writing-dossier">Dossier N 37538</div>
			<div class="col-2.5" id="red-writing-dossier2">Numéro du tribunal</div>
			<div class="w-100"></div>
			<div class="col-2.5 marg-c1-date bold-description1">2019/1501/273</div>
		</div>
		<div class="row">
			<div class="edit-paragraph2"><h5 class="gray-bold-2">Jugement <div class="date-style">2018/25/14</div></h5><p style="font-size: 14px; color: gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
		</div>
		<div class="row">
			<div><img src="/img/qr-code.png" height="70px" width="70px" style="margin-left: 150px;margin-top: 20px"></div>
			<div class="buttons-position-3"> 
				<button class="buttonx2" class="btn btn-default btn-lg" onclick="window.location='{{ url('/dossier-juridiques') }}'"><img src="/img/hide-eye.png" height="16px" width="15px"  style="margin-right: 2px; margin-top: -2px"/> Masquer</button>

				<button style="margin-left: 10px" class="buttonw2" class="btn btn-default btn-lg"><img src="/img/folder.png" height="14px" width="14px" style="margin-right: 2px; margin-top: -2px" /> Créer un sous dossier</button>
				<button class="buttonx-save" class="btn btn-default btn-lg"><img src="/img/save.png" height="16px" width="15px"  style="margin-right: 2px; margin-top: -2px"/> Enregitrer</button>
			</div>
		</div>
		<br><br>
		</div>
	</div>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dossierjuridiquevue.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/menuselector.js') }}"></script>
@endsection