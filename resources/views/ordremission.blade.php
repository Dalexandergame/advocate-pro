@extends('layouts.app')
@section('content')
<div class="container-xl">
<button class="button button3" class="btn btn-default btn-lg"><span class="fa fa-plus"></span>Ajouter nouveau</button>
<button class="button button2"> <span class="fa fa-edit"></span> Editer</button>
<button class="button button1"><i class="fa fa-trash"></i> Supprimer en selection</button>
<br>

<select class="form-select filordre" aria-label="Default select example">
  <option selected>Selection filtre</option>
  <option value="1">Mes ordres de missions</option>
  <option value="2">Voir tous</option>
</select>
</div>

<div class="container-xl">

    <div class="table-responsive">

        <div class="table-wrapper">

            <table class="table table-striped table-hover">

                <thead>
                    <tr>
                      <th><h4>Titre d&#180;ordre de mission</h4></th>
                    </tr>
                    <tr>
                        <th>Description</th>

                        <th>Destination</th>

                        <th>Utilisateur en charge</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td><p class="infos">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam consectetur adipiscing elit, sed do eiusmod tempor ipsum dolor sit amet.</p>

                          <br>

                          <p class="tmpMission"><img src="img/debutMission.svg"> Dec 19 (Date de debut de mission)
                          <br>
                          <img src="img/finMission.svg"> jusqu&#180;au 30 Dec (Date de fin de mission)</p>

                          <br>

                           <p class="cout">Co&#251;t de mission<br>
                           <span class="prix">1000 Dhs</span>
                           </p>

                           <p class="text-center pai">Reference de paiements</p>

                         </td>


                        <td><p class="infos">Zone industrielle, Sidi Ghanem Num 292, bureau 1 et 2, 400000 Marrakech</p>

                          <br>
                          <br>
                          <br>
                          <br>

                          <button class="button0 button4" class="btn btn-default btn-lg">Accepter</button>
                          <button class="button0 button5">Refuser</button>

                        </td>

                        <td><img class="img-circle" src="img/profile.svg">

                          <br>
                          <br>
                          <br>
                          <br>

                          <button class="button0 button6">Mettre en attente</button>

                        </td>
                    </tr>

                </tbody>

            </table>



        </div>

    </div>

</div>
@endsection

@section('styles')
    <link href="{{ asset('css/ordremission.css') }}" rel="stylesheet">
@endsection
