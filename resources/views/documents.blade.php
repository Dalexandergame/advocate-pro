@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/documents.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-flex px-3">
        <a href="#" class="text-dark text-decoration-none px-4 py-2">Mes documents</a>
        <a href="#" class="text-dark text-decoration-none px-4 py-2">Doccuments interne</a>
    </div>
    <div class="btn-wrapper d-flex pt-3">
        <button class="move-btn">
            <img src="img/move.svg"/>
            <span class="pl-2">Deplacer dossier</span>
        </button>
        <button class="download-btn">
            <img src="img/download.svg"/>
            <span class="pl-2">Telecharger la selection</span>
        </button>
        <button class="plus-btn btn-dark">
            <img src="img/plus.svg"/>
            <span class="pl-2">Ajouter nouveau</span>
        </button>
        <button class="trash-btn btn-danger">
            <img src="img/trash.svg"/>
            <span class="pl-2">Supprimer la selection</span>
        </button>
    </div>

    <div class="d-flex mt-5 pl-4">
        <div class="mr-3">
            <div class="d-flex box bg-white my-3 p-3">
                <div class="form-check pr-5">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
                <div class="pr-3"><img src="img/folder.svg"/></div>
                <div class="pr-5">
                    <h5 class=" m-0 font-weight-bold">Admin</h5>
                    <span>01 Fichiers</span>
                </div>
            </div>
            <div class="d-flex box bg-white my-3 p-3">
                <div class="form-check pr-5">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
                <div class="pr-3"><img src="img/folder.svg"/></div>
                <div class="pr-5">
                    <h5 class=" m-0 font-weight-bold">Categories</h5>
                    <span>11 Fichiers</span>
                </div>
            </div>
            <div class="d-flex box bg-white my-3 p-3">
                <div class="form-check pr-5">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
                <div class="pr-3"><img src="img/folder.svg"/></div>
                <div class="pr-5">
                    <h5 class=" m-0 font-weight-bold">Doccuments</h5>
                    <span>02 Fichiers</span>
                </div>
            </div>
            <div class="d-flex box bg-white my-3 p-3">
                <div class="form-check pr-5">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
                <div class="pr-3"><img src="img/folder.svg"/></div>
                <div class="pr-5">
                    <h5 class=" m-0 font-weight-bold">Listings</h5>
                    <span>05 Fichiers</span>
                </div>
            </div>
            <div class="d-flex box bg-white my-3 p-3">
                <div class="form-check pr-5">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
                <div class="pr-3"><img src="img/folder.svg"/></div>
                <div class="pr-5">
                    <h5 class=" m-0 font-weight-bold">Settings</h5>
                    <span>11 Fichiers</span>
                </div>
            </div>
            <div class="d-flex box bg-white my-3 p-3">
                <div class="form-check pr-5">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
                <div class="pr-3"><img src="img/folder.svg"/></div>
                <div class="pr-5">
                    <h5 class=" m-0 font-weight-bold">Users</h5>
                    <span>14 Fichier</span>
                </div>
            </div>

        </div>
        <div class="container mt-3 px-5 py-4" style="background-color: #F5F5F5;">
        <div class="row pb-3">
            <div class="col-2 box bg-dark"><
                <img class="mx-auto d-block pb-4" src="img/video.svg"/>
            </div>
            <div class="col">
                <h5 class=" m-0 font-weight-bold">Video titre</h5>
                <span>URL publique exemple</span>
                <div>
                    <span class="detail pr-5">Taille du doccument Mo</span>
                    <span class="detail pr-5">Proprietaire</span>
                    <span class="detail pr-5">Dernière modification 23/02/2020 23h20</span>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-2 box bg-white">
                <img class="mx-auto d-block my-4" src="img/docfile.svg">
            </div>
            <div class="col">
                <h5 class=" m-0 font-weight-bold">Doccument titre</h5>
                <span>URL publique exemple</span>
                <div>
                    <span class="detail pr-5">Taille du doccument Mo</span>
                    <span class="detail pr-5">Proprietaire</span>
                    <span class="detail pr-5">Dernière modification 23/02/2020 23h20</span>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-2 box bg-white">
                <img class="mx-auto d-block my-4" src="img/xlsfile.svg">
            </div>
            <div class="col">
                <h5 class=" m-0 font-weight-bold">Doccument titre</h5>
                <span>URL publique exemple</span>
                <div>
                    <span class="detail pr-5">Taille du doccument Mo</span>
                    <span class="detail pr-5">Proprietaire</span>
                    <span class="detail pr-5">Dernière modification 23/02/2020 23h20</span>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-2 box bg-white">
                <img class="mx-auto d-block my-4" src="img/imgfile.svg">
            </div>
            <div class="col">
                <h5 class=" m-0 font-weight-bold">Image titre</h5>
                <span>URL publique exemple</span>
                <div>
                    <span class="detail pr-5">Taille du doccument Mo</span>
                    <span class="detail pr-5">Proprietaire</span>
                    <span class="detail pr-5">Dernière modification 23/02/2020 23h20</span>
                </div>
            </div>
        </div>
        <div class="player box mt-4" style="height:21rem"></div>
        <div>
            <h5 class=" m-0 font-weight-bold">Video titre</h5>
            <span>URL publique exemple</span>
            <div>
                <span class="detail pr-5">Taille du doccument Mo</span>
                <span class="detail pr-5">Proprietaire</span>
                <span class="detail pr-5">Dernière modification 23/02/2020 23h20</span>
            </div>
        </div>

    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/menuselector.js') }}"></script>
@endsection
