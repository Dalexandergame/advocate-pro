@extends('layouts.app')
@section('content')

<div class="filter mx-4">
  <select class="p-3" onchange="window.location.href=this.options[this.selectedIndex].value;">
      <option value="{{ route('paymission') }}">ordres de missions</option>
      <option value="{{ route('paydossier') }}">Paiements des dossiers</option> 
      <option value="{{ route('refund') }}">Remboursements</option>
    </select>
</div>

<!-- table -->
<div class="container-xl">
@foreach($missions as $mission)
    <div class="table-responsive">
        <div class="table-wrapper">
            <table class="table table-striped table-borderless" id="dataTable">
                <thead>
                      <div class="titlem">{{$mission['titre']}}</div>
                      
                    <tr>
                        <th>Description</th>

                        <th>Destination</th>

                        <th></th>

                        <th>Utilisateur en charge</th>
                    </tr>

                </thead>

                <tbody>

                    <tr id="sid{{ $mission->id }}">
                        <td><p class="infos">{{$mission['description']}}</p></td>
                        <td><p class="infos">{{$mission['destination']}}</p></td>
                        <td></td>
                        <td><img class="img-circle" src="{{ url('img/profile.svg') }}"><p class="username"> {{$mission->getUsers['name']}}</p></td>
                    </tr>

                         <tr>
                          <td>

                          <br><p class="tmpMission"><img src="{{ url('img/debutMission.svg') }}"> {{$mission->datecreation->format('F j Y')}} (Date de debut de mission)
                          <br>
                          <img src="{{ url('img/finMission.svg') }}">  <span style="color: #989898;">  {{$mission->dateecheance->format('F j Y')}} (Date de fin de mission)</span></p>

                         </td>

                         <td><br><span class="mr-4 pai">Etat</span></div></td>

                         <td><br><span>En attente</span></td>

                    </tr>
                    <tr>
                      <td><p class="cout">Co&#251;t de mission<br>
                        <span class="prix">{{$mission['cout']}}Dhs</span>
                        </p>
                      </td>
                      <td></td>
                      <td></td>
                      <td><br><button id="{{$mission->id}}" class="paymentView ml-4 px-3 btn btn-dark" type="button" data-toggle="modal" data-target="#Modaladdmission"><img class="pr-2" src="{{url('img/eye2.png')}}" height="19" width="25" />vue</button></td>
                    </tr>

                </tbody>

            </table>

        </div>

</div>
@endforeach

<!-- view payment details Modal -->
<div class="modal fade" id="Modaladdmission" tabindex="-1" role="dialog" aria-labelledby="addMissionLabel" aria-hidden="false" data-backdrop="static">
  <div class="modal-dialog" role="document">   
    <div class="modal-content" style="width: 796px; height: 800px;">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"  style="font-size: 50px;">&times;</span>
          </button>
          <div class="user-infos">
            <h5>Utilisateur en charge</h5>
              <br>
            <div id="mission_user_name" class="user-label">Nom d'utilisateur</div>
            <div class="user-label">Tel <span id="mission_user_tel"> +212 600 137 564</span> </div>
            <div class="user-label">Mail <span id="mission_user_mail"> nom&prenom@gmail.com</span></div><br><br><br>
            <div style="font-family: Gotham;font-style: normal;font-weight: normal;font-size: 12px;line-height: 14px;color: #333333;"> Marrakech le: {{date('Y/m/d h:i A')}}</div>
          </div>

          <div class="add-form">  
            <form action="{{ route('Payments.choosePaymentMethod') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-back">
                <br>
                <div id="mission_title" class="f-label"></div>
              
                <br>
                <div class="f-label">Description de la mission</div>
                <div id="mission_description" class="pl-5 mt-2"></div>

                <br>
                <div class="d-flex d-flex justify-content-between">
                  <div>
                    <div class="f-label">Destination</div>
                    <div id="mission_destination" class="pl-5 mt-2"></div>
                  </div>
                  <div class="f-label mr-5"><span>Cout de mission</span><br><span id="mission_price" class="prix text-danger">1000</span><span>DH</span></div>
                </div>

                <div class="f-label">Date de création de la mission</div>
                <div id="mission_DC" class="pl-5 mt-2"></div>

                <div class="f-label">Date d’échéance</div>
                <div id="mission_DE" class="pl-5 mt-2"></div><br>

                <div class="d-flex justify-content-between">
                  <div class="f-label">Mode de paiement</div>
                  <div class="py-2" style="margin-right: 6.5rem">
                    <input type="radio" name="paymentMethod" value="Cheque" checked>Chèque</input><br><br>
                    <input type="radio" name="paymentMethod" value="Card">Virement banquaire</input><br><br>
                    <input type="radio" name="paymentMethod" value="Cash">Espèce</input>
                  </div>
                </div>
                <br>

                <div id="chequeLabel" class="d-flex justify-content-between" style="display: none">
                  <div class="f-label">Chèque</div>
                  <div class="py-1 mr-4">
                    <input type="number" name="cheque" placeholder="N° de série"style="height: 2rem; width:13rem"/><br>
                    <label for="cheque-input" class="add-catg py-1 mt-1">
                      <img class="pr-1" src="{{url('img/grey-plus.svg')}}"/>
                      <span class="">Ajouter une capture</span>
                    </label>
                    <input id="cheque-input" name="cheque" type="file" style="position: absolute;z-index: -10;" />
                  </div>
                </div>

                <div class="d-flex justify-content-between mt-1">
                  <div class="f-label">État</div>
                  <div class="p-2" style="margin-right: 10rem">En attente</div>
                </div>
                <br>

              </div>
              <br><br>
              <button class="buttone" id="submit" type="submit" class="btn btn-default btn-lg"> Enregister</button>
            </form> 
          </div>
        
        </div>
    </div>
  </div>
</div>

@endsection

@section('styles')
    <link href="{{ asset('css/ordremission.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $('input:radio[name="paymentMethod"]').change(function(){
        if($(this).val() != 'Cheque'){
          $("#chequeLabel").removeClass("d-flex").addClass("d-none");
        }
        else $("#chequeLabel").addClass("d-flex");
    });

    $('.paymentView').click(function(e){
      var mission_id = this.id
      console.log(mission_id);
      $.get('/payments/paymission/view-payment-details/'+mission_id,function(missionObj){
        //success
        console.log(missionObj);
        
          $('#mission_user_name').html(missionObj.user.name); 
          $('#mission_user_tel').html(missionObj.user.phone); 
          $('#mission_user_mail').html(missionObj.user.email); 
          $('#mission_title').html(missionObj.mission.titre);
          $('#mission_description').html(missionObj.mission.description);
          $('#mission_destination').html(missionObj.mission.destination);
          $('#mission_price').html(missionObj.mission.cout);
          $('#mission_DC').html(missionObj.mission.datecreation);  
          $('#mission_DE').html(missionObj.mission.dateecheance);
      
      });
    });
  });
</script>
@endsection