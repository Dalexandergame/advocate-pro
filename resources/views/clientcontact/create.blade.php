<@extends('layouts.app')

@section('content')

    <div class="client-menu">
        <ul class="ulclient">
            <li class="licompte"><a class="acontact" href="#">Contact</a></li>
            <li class="licontact"><a class="acontact" href="{{url('../clientcomptes')}}">Compte</a></li>
        </ul>
    </div>
    <br>

    <form class="ml-5">
        <div class="form-row align-items-center">
            <div class="col-3">
                <label class="form-control" for="inlineFormInput">tagwords</label>
                <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="#Recherche par tagwords">
            </div>
            <div class="col-3">
                <label class="form-control" for="inlineFormInput">Nametele</label>
                <input type="text" class="form-control mb-2" id="inlineFormInput"
                       placeholder="Recherche par nom ou telephone">
            </div>

            <div class="form-control">
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
                <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit"><img src="img/search.svg">
                </button>
            </div>
        </div>
    </form>
    <br>
    <button class="buttona button55" href="{{ url('/clientcontacts/create') }}" class="btn btn-default btn-lg"><img
            src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau
    </button>
    <a class="buttonx1 button-supprimer1" href="">
        <img src="/img/trash.png" height="13px" width="13px"/>
        <span>supprimer la selection</span>
    </a>

    <table class="table table-borderless">
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
    <div class="container">
        <div class="big-grid">
            <div class="row">
                <form action="{{ url('clientcontacts')}}" method="post">
                    {{ csrf_field()}}

                    <div class="form-column col-md">
                        <div class="col">
                            <input type="checkbox" name="checkbox"/>
                            <div><img src="/img/profile.png"></div>
                            <input type="text" class="form-control" placeholder="Contact Nom" name="nom_contact"">
                            <div class="nbrdossier"> Nombre de dossier</div>
                        </div>
                        <div class="col">
                            <label class="addressdeplacement">Adresse</label>
                            <input type="text" class="form-control" placeholder="tapez votre adresse ici..." name="adresse" style="border: none; border-color: transparent; outline: none; margin-left: 110px;">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="tagwords" name="tagwords" style="margin-left: 120px; margin-top: 50px;width: 250px;">
                        </div>
                    </div>

                    <div class="form-column">
                        <div class="col">
                            <span class="span1"><input type="text" class="form-control" placeholder="E-mail 1" name="mail" style="border: none; border-color: transparent; outline: none;width: 160px;"></span>
                        </div>
                        <div class="col">
                            <span class="span1"><input type="text" class="form-control" placeholder="Ville" name="ville"  style="border: none; border-color: transparent; outline: none;width: 160px;"></span>
                        </div>
                    </div>

                    <div class="form-column">
                        <div class="col">
                            <label class="">Tél</label>
                        </div>
                        <div class="col">
                            <span class="span1"><input type="text" class="form-control" placeholder="numero de telephone" name="tel" style="border: none; border-color: transparent; outline: none;width: 160px;"></span>
                        </div>
                    </div>

                    <div class="form-column">
                        <div class="col">
                            <label class="">Dossier lier</label>
                        </div>
                        <div class="col">
                            <span class="span1"><input type="text" class="form-control" placeholder="numero du dossier" name="dossier_lier" style="border: none; border-color: transparent; outline: none;width: 160px;"></span>
                        </div>
                    </div>
                    <button type="submit" name="enregistrer" value="enregistrer" class="buttonsave"><img
                            src="/img/save.png" height="13px" width="13px">enregitrer
                    </button>
                    <a class="button button3" href=""><img src="/img/trash.png" height="13px" width="13px" style="margin-top: -5px;margin-right: 5px">supprimer</a>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('../css/createclientcontact.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('../js/menuselector.js') }}"></script>
@endsection
