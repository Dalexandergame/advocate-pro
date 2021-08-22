<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AdvocatePRO') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/taches.css') }}" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color:gray;
            
        }
    </style>

</head>
<body>

  <!-- Edit Modal -->


    <div class="modal-content" style="width: 796px; height: 820px; margin-left: 400px;">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.href='{{url()->previous() }}'">
         <span aria-hidden="true"  style="font-size: 50px;">&times;</span>
        </button>

            <div class="user-infos">
              <h5>Utilisateur en charge</h5>
              <br>
            <div class="user-label">Nom d'utilisateur: {{$data->getUsers['name']}}</div>
            <div class="user-label">Tel: <span>{{$data->getUsers['phone']}}</span> </div>
            <div class="user-label">Mail: <span>{{$data->getUsers['email']}}</span> </div>

            <br><br>

              <div id="infosuser">
              <h5>Utilisateur assigner</h5>
              <br>

              <button class="buttonu" id="btnx" style="color:red;"><div style="width:160px;display: inline-block;"></div>x</button>
              
            <div class="user-label">Nom d'utilisateur: {{$data->assignedUsers['name']}}</div>
            <div class="user-label">Tel: <span>{{$data->assignedUsers['phone']}}</span> </div>
            <div class="user-label">Mail: <span>{{$data->assignedUsers['email']}}</span> </div>
              </div>

            <br><br><br>
            <div style="font-family: Gotham;font-style: normal;font-weight: normal;font-size: 12px;line-height: 14px;color: #333333;"> date de modification ({{date('d/m/Y')}})</div>
            </div>
            
        <div class="add-form">
         

          <div class="form-back">
           <form action="{{ url('./taches-details/update', $data->id) }}" method="POST">
            {{ csrf_field() }}
             {{ method_field('PUT') }}

             <label  class="f-label" for="type">Type</label>
             <br>
            <select class="f-input" id="typetache"  type="text" name="type" aria-label="Default select example" style="height: 28px;width: 159px;" >
                      <option id="{{ $data['type'] }}" value="{{ $data['type'] }}">{{ $data['type'] }}</option>
                      <option id="tache bureau" value="tache bureau">tache bureau</option>
                      <option id="rendez-vous" value="rendez-vous">rendez-vous</option>
                      <option id="audiance" value="audiance">audiance</option>
                      </select>

            <br><br>

            <div id="tachesimple_input" style="display:none;">
            <label class="f-label" for="dateecheance">Date & heur d’échéance</label>
            <br>
            <input class="f-input" type="text" name="dateecheance" placeholder="Date d’échéance de la tâche" onfocus="(this.type='datetime-local')" style="height: 28px;width: 180;" value="{{ $data['dateecheance'] }}">
            </div>
            <div id="audiance_input" style="display:none;">
            <label class="f-label" for="dateecheance">Date & heur d’audiance</label>
            <br>
            <input class="f-input" type="text" name="dateaudiance" placeholder="Date de la prochaine audiance" onfocus="(this.type='datetime-local')" style="height: 28px;width: 180;" value="{{ $data['dateaudiance'] }}">
            <br><br>
            <label class="f-label" for="file_number">Numero du dossier juridique</label>
            <br>
            <input class="f-input" type="text" name="file_number" placeholder="saisir le numero du dossier" style="height: 28px;width: 180;" value="{{ $data['dossier_num'] }}">
            </div>

            <br>

            <label class="f-label" for="titre">Titre de la tâche</label>
            <br>
            <input class="f-input" type="text" name="titre" placeholder="Tapez votre titre ici ..." style="height: 43px;width: 350px;"  value="{{ $data['titre'] }}">
            <br><br>
            <label  class="f-label" for="description">Description de la tâche</label>
            <br>
            <textarea class="f-input" type="text"  name="description" placeholder="Tapez votre texte ici ..." style="height: 135px;width: 350px;" ><?php echo htmlspecialchars($data->description); ?></textarea>

            <button class="buttonu" type="button" id="formButton"><img class="tprof" src="{{url ('img/roundplus.svg') }}"/>Réassigner la tâche</button>

            <br><br>
            
            <label  class="f-label" for="description" style="display:none;" id="userlab">Choisir un utilisateur</label>
            <br>
            <select class="f-input" style="display:none;" id="selectUser" type="text" name="assigned_user_id" aria-label="Default select example" style="height: 28px;width: 159px;" required>
                           <option  value="{{ $data['assigned_user_id'] }}">{{ $data->assignedUsers['name'] }}</option>
                      @foreach($users as $user)
                           <option value = "{{$user->id}}">{{$user->name}}</option>
                      @endforeach
            </select>

          <br><br>
          <button class="buttone" style="margin-right:15px;" class="btn btn-default btn-lg"> Enregister</button>
          </form> 
           
        </div>
</form>
        </div>
  
   </div>


 <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
  $("#formButton").click(function() {
    $("#selectUser").toggle();
    $("#userlab").toggle();
    $("#formButton").toggle();
    $("#infosuser").toggle();
    $("#btnx").toggle();
  });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
  $("#btnx").click(function() {
    $("#infosuser").toggle();
    $("#btnx").toggle();
    $("#selectUser").toggle();
    $("#userlab").toggle();
    $("#formButton").toggle();
  });
});
</script>
 <script type="text/javascript">
     $(function () {
  $("#typetache").change(function() {
     if ($("#tache").is(":selected")) {

        $("#tachesimple_input").show();
        $("#audiance_input").hide();
    }
    else if ($("#audiance").is(":selected")) {
        $("#audiance_input").show();
        $("#tachesimple_input").hide();
    }
    else if ($("#rendez-vous").is(":selected")) {

        $("#tachesimple_input").show();
        $("#audiance_input").hide();
    }
   }).trigger('change');
});
</script>
</body>
