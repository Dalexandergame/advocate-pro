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
  <link href="{{ asset('/css/ordremission.css') }}" rel="stylesheet">
  <style>
    body {
      font-family: 'Nunito', sans-serif;
      background-color: gray;

    }
  </style>

</head>

<body>

  <!-- Edit Modal -->


  <div class="modal-content" style="width: 796px; height: 800px; margin-left: 400px;">

    <div class="modal-body">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close"
        onclick="window.location.href='{{ url('./ordre-de-mission') }}'">
        <span aria-hidden="true" style="font-size: 50px;">&times;</span>
      </button>

      <div class="user-infos">
        <h5>Utilisateur en charge</h5>
        <br>

        <button class="buttonu" id="btnx" style="color:red;">
          <div style="width:160px;display: inline-block;"></div>x
        </button>
        <div id="infosuser">
          <div class="user-label">Nom d'utilisateur: {{$mission->getUsers['name']}}</div>
          <div class="user-label">Tel: <span>{{$mission->getUsers['phone']}}</span> </div>
          <div class="user-label">Mail: <span>{{$mission->getUsers['email']}}</span> </div>
        </div>

        <br>
        <form action="{{ url('./ordre-de-mission/update', $mission->id) }}" method="POST" enctype="multipart/form-data"
          id="editForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}

          <button class="buttonu" type="button" id="formButton"><img class="tprof"
              src="{{ url('img/roundplus.svg') }}" /> Désigner autre utilisateur</button>
          <br><br>
          <label class="f-label" for="user_id" style="display:none;margin-left:0px;" id="userlab">Désigner un
            utilisateur</label>
          <br>
          <select class="f-input" style="display:none;height: 25px;width: 200px;margin-left:0px;" id="selectUser"
            type="text" name="user_id" aria-label="Default select example" required>
            <option value="{{$mission->getUsers['id']}}">{{$mission->getUsers['name']}}</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>


          <br><br><br>
          <div
            style="font-family: Gotham;font-style: normal;font-weight: normal;font-size: 12px;line-height: 14px;color: #333333;">
            date de modification ({{date('d/m/Y')}})</div>
      </div>

      <div class="add-form">


        <div class="form-back">
          <label class="f-label" for="titre">Titre de mission</label>
          <br>
          <input class="f-input" type="text" id="title" name="titre" style="height: 28px;"
            value="{{$mission['titre']}}">
          <br><br>
          <label class="f-label" for="description">Description de la mission</label>
          <br>
          <textarea class="f-input" type="text" id="description" name="description"
            style="height: 95px;"><?php echo htmlspecialchars($mission->description); ?></textarea>
          <br><br>
          <label class="f-label" for="destination">Destination</label>
          <br>
          <textarea class="f-input" type="text" id="destination" name="destination"
            style="width: 247px;height: 77px;"><?php echo htmlspecialchars($mission->destination); ?></textarea>
          <br><br>
          <label class="f-label" for="datecreation">
            <p class="tmpMission"><img
                src="{{ url('img/debutMission.svg') }}">{{$mission->datecreation->format('F j Y')}}(Date de debut de
              mission)</p>
          </label>
          <br>
          <label class="f-label" for="dateecheance">Date d’échéance</label>
          <br>
          <input class="f-input" type="text" id="dateecheance" name="dateecheance" onfocus="(this.type='date')"
            style="height: 28px;width: 200px;" value="{{$mission['dateecheance']->format('jFY')}}">
          <br><br>
          <label class="f-label" for="cout">Coût de mission en Dhs</label>
          <br>
          <input class="f-input prix" type="text" id="cout" name="cout" style="width: 225px;height: 40px; color: red;"
            value="{{$mission['cout']}}">
        </div>
        <br><br>
        <button class="buttone" class="btn btn-default btn-lg"> Enregister</button>

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
  });
});
</script>
 
</body>
