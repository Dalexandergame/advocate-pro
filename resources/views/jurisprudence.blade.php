@extends('layouts.app')
@section('content')
<div class="full">
    <div class="menu">
        <table style="width:50%">
        <tr>
         <th><h1>Interne</h1></th>
         <th><h1>Advocate Pro</h1></th>
         <th><h1>Externe</h1></th>
         </tr>
        </table>
    </div>   
    <div class="form-group row">
        <div class="box1">
            <input type="text" class="form-control" placeholder="# Recherche par tagwords">
        </div>
        <div class="box2">
             <input type="text" class="form-control" placeholder="Nom ou numero du dossier">
        </div>
        <div class="box3">
             <input type="text" class="form-control" placeholder="Date du jugement">
        </div>
        <div class="box4">
             <input type="text" class="form-control" placeholder="Type du dossier">
        </div>
        <div class="boxsearch">
            <button type="button" class="btn btn-dark">
                <img src="/img/search.png" height="22px" width="22px" />
            </button>
        </div>
    </div>
    <div class="form-group row">
        <div class="impo">
            <button type="button" id="impo">Importer Jurisprudence</button>
        </div>
        <div class="expo">
            <button type="button" id="expo">Exporter la selection</button>
        </div>
        <div class="del">
            <button type="button" id="del">Supprimer la selection</button>
        </div>
    </div>
    <div class="file">
        <table class="table custom-table">
            <thread>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nom du dossier</th>
                    <th scope="col">N° dossier</th>
                    <th scope="col">Type du contentieux</th>
                    <th scope="col">Avocate en charge</th>
                    <th scope="col">Date</th>
                    <th scope="col">Résultat final</th>
                </tr>
            </thread>
            <tbody>
                <tr scope="row">
                    <th scope="row">
                        <input type="checkbox">
                    </th>
                    <td>Nom du dossier</td>
                    <td>Numero du dossier</td>
                    <td>Contentieux fiscal</td>
                    <td>Nom d'avocate</td>
                    <td>05/03/2017</td>
                    <td>gagner</td>
                </tr>
                <tr scope="row">
                    <th scope="col"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="form-group row">
                            <div class="vue">
                                            <button type="button" id="vue">vue</button>
                            </div>
                            <div class="tele">
                                            <button type="button" id="tele">telecharger</button>
                            </div>
                    </td>
                </tr>
                <tr class="spacer">
                    <td colspan="300"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
