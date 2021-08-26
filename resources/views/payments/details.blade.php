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
            background-color:gray;
            
        }
    </style>

</head>
<body>
<!-- view payment details Modal -->

        <div class="user-infos">
          <h5>Utilisateur en charge</h5>
          <br>
        <div id="mission_user_name" class="user-label">{{$paidMission->getUsers->name}}</div>
        <div class="user-label">Tel <span> {{$paidMission->getUsers->phone}}</span> </div>
        <div class="user-label">Mail <span>{{$paidMission->getUsers->email}}</span> </div>
        <br>
        <br>
        <br>
        <div style="font-family: Gotham;font-style: normal;font-weight: normal;font-size: 12px;line-height: 14px;color: #333333;"> Marrakech le: {{date('Y/m/d h:i A')}}</div>
        </div>
        
        <div class="add-form">
            < class="form-back">
              <br>
              <div id="mission_title" class="f-label">{{$paidMission->titre}}</div>
            
              <br>
              <div class="f-label">Description de la mission</div>
              <div class="pl-5 mt-2">{{$paidMission->description}}</div>

              <br>
              <div class="d-flex d-flex justify-content-between">
                <div>
                  <div class="f-label">Destination</div>
                  <div class="pl-5 mt-2">{{$paidMission->destination}}</div>
                </div>
                <div class="f-label mr-5"><span>Cout de mission</span><br><span id="mission_price" class="prix text-danger">{{$paidMission->price}}</span><span>DH</span></div>
              </div>

              

            <br><p class="tmpMission"><img src="{{ url('img/debutMission.svg') }}"> {{$paidMission->datecreation->format('F j Y')}} (Date de debut de mission)
            <br>
            <img src="{{ url('img/finMission.svg') }}">  <span style="color: #989898;">  {{$paidMission->dateecheance->format('F j Y')}} (Date de fin de mission)</span></p>


              <div class="d-flex justify-content-between mt-1">
                <div class="f-label">État</div>
                <div class="p-2" style="margin-right: 10rem">{{ $paidMission->status }}</div>
              </div>
              <br>

        
            </div>
        </div>

 <!-- Scripts -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function() {
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
     </div>
 </body>
 