@extends('layouts.app')
@section('content')

<!-- menu -->
<div class="container-xl">

  <div style="width:320px; display: inline-block;"><form action="{{ url('calendrier/filteradmin') }}" method="GET">
      {{csrf_field()}}
<select  type="search" name="search" class="form-select filordre pl-2 rounded" aria-label="Default select example"  onchange="this.form.submit()">
  <option disabled selected>Selection Filtre Cabinet</option>
  <option value="admin">Utilisateur</option>
  <option value="all">Cabinet</option>
</select>
   </form>
 </div>

<select class="form-select filordre pl-2 rounded" aria-label="Default select example">
  <option selected>Selection Filtre</option>
  <option value="1">Tâches</option>
  <option value="2">Audiences</option>
  <option value="3">Rendez Vous</option>
  <option value="4">Tous</option>
</select>

   <div style="width:320px; display: inline-block;">
    <form action="{{ url('calendrier/search') }}" method="GET">
      {{csrf_field()}}
      <div class="input-group custom-search-form">
        <select type="search" name="search" class="form-control input-search" placeholder="Nom d’étulisateur"  onchange="this.form.submit()">
          <option disabled selected>Selection Filtre Utilisateur</option>
           @foreach($users as $user)
           <option value="{{ $user->name }}">{{ $user->name }}</option>
           @endforeach
        </select>
        {{-- <span class="input-group-btn" style="margin-left:2px;">
          <button type="submit" class="btn btn-default-sm">
            <img src="{{url('img/search.svg')}}">
          </button>
        </span> --}}
      </div>
     </form>
    </div>
    
  


  {{-- <table class="table table-borderless pull-right" style=" width:932px;">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($taches as $tache)
      <tr class="user-search">
        <td><img class="profile-img" src="{{url('img/profile.svg')}}"/></td>
        <td><span class="infos-av">{{ $tache->getUsers['name'] }}</span><br>
          <span class="infos-av">Tel: <span style="color: #989898;">{{ $tache->getUsers['num_tel'] }}</span></span><br>
          <span class="infos-av">Mail: <span style="color: #989898;">{{ $tache->getUsers['email'] }}</span></span></td>
        <td><span class="count">Tâches<br>Audiences</span></td>
        <td style="text-align:right;"><span class="infos-av">Récap d’audiences</span><br><br><button class="vue" class="btn btn-default btn-lg" onclick=""><img src="{{url('img/vue.svg')}}"/> Vue</button></td>
        <td style="text-align:left;"><span class="infos-av" style="color: #989898;">{{date('d/m/Y')}}</span><br><br><button class="imprime" class="btn btn-default btn-lg" onclick=""><img src="{{url('img/imprimer.svg')}}"/> Imprimer</button></td>
      </tr>
      <tr>
        <td height="20" colspan="2"></td>
      </tr>
      @endforeach
    </tbody>
  </table> --}}
 <br><br><br> 
 
      <div id="calendar"></div>
   

</div>
                   
@endsection

@section('styles')
    <link href="{{ asset('css/calendrier.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">  

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.3.0/main.min.js"></script>
<script src="{{ asset('js/fullcalendar.js') }}"></script>
<script src="{{ asset('js/localescalendar.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    var calendar =$('#calendar').fullCalendar({
        buttonText:{
            prev: '<',
            next: '>',
            today: "Aujourd'hui",
            year: 'Année',
            month: 'Mois',
            week: 'Semaine',
            day: 'Jour',
            list: 'Planification',
            // weekNumberTitle: 'Sem.',
            // allDayText: 'Toute la journée',
            // moreLinkText: 'en plus',
            // noEventsText: 'Aucun événement à afficher'
        },
        monthNames : ['Janvier', 'Février', 'Mars', 'Avril', 'May', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        dayNames : ['Dimanche','Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort : ['Dim','lun','Mar','Mer','Jeu','Ven','Sam'],
        monthNamesShort : ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        firstDay: '1',
        weekNumbers: true,
        weekNumberTitle: 'Sem.',
        selectable: true,
        aspectRatio: 2,
        height:650,
        showNonCurrentDates:false,
        navLinks   : true,
        editable   : false,
        // eventLimit : true,
        eventRender: function(event, element) {
            $(element).tooltip({title: event.description});
        },
        defaultView: 'month',
        yearColumns:3,
        eventColor: 'rgba(0, 0, 0, 0.2)',
        eventTextColor: 'black',
        header:{
           right: 'prev today next',
           left: 'title',
           center: 'year,month,basicWeek,basicDay,list',
        },
        events : [
                @foreach($taches as $task)
                {
                    title : '{{ $task->titre }}',
                    description: '@include('calendrier.file'){{ $task->description }}',
                    start : '{{ $task->dateaudiance }}',
                    url : '{{ url('/audiance-details', $task->id) }}'
                    // color: 'red'
                },
                @endforeach
            ]
    })
  });
</script>
@endsection