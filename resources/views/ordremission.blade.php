@extends('layouts.app')
@section('content')
<!-- add-edit-delete -->
<div class="container-xl">
<button class="button button3" type="button" data-toggle="modal" data-target="#Modaladdmission"> <img src="img/plus.svg"> Ajouter nouveau</button>
{{-- <button class="button button2" type="button" data-toggle="modal" data-target="#Modaledit"> <img src="img/edit.svg"> Editer</button> --}}
<button class="button button1" id="deleteAllSelectedMissions"> <img src="img/trash.svg"> Supprimer en selection</button>

<!-- Add Modal -->
<div class="modal fade" id="Modaladdmission" tabindex="-1" role="dialog" aria-labelledby="addMissionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">   
    <div class="modal-content" style="width: 796px; height: 800px;">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true"  style="font-size: 50px;">&times;</span>
        </button>
        <div class="user-infos">
          <h5>Utilisateur en charge</h5>
          <br>
        <div class="user-label">Nom d'utilisateur</div>
        <div class="user-label">Tel <span> +212 600 137 564</span> </div>
        <div class="user-label">Mail <span> nom&prenom@gmail.com</span> </div>
        <br>
        <br>
        <br>
        <div style="font-family: Gotham;font-style: normal;font-weight: normal;font-size: 12px;line-height: 14px;color: #333333;"> Marrakech le: {{date('Y/m/d h:i A')}}</div>
        </div>
        
        <div class="add-form">
          <form action="{{ url('ordre-de-mission') }}" method="POST">
            {{ csrf_field() }}
          <div class="form-back">
            <label class="f-label" for="titre">Titre de mission</label>
            <br>
            <input class="f-input" type="text" name="titre" placeholder="Titre ici ..." required>
            <br><br>
            <label  class="f-label" for="description">Description de la mission</label>
            <br>
            <textarea class="f-input" type="text"  name="description" placeholder="Description ici ..." style="height: 95px;" required></textarea>
            <br><br>
            <label class="f-label" for="destination">Destination</label>
            <br>
            <input class="f-input" type="text" name="destination" placeholder="Adresse ici ..."style="height: 65px;" required>
            <br><br>
            <label  class="f-label" for="date creation">Date de création de la mission</label>
            <br>
            <input class="f-input" type="text"  name="datecreation" placeholder="Date de création de la tâche" onfocus="(this.type='date')" style="height: 28px;width: 200px;" required>
            <br><br>
            <label class="f-label" for="date echeance">Date d’échéance</label>
            <br>
            <input class="f-input" type="text" name="dateecheance" placeholder="Date d’échéance" onfocus="(this.type='date')" style="height: 28px;width: 200px;" required>
            <br><br>
            <label  class="f-label" for="cout">Coût de mission</label>
            <br>
            <input class="f-input" type="text" name="cout" placeholder="Somme en Dhs" style="height: 28px;width: 200px;" required>
          </div>
          <br><br>
          <button class="buttone" class="btn btn-default btn-lg"> Enregister</button>
          </form> 
        </div>
        
        </div>
    </div>
  </div>
</div>


<!-- Edit Modal -->
 @foreach ($missions as  $mission)
<div class="modal fade" id="Modaledit" tabindex="-1" role="dialog" aria-labelledby="editArticleLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">   
    <div class="modal-content" style="width: 796px; height: 800px;">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true"  style="font-size: 50px;">&times;</span>
        </button>
        <div class="user-infos">
          <h5>Utilisateur en charge</h5>
          <br>
        <div class="user-label">Nom d'utilisateur</div>
        <div class="user-label">Tel <span> +212 600 137 564</span> </div>
        <div class="user-label">Mail <span> nom&prenom@gmail.com</span> </div>
        <br>
        <br>
        <br>
        <div style="font-family: Gotham;font-style: normal;font-weight: normal;font-size: 12px;line-height: 14px;color: #333333;"> Marrakech le: {{date('Y/m/d h:i A')}}</div>
        </div>
        
        <div class="add-form">
          <form action="{{ url('./ordre-de-mission/update', $mission->id) }}" method="POST" enctype="multipart/form-data" id="editForm">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

          <div class="form-back">
            <label class="f-label" for="titre">Titre de mission</label>
            <br>
            <input class="f-input" type="text" id="title" name="titre" value="{{$mission['titre']}}">
            <br><br>
            <label  class="f-label" for="description">Description de la mission</label>
            <br>
            <textarea class="f-input" type="text" id="description" name="description" style="height: 95px;"><?php echo htmlspecialchars($mission->description); ?></textarea>
            <br><br>
            <label class="f-label" for="destination">Destination</label>
            <br>
            <textarea class="f-input" type="text" id="destination" name="destination" style="width: 247px;height: 77px;"><?php echo htmlspecialchars($mission->destination); ?></textarea>
            <br><br>
            <label  class="f-label" for="datecreation"><p class="tmpMission"><img src="img/debutMission.svg">{{$mission->datecreation->format('F j Y')}}(Date de debut de mission)</p></label>
            <br>
            <label class="f-label" for="dateecheance">Date d’échéance</label>
            <br>
            <input class="f-input" type="text" id="dateecheance" name="dateecheance" onfocus="(this.type='date')" style="height: 28px;width: 200px;" value="{{$mission['dateecheance']->format('F j Y')}}">
            <br><br>
            <label  class="f-label" for="cout">Coût de mission en Dhs</label>
            <br>
            <input class="f-input prix" type="text" id="cout" name="cout" style="width: 225px;height: 40px; color: red;" value="{{$mission['cout']}}">
          </div>
          <br><br>
          <button class="buttone" class="btn btn-default btn-lg"> Enregister</button>
          </form> 
        </div>
        </div>
    </div>
  </div>
</div>
  @endforeach

<!-- menu -->
<br>
<select class="form-select filordre" aria-label="Default select example">
  <option selected>Selection filtre</option>
  <option value="1">Mes ordres de missions</option>
  <option value="2">Voir tous</option>
</select>
</div>

<!-- table -->
<div class="container-xl">
@foreach($missions as $mission)
    <div class="table-responsive">
        <input type="checkbox" name="ids" class="checBoxClass" value="{{$mission['id']}}">
        <div class="table-wrapper">

            <table class="table table-striped table-borderless" id="dataTable">
                    <form action="{{ url('./ordre-de-mission/delete', $mission->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                      <button class="single-delete"><img src="img/trash.svg"></button>
                    </form>
                      <button class="single-edit edit_btn" type="button" data-toggle="modal" data-target="#Modaledit" data-id="{{$mission['id']}}"><img src="img/edit.svg"></button>

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
                        <td><img class="img-circle" src="img/profile.svg"></td>
                    </tr>

                         <tr>
                          <td>

                          <p class="tmpMission"><img src="img/debutMission.svg"> {{$mission->datecreation->format('F j Y')}} (Date de debut de mission)
                          <br>
                          <img src="img/finMission.svg">  <span style="color: #989898;">  {{$mission->dateecheance->format('F j Y')}} (Date de fin de mission)</span></p>

                          <br>

                           <p class="cout">Co&#251;t de mission<br>
                           <span class="prix">{{$mission['cout']}} Dhs</span>
                           </p>
                            <p class="text-center pai">Reference de paiements</p>

                         </td>

                         <td><div class="block1"></div><button class="button0 button4" class="btn btn-default btn-lg">Accepter</button></td>
                         <td><div class="block1"></div><button class="button0 button5">Refuser</button></td>
                         <td><div class="block1"></div><button class="button0 button6">Mettre en attente</button></td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>
@endforeach
</div>
@endsection

@section('styles')
    <link href="{{ asset('css/ordremission.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
{{-- <script type="text/javascript">
  $(document).ready(function(){
    var table = $('#dataTable').DataTable();

    //display Edit Modal
    $('.edit_btn').on('click', function(){
        

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
           }).get();

            console.log(data);

            $('#titre').val(data[1]);
            $('#description').val(data[2]);
            $('#destination').val(data[3]);
            $('#dateecheance').val(data[4]);
            $('#cout').val(data[5]);
        
            $('#editForm').attr('action', '/ordre-de-mission/update' + data[0]);
            $('#Modaledit').modal('show');
    })
    
});
</script>
<script>

$(document).ready(function () {

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

$('body').on('click', '#submit', function (event) {
    event.preventDefault()
    var id = $("#id").val();
    var titre = $("#titre").val();
   
    $.ajax({
      url: '/ordre-de-mission/update/' + id,
      type: "POST",
      data: {
        id: id,
        titre: titre,
      },
      dataType: 'json',
      success: function (data) {
          
          $('#editForm').trigger("reset");
          $('#Modaledit').modal('hide');
          window.location.reload(true);
      }
  });
});

$('body').on('click', '.edit_btn', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    console.log(id)
    $.get('/ordre-de-mission/update/' + id , function (data) {
         $('#submit').val("Edit mission");
         $('#Modaledit').modal('show');
         $('#id').val(data.data.id);
         $('#titre').val(data.data.titre);
     })
});

}); 
</script> --}}
<script type="text/javascript">
  $(function(e){


  $('#deleteAllSelectedMissions').click(function(e){
    e.preventDefault();
    var allids =[];
    $("input:checkbox[name=ids]:checked").each(function(){
      allids.push($(this).val());
    });

    $.ajax({
      url: './ordre-de-mission/deleteAll',
      type: "DELETE",
      data: {
        ids: allids,
        _token:$("input[name=_token]").val()
      },
      success: function (data) {
                location.reload();
            },

            error: function (data) {
                alert(data);
            }

  });
  });
  });
</script>
@endsection