@extends('layouts.app')

@section('content')
    <div class="client-menu">
        <ul class="ulclient d-flex">
            <li class="licontact"><a class="acontact" href="#">Contact</a></li>
            <li class="licompte"><a class="acontact" href="{{url('../clientcomptes')}}">Compte</a></li>
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
                    <option value="0">Type du Compte</option>
                    <option value="Particulier">Particulier</option>
                    <option value="societe">Société</option>
                    <option value="Famille">Famille</option>
                    <option value="OrganisationG">Organisation Gouvernementale</option>
                    <option value="OrganisationNG">Organisation Non Gouvernementale</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-outline-white"><img src="img/search.svg"></button>
            </div>
        </div>
    </form>
    <br>
    <a class="button button5 slide_down"><img src="/img/plus.png" height="12px" width="12px"> Ajouter Nouveau</a>
    <button class="buttonx1 button-supprimer1" class="btn btn-default btn-lg"><img src="/img/trash.png" height="12px" width="12px" style="margin-top: -5px"> Supprimer la Selection</button>

    <br><br><br>
    <!--Create client account form-->
<br>
    <div class="accordion" id="accordionExample">

    </div>
    <div class="grid grid-cols-5 mb-4">
        <div class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">Nom & Prénom</div>
        <div class="py-3.5 px-3 text-center text-sm font-semibold text-gray-900">Ville</div>
        <div class="py-3.5 px-3 text-center text-sm font-semibold text-gray-900">Tél</div>
        <div class="py-3.5 px-3 text-center text-sm font-semibold text-gray-900">Mail</div>
        <div class="py-3.5 px-3 text-center text-sm font-semibold text-gray-900">Nombre de Dossier</div>
    </div>


    <div class="grid grid-cols-5">
        <div class="collapse col-span-5 mb-4" id="collapseExample">
            <div class="block p-3.5 rounded-lg shadow-lg bg-white">
                <form id="client_account_create" action="{{ route('clientcontacts.store') }}" method="POST">
                    @csrf
                    <div class="container bg-white">
                        <div class="pt-1">
                            <input type="checkbox" name="checkbox"/>
                        </div>
                        <div class="flex justify-start px-5">
                            <div class=" align-items-center justify-content-center" style="border-radius:50%;background:#dcdcdc; height: 5em;width: 5em">
                                <img src="/img/profile.svg">
                            </div>
                            <div class=" items-center px-5 py-2.5">
                                <input type="text" id="full_name" class="block p-2 pl-10 w-64 text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-black focus:border-black" placeholder="Nom Complet">
                                <div class="col-md pl-1 pt-1">
                                    <span class="font-weight-bold text-red-500 ">Nombre de Dossier</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-4 gap-4 ml-32 py-5">
                            <div class=" p-0">
                                <div class="" >
                                    <label class="addressdeplacement font-weight-bold">Adresse</label>
                                    <input type="text" name="adresse" id="adresse" class="block w-full pl-0 border-0 border-b border-transparent focus:border-indigo-600 focus:ring-0 sm:text-sm" placeholder="Tapez Votre Adresse Ici...">
                                </div>
                            </div>
                            <div class="p-0">
                                <div class="">
                                    <label for="" class="font-weight-bold">E-mail</label>
                                    <input type="text" name="mail_contact_principal" id="mail_contact_principal" class="block w-full pl-0 border-0 border-b border-transparent focus:border-indigo-600 focus:ring-0 sm:text-sm" placeholder="Tapez Votre Email">
                                </div>
                            </div>
                            <div class="p-0">
                                <div class="">
                                    <label for="" class="font-weight-bold">Tél</label>
                                    <input type="text" name="tel_contact" id="tel_contact" class="block w-full pl-0 border-0 border-b border-transparent focus:border-indigo-600 focus:ring-0 sm:text-sm" placeholder="Tapez Votre Numero">
                                </div>
                            </div>
                            <div class=" p-0">
                                <div class="">
                                    <label for="" class="font-weight-bold">Dossiers Liés</label>
                                    <input type="text" name="dossier_lier" id="dossier_lier" class="block w-full pl-0 border-0 border-b border-transparent focus:border-indigo-600 focus:ring-0 sm:text-sm" placeholder="Numero du Dossier">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between pb-3 ml-32">
                            <div class="col py-3 mt-4">
                                <input type="text" class="client-input py-1 px-3 mb-2" id="inlineFormInput" placeholder="#Tag Words">
                            </div>
                            <div class="px-14 py-3 mt-4">
                                {{--<button type="submit" class="button-save mr-3"><span class="pl-2"></span></button>
                                <a class="button-supprimer1 slide_up mr-3"><span class="pl-2">Supprimer</span></a>--}}
                                <button class="inline-flex items-center rounded border border-transparent bg-gray-300 px-5 py-2 text-base font-medium text-black shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <img src="/img/save.png" class="w-4 h-4 mr-2"/>
                                    Enregistrer
                                </button>
                                <button class="inline-flex items-center rounded border border-transparent bg-red-600 px-5 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <img src="/img/trash.png" class="w-4 h-4 mr-2"/>
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-span-5 mb-4 rounded-lg bg-white shadow-2xl">
            <div class="flex justify-start accordion-header mb-0" id="headingOne">
                <div class="relative flex items-center py-2 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" >
                    <input type="checkbox" name="checkbox" class="mr-2"/>
                </div>
                <div class="relative py-2 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <div class="grid grid-cols-5 gap-16">
                        <div class="py-3.5 pl-4 pr-3 text-left text-base font-normal text-gray-900 sm:pl-6 md:pl-0">
                            Nom & Prénom
                        </div>
                        <div class="py-3.5 px-3 text-center font-normal text-gray-900">Marrakech</div>
                        <div class="py-3.5 px-3 text-center font-normal text-gray-900">+212 667 123 465</div>
                        <div class="py-3.5 px-3 text-center font-normal text-gray-900">Nom.prénom@gmail.com</div>
                        <div class="py-3.5 px-3 text-center font-normal text-gray-900">08</div>
                    </div>
                </div>
            </div>

            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body py-4 px-5">
                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                    until the collapse plugin adds the appropriate classes that we use to style each
                    element. These classes control the overall appearance, as well as the showing and
                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                    our default variables. It's also worth noting that just about any HTML can go within
                    the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
            <div class="flex justify-end space-x-2 p-4">
                <button class="inline-flex items-center rounded border border-transparent bg-black px-5 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Vue
                </button>
                <button class="inline-flex items-center rounded border border-gray-500 px-5 py-2 text-base font-medium text-black shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Editer
                </button>
                <button class="inline-flex items-center rounded border border-transparent bg-red-600 px-5 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <img src="/img/trash.png" class="w-4 h-4 mr-2">
                    Supprimer
                </button>
            </div>
        </div>
        <div class="col-span-5 mb-4 rounded-lg bg-white shadow-2xl">
            <div class="accordion-header mb-0" id="headingTwo">
                <div class="collapsed
                            relative
                            flex
                            items-center
                            w-full
                            py-4
                            px-5
                            text-base text-gray-800 text-left
                            bg-white
                            border-0
                            rounded-none
                            transition
                            focus:outline-none
                     " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Accordion Item #2
                </div>
            </div>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body py-4 px-5">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                    until the collapse plugin adds the appropriate classes that we use to style each
                    element. These classes control the overall appearance, as well as the showing and
                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                    our default variables. It's also worth noting that just about any HTML can go within
                    the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
    </div>
<div class="container">
	<table class="table table-borderless">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Nom & Prénom</th>
				<th scope="col">Ville</th>
				<th scope="col">Tél</th>
				<th scope="col">Mail</th>
				<th scope="col">Nombre de Dossier</th>
			</tr>
		</thead>
		<tbody>
        @foreach($clientcontacts as $clientcontact)
			<tr>
				<td height="20" colspan="2"></td>
			</tr>

			<tr class="shadowrow">
				<td><input type="checkbox" name="checkbox"/></td>
				<td>{{$clientcontact->nom_contact}}</td>
				<td>{{$clientcontact->ville}}</td>
				<td>{{$clientcontact->tel}}</td>
				<td style="width: 400px">{{$clientcontact->mail}}<br> <button onclick="showMessage()" class="buttonx button-vue" class="btn btn-default btn-lg">  <img src="/img/eye2.png" height="15px" width="15px" style="margin-top: -3px"/> Vue</button>
				<button class="buttonx button-editer" onclick="window.location='{{ url('clientcontacts/'.$clientcontact->id.'/edit') }}'" class="btn btn-default btn-lg">  <img src="/img/edit.png" height="15px" width="15px" style="margin-top: -3px"/> Editer</button></td>
				<td style="width: 200px">{{$clientcontact->dossier_lier}}<br>
				    <form action="{{ url('clientcontacts/'.$clientcontact->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="buttonx button-supprimer" class="btn btn-default btn-lg">  <img src="/img/trash.png" height="15px" width="15px" style="margin-top: -3px"/> Supprimer</button>
                    </form>
                </td>
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
<script src="{{ asset('../js/menuselector.js') }}"></script>
<script src="{{ asset('../js/notyetconfig.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(".slide_down").click(function(){
        $("#client_account_create").slideDown("slow");
    });
    $(".slide_up").click(function(){
        $("#client_account_create").slideUp("slow");
    });
</script>
@endsection
