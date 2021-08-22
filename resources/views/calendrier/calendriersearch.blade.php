@extends('layouts.app')
@section('content')

<!-- menu -->
<div class="container-xl">
<select class="form-select filordre" aria-label="Default select example">
  <option selected>Selection filtre</option>
  <option value="1">Utilisateur</option>
  <option value="2">Cabinet</option>
</select>

<select class="form-select filordre" aria-label="Default select example">
  <option selected>Selection filtre</option>
  <option value="1">Tâches</option>
  <option value="2">Audiances</option>
  <option value="2">Rendez vous</option>
  <option value="2">Tous</option>
</select>

   <div style="width:320px; display: inline-block;">
    <form action="{{ url('calendrier/search') }}" method="GET">
      {{csrf_field()}}
      <div class="input-group custom-search-form">
        <select type="search" name="search" class="form-control input-search" placeholder="Nom d’étulisateur"  onchange="this.form.submit()">
          <option disabled selected>Selection filtre utilisateur</option>
           @foreach($users1 as $user1)
           <option value="{{ $user1->name }}">{{ $user1->name }}</option>
           @endforeach
        </select>
       {{--  <span class="input-group-btn" style="margin-left:2px;">
          <button type="submit" class="btn btn-default-sm">
            <img src="{{url('img/search.svg')}}">
          </button>
        </span> --}}
      </div>
     </form>
    </div>

  <table class="table table-borderless pull-right" style=" width:932px;">
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
     @foreach($users as $user)
      <tr class="user-search">
        <td><img class="profile-img" src="{{url('img/profile.svg')}}"/></td>

        <td><span class="infos-av">{{ $user['name'] }}</span><br>

          <span class="infos-av">Tel: <span style="color: #989898;">{{ $user['phone'] }}</span></span><br>
          <span class="infos-av">Mail: <span style="color: #989898;">{{ $user['email'] }}</span></span></td>

        <td><span class="count">{{ $tache }} Tâche(s)<br>{{ $audiance }} Audience(s)</span></td>

        <td style="text-align:right;"><span class="infos-av">Récap d’audiences</span>

          <br><br>

          <button class="vue" class="btn btn-default btn-lg" onclick="window.location='{{ url('./calendrier/view', $user->id) }}'"><img src="{{url('img/vue.svg')}}"/> Vue</button></td>

        <td style="text-align:left;"><span class="infos-av" style="color: #989898;">{{ date('d/m/Y')}}</span>

          <br><br>

          <button class="imprime" class="btn btn-default btn-lg" {{-- onclick="window.location='{{ url('./calendrier/imprimer', $tache->id) }}'" --}}><img src="{{url('img/imprimer.svg')}}"/> Imprimer</button></td>
      </tr>
      <tr>
        <td height="20" colspan="2"></td>
      </tr>
    @endforeach
    </tbody>
  </table>
    <br><br><br> 
      <br><br><br> 
         <br><br><br> 
           <br>
 
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
<script src="{{ asset('js/fullcalendar.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    var calendar =$('#calendar').fullCalendar({
      selectable: true,
      aspectRatio: 2,
      height:650,
      showNonCurrentDates:false,
      editable:false,
      defaultView: 'month',
      yearColumns:3,
      header:{
         right: 'prev today next',
         left: 'title',
         center: 'year,month,basicWeek,basicDay',
      },
    })
  });
</script>
@endsection