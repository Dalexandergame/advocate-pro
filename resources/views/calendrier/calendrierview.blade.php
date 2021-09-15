@extends('layouts.app')
@section('content')

<!-- menu -->
<div class="container-xl">


  <div class="blockd">{{ date('l d.m.Y')}}</div>
  <div style="display: inline-block; margin-left: 70px;"><img class="profile-img" src="{{url('img/profile.svg')}}"/></div>
  <div class="pro-av">
          <span class="infos-av">{{ $data1['name'] }}</span><br>
          <span class="infos-av">Tel: <span style="color: #989898;">{{ $data1['phone'] }}</span></span><br>
          <span class="infos-av">Mail: <span style="color: #989898;">{{ $data1['email'] }}</span></span>
  </div>
  <a class="count clock" onmouseout="this.style.color='#EC1E24';" href="{{ url('/calendrier') }}"><img src="{{ url('img/redclock.svg') }}"> Liste des audiences</a>
<div id="recapdiv">
  <div class="cadre-tab">
    <div>
    <span class="head">Avocat en charge<br>{{ $data1['name'] }}</span>
    <span class="head head1">Séance de délit de circulation<br>devant le tribunal de première instance à Marrakech</span>
    <span class="head">Nom du juge<br>{{date('d/m/Y')}}</span>
   </div>

  <table border="1" cellspacing="0" cellpadding="4" class="tab">
    <thead>
        <tr>
          <th class="tab-title">Numero de tribunal</th>
          <th class="tab-title" rowspan="2">les parties</th>
          <th class="tab-title" rowspan="2">Les mesures</th>
          <th class="tab-title" rowspan="2">Remarque</th>
        </tr>
        <tr>
          <th class="tab-title">ref</th>
        </tr>
    </thead>
    <tbody> 
       @foreach($data as $data)
      <tr>
        <td class="tab-input">{{ $data['tribunal_number'] }}</td>
                        <td rowspan="2" class="tab-input">{{ $data->getDossierjuridique->for->nom_entreprise }}<br>{{ $data->getDossierjuridique->for->nom_contact_principal }}<br><span style="font-weight: bold;">Contre</span><br>{{ $data->getDossierjuridique->against->nom_entreprise }}<br>{{ $data->getDossierjuridique->against->nom_contact_principal }}</td>

         <form action="{{ url('/calendrier/audiances/recap') }}" method="POST" style="display:inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                        <input type="text" name="data[{{$loop->index}}][id]" hidden="form-control" value="{{ $data->id }}">
                        <td rowspan="2" class="tab-input"><textarea name="data[{{$loop->index}}][mesures]" placeholder="..." style="border: none; height:120px;width: 250px;"><?php echo htmlspecialchars($data->mesures); ?></textarea></td>
                        <td rowspan="2" class="tab-input"><textarea name="data[{{$loop->index}}][remarque]" placeholder="..." style="border: none; height:120px;width: 250px;"><?php echo htmlspecialchars($data->remarque); ?></textarea></td>
      </tr>
      <tr>
        <td class="tab-input">{{ $data['dossier_num'] }}</td>
      </tr>
        @endforeach
   </tbody>

</table>

<button class="button button2" type="submit" class="btn btn-default btn-lg" style="float:right; margin-right:20px;background-color:white;"> <img class="imgbtn" src="{{url ('/img/edit.svg') }}">Remplir</button></form>
                <button class="button button2" onClick="imprimer('recapdiv')" style="float:right; margin-right:20px;background-color:#C4C4C4;border:none;" class="btn btn-default btn-lg"><img src="{{url('img/imprimer.svg')}}"/> Imprimer</button>

</div>

</div>
 </div>                  
@endsection

@section('styles')
    <link href="{{ asset('css/calendrier.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tachesdetails.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script>
function imprimer(recapdiv) {
      var printContents = document.getElementById(recapdiv).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
@endsection