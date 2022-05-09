<@extends('layouts.app')

@section('content')

<div class="client-menu">
    <ul class="ulclient">
        <li class="licontact"><a class="acontact" href="{{url('../clientcontacts')}}">Contact</a></li>
        <li class="licompte"><a class="acontact" href="#">Compte</a></li>
    </ul>
</div>
<br>

<form>
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
<button class="buttona button55" href="{{ url('/clientcomptes/create') }}" class="btn btn-default btn-lg"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</button>
<a class="buttonx1 button-supprimer1" href=""><img src="/img/trash.png" height="13px" width="13px" style="margin-top: -5px;margin-right: 5px">supprimer la selection</a>
<div style="margin-top: 40px;"></div>

<table class="table table-borderless" style="width: 900px; margin-left: 100px;">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Nom du compte</th>
				<th scope="col">Liste des contacts</th>
				<th scope="col">Contact principal</th>
				<th scope="col">Dossier</th>
			</tr>
		</thead>
</table>
<div style="margin-top: -10px;"></div>
<div class="container">
	<div class="big-grid" style="margin-right: -20px; height: 420px">
		<div class="row" style="margin-top: 20px">

			<form action="{{ url('clientcomptes')}}" method="post">

				{{ csrf_field()}}

				<div class="form-column col-md-8 type-move0">
					<div class="col">
						<div class="dot"><img src="/img/briefcase1.png" style="margin-top: 18px; margin-left: 15px; margin-bottom: 20px; "></div>
						<input type="text" class="form-control" placeholder="Entreprise Nom" name="nom_entreprise" style="margin-top: -50px;margin-left: 120px; width: 250px">
						<div style="margin-top: 5px"></div>
						<div class="nbrdossier"> Nombre de dossier </div>
					</div><div style="margin-top: 5px"></div>
					<div class="col" >
						<label class="addressdeplacement">Adresse</label>
						<input type="text" class="form-control" placeholder="tapez votre adresse ici..." name="adresse" style="border: none; border-color: transparent; outline: none; margin-left: 110px;">
					</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="tagwords" name="tagwords" style="margin-left: 120px; margin-top: 50px;width: 250px;">
					</div>
				</div>

				<div class="form-column type-move21">
					<div class="col" >
						<input type="text" class="form-control" placeholder="Nom de contact 01" name="nom_contact" style="border: none; border-color: transparent; outline: none; font-weight: bold;">
					</div>
					<div class="col">
						<label for="" style="font-weight: bold;padding-top: 12px;">Tél</label>
						<span class="span1"><input type="text" class="form-control" placeholder="Tapez votre numero" name="tel_contact" style="border: none; border-color: transparent; outline: none;width: 160px;"></span>

					</div>
					<div class="col">
						<label for="" style="font-weight: bold;padding-top: 12px;">Mail</label>
						<span class="span1"><input type="text" class="form-control" placeholder="Tapez votre email" name="mail_contact" style="border: none; border-color: transparent; outline: none;width: 160px;"></span>

					</div>
				</div>

                <div class="form-column type-move22">
					<div class="col" >
						<input type="text" class="form-control" placeholder="contact principal" name="nom_contact_principal" style="border: none; border-color: transparent; outline: none; font-weight: bold;">
					</div>
					<div class="col">
						<label for="" style="float: left; font-weight: bold;padding-top: 12px;">Tél</label>
						<span class="span1"><input type="text" class="form-control" placeholder="Tapez votre numero" name="tel_contact_principal" style="border: none; border-color: transparent; outline: none;width: 160px;"></span>

					</div>
					<div class="col">
						<label for="" style="float: left; font-weight: bold;padding-top: 12px;">Mail</label>
						<span class="span1"><input type="text" class="form-control" placeholder="Tapez votre email" name="mail_contact_principal" style="border: none; border-color: transparent; outline: none;width: 160px;"></span>

					</div>
				</div>

				<div class="form-column type-move23">
					<div class="col" >
						<input type="text" class="form-control" placeholder="Dossier lier" name="Nomdossier" style="border: none; border-color: transparent; outline: none; font-weight: bold;">
					</div>
					<div class="col">
						<span class="span1"><input type="text" class="form-control" placeholder="numero du dossier" name="dossier_lier" style="border: none; border-color: transparent; outline: none;width: 160px;"></span>
					</div>
				</div>
                <button type="submit" name="enregistrer" value="enregistrer" class="buttonsave"><img src="/img/save.png" height="13px" width="13px" style="margin-top: -5px;margin-right: 5px">enregitrer</button>
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
<link rel="stylesheet" href="{{ asset('../css/createclientcompte.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('../js/menuselector.js') }}"></script>
@endsection
