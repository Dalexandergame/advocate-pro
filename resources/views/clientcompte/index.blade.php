@extends('layouts.app')

@section('content')
<div class="client-menu">
    <ul class="ulclient d-flex">
        <li class="licontact"><a class="acontact" href="{{url('../clientcontacts')}}">Contact</a></li>
        <li class="licompte"><a class="acontact" href="#">Compte</a></li>
    </ul>
</div>
<br>

<form id="">
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
<a class="button button5 slide_down"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</a>
<button class="buttonx1 button-supprimer1" class="btn btn-default btn-lg"><img src="/img/trash.png" height="12px" width="12px" style="margin-top: -5px"> Supprimer la selection</button>

<br>
<!--Create client account form-->
<form id="client_account_create" action="{{ route('clientcomptes.create') }}" style="display: none">
    @csrf
    <div class="container bg-white" style="width: 94%;border: 1px solid #80808042;">
        <div class="row px-3 pt-3">
            <div class="mr-3">
                <input type="checkbox" name="checkbox"/>
            </div>
            <div class="col-1">
                <div class="d-flex align-items-center justify-content-center" style="border-radius:50%;background:#dcdcdc; height: 5em;width: 5em">
                    <img src="/img/briefcase1.png">
                </div>
            </div>
            <div class="col-3 px-3 pt-3">
                <input type="text" class="client-input p-2 font-weight-bold" placeholder="Entreprise Nom" name="nom_entreprise">
            </div>
        </div>
        <div class="row pb-5" style="margin-left: 8rem">
            <div class="col-md pl-1">
                <span class="font-weight-bold text-danger">Nombre de dossier</span>
            </div>
            <div class="col-md-3 mr-4">
                <img src="img/red-plus.svg" alt=""/>
                <span class="text-danger">Ajouter accès</span>
            </div>
        </div>
        <div class="row" style="margin-left: 8rem">
            <div class="col-md p-0">
                <div class="" >
                    <label class="addressdeplacement font-weight-bold">Adresse</label> <br>
                    <input type="text" class="client-input-nb pt-2" placeholder="tapez votre adresse ici..." name="adresse">
                </div>
            </div>

            <div class="col-md p-0">
                <div class="" >
                    <input type="text" class="client-input-nb font-weight-bold" placeholder="Nom de contact 01" name="nom_contact">
                </div>
                <div class="">
                    <label for="" class="pt-3 font-weight-bold">Tél</label>
                    <input type="text" class="client-input-nb pl-3" placeholder="Tapez votre numero" name="tel_contact">

                </div>
                <div class="">
                    <label for="" class="pt-2 font-weight-bold">Mail</label>
                    <input type="text" class="client-input-nb pl-2" placeholder="Tapez votre email" name="mail_contact">

                </div>
            </div>
            <div class="col-md p-0">
                <div class="" >
                    <input type="text" class="client-input-nb font-weight-bold" placeholder="Contact principal" name="nom_contact_principal">
                </div>
                <div class="">
                    <label for="" class="pt-3 font-weight-bold">Tél</label>
                    <input type="text" class="client-input-nb pl-3" placeholder="Tapez votre numero" name="tel_contact_principal">

                </div>
                <div class="">
                    <label for="" class="pt-2 font-weight-bold">Mail</label>
                    <input type="text" class="client-input-nb pl-2" placeholder="Tapez votre email" name="mail_contact_principal">

                </div>
            </div>
            <div class="col-md p-0">
                <div class="" >
                    <input type="text" class="client-input-nb font-weight-bold" placeholder="Dossier lier" name="Nomdossier">
                </div>
                <div class="">
                    <input type="text" class="client-input-nb pt-3" placeholder="numero du dossier" name="dossier_lier">
                </div>
            </div>
        </div>
        <div class="row" style="margin-left: 8rem">
            <div class="col-3 p-0 mt-4">
                <input type="text" class="client-input py-1 px-3 mb-2" id="inlineFormInput" placeholder="#tag words">
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-4 offset-8 d-flex justify-content-between">
                <button type="submit" class="button-save"><img src="/img/save.png" height="13px" width="13px"/><span class="pl-2">Enregistrer</span></button>
                <a class="button-supprimer1 slide_up"><img src="/img/trash.png" height="13px" width="13px"/><span class="pl-2">Supprimer</span></a>
            </div>
        </div>
    </div>
</form>
<div class="container" style="width: 97%">
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

<br>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('../css/clientcompte.css') }}">
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('../js/menuselector.js') }}"></script>
<script src="{{ asset('../js/notyetconfig.js') }}"></script>
<script>
    $(".slide_down").click(function(){
        $("#client_account_create").slideDown("slow");
    });
    $(".slide_up").click(function(){
        $("#client_account_create").slideUp("slow");
    });
</script>
@endsection
