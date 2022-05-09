@extends('layouts.app')

@section('content')
<div class="client-menu">
    <ul class="ulclient d-flex">
        <li class="licontact"><a class="acontact" href="{{url('../clientcontacts')}}">Contact</a></li>
        <li class="licompte"><a class="acontact" href="#">Compte</a></li>
    </ul>
</div>
<br>

<form>
	<div class="row container" style="padding: 0 2.125rem">
		<div class="col">
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="#Recherche par tagwords">
		</div>
		<div class="col pl-0">
			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Recherche par nom ou telephone">
		</div>

		<div class="col customSelect">
			<select>
				<option value="0">Type du compte</option>
				<option value="Particulier">Particulier</option>
				<option value="societe">Société</option>
				<option value="Famille">Famille</option>
				<option value="OrganisationG">Organisation gouvernementale</option>
				<option value="OrganisationNG">Organisation non gouvernementale</option>
			</select>
		</div>
		<div class="col">
			<button type="submit" class="btn btn-outline-white"><img src="img/search.svg"></button>
		</div>
	</div>
</form>
<br>
<a class="button button5" href="{{ url('/clientcomptes/create') }}"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</a>
<button class="buttonx1 button-supprimer1" class="btn btn-default btn-lg"><img src="/img/trash.png" height="12px" width="12px" style="margin-top: -5px"> Supprimer la selection</button>

<br><br><br>
<div class="container">



	<table class="table table-borderless" style="border-collapse:collapse;">
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
@foreach($clientcomptes as $clientcompte)
			<tr>
				<td height="20" colspan="2"></td>
			</tr>

			<tr class="shadowrow" >
				<td><input type="checkbox" name="checkbox"/></td>
				<td>{{$clientcompte->nom_entreprise}}</td>
				<td>{{$clientcompte->nom_contact}}</td>
				<td style="width: 400px">{{$clientcompte->nom_contact_principal}}<br> <button onclick="showMessage()" class="buttonx button-vue" class="btn btn-default btn-lg">  <img src="/img/eye2.png" height="15px" width="15px" style="margin-top: -3px"/> Vue</button>
				<button class="buttonx button-editer" onclick="window.location='{{ url('clientcomptes/'.$clientcompte->id.'/edit') }}'" class="btn btn-default btn-lg">  <img src="/img/edit.png" height="15px" width="15px" style="margin-top: -3px"/> Editer</button></td>
				<td style="width: 200px">{{$clientcompte->dossier_lier}}<br>

				<form action="{{ url('clientcomptes/'.$clientcompte->id) }}" method="post">

					{{ csrf_field() }}
					{{ method_field('DELETE') }}

					  <button type="submit" class="buttonx button-supprimer" class="btn btn-default btn-lg">  <img src="/img/trash.png" height="15px" width="15px" style="margin-top: -3px"/> Supprimer</button> </form></td>

			</tr>

@endforeach
		</tbody>

	</table>
</div>
<!--Create client account form-->
<div class="container">
    <div class="row p-3 bg-white" style="margin:2rem 0">
        <div class="mr-3">
            <input type="checkbox" name="checkbox"/>
        </div>
        <div class="col-1">
            <div class="d-flex align-items-center justify-content-center" style="border-radius:50%;background:#dcdcdc; height: 5em;width: 5em">
                <img src="/img/briefcase1.png">
            </div>
        </div>
        <div class="col-3 p-3">
            <input type="text" class="form-control" placeholder="Entreprise Nom" name="nom_entreprise">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="col" >
                <label class="addressdeplacement">Adresse</label>
                <input type="text" class="form-control" placeholder="tapez votre adresse ici..." name="adresse">
            </div>
        </div>

        <div class="col">
            <div class="" >
                <input type="text" class="form-control" placeholder="Nom de contact 01" name="nom_contact">
            </div>
            <div class="">
                <label for="" style="font-weight: bold;padding-top: 12px;">Tél</label>
                <span class="span1"><input type="text" class="form-control" placeholder="Tapez votre numero" name="tel_contact"></span>

            </div>
            <div class="">
                <label for="" style="font-weight: bold;padding-top: 12px;">Mail</label>
                <span class="span1"><input type="text" class="form-control" placeholder="Tapez votre email" name="mail_contact"></span>

            </div>
        </div>
        <div class="col">
            <div class="col" >
                <input type="text" class="form-control" placeholder="contact principal" name="nom_contact_principal">
            </div>
            <div class="col">
                <label for="" style="font-weight: bold;padding-top: 12px;">Tél</label>
                <span class="span1"><input type="text" class="form-control" placeholder="Tapez votre numero" name="tel_contact_principal"></span>

            </div>
            <div class="col">
                <label for="" style="font-weight: bold;padding-top: 12px;">Mail</label>
                <span class="span1"><input type="text" class="form-control" placeholder="Tapez votre email" name="mail_contact_principal"></span>

            </div>
        </div>
        <div class="col">
            <div class="" >
                <input type="text" class="form-control" placeholder="Dossier lier" name="Nomdossier">
            </div>
            <div class="">
                <span class="span1"><input type="text" class="form-control" placeholder="numero du dossier" name="dossier_lier"v></span>
            </div>
        </div>
    </div>
</div>


<br>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('../css/clientcompteview.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('../js/menuselector.js') }}"></script>
<script src="{{ asset('../js/notyetconfig.js') }}"></script>
@endsection
