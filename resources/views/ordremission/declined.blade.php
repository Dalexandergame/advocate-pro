@extends('layouts.app')
@section('content')
<!-- add-edit-delete -->
<div class="container-xl">

<button class="button button1" id="deleteAllSelectedMissions"> <img src="{{ url('img/trash.svg') }}"> Supprimer en selection</button>


<!-- menu -->
<br>

 <div class="row menu ml-1 pt-4 ">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F2F2F2">
                <div class="container-fluid p-0">
                    <div class="navbar-nav sm-menu">
                        <a class="nav-link px-md-5" href="{{url('/ordre-de-mission/approved')}}">Accepter</a>
                        <a class="nav-link px-md-5 active"  href="{{url('/ordre-de-mission/declined')}}">Refuser</a>
                        <a class="nav-link px-md-5" href="{{url('/ordre-de-mission/attente')}}">En attente</a>
                        <a class="nav-link px-md-5" href="{{url('/ordre-de-mission')}}">Voir tout</a>
                    </div>
                </div>
            </nav>
        </div> 
</div>
<!-- table -->
<div class="container-xl">
@foreach($missions as $mission)
    <div class="table-responsive">
        <input type="checkbox" name="ids" class="checBoxClass" value="{{$mission['id']}}">
        <div class="table-wrapper">

            <table class="table table-striped table-borderless" id="dataTable">
                    <form action="{{ url('./ordre-de-mission/delete', $mission->id) }}" method="POST" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                      <button class="single-delete" onclick="return confirm('vous êtes sûr?')"><img src="{{ url('img/trash.svg') }}"></button>
                    </form>
                      <button class="single-edit edit_btn" onclick="window.location.href='{{ url('./ordre-de-mission/edit', $mission->id) }}'"><img src="{{ url('img/edit.svg') }}"></button>

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

                         <td><br><p class="text-center"><a class="pai" href="#">Reference de paiements</a></p></td>

                         <td></td>

                         <td><p class="cout">Co&#251;t de mission<br>
                           <span class="prix">{{$mission['cout']}}Dhs</span>
                           </p>
                         </td>

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