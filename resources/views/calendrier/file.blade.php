{{-- <table class="table table-borderless pull-right" style=" width:932px;"><thead><tr><th scope="col"></th><th scope="col"></th><th scope="col"></th><th scope="col"></th></tr></thead><tbody>@foreach($taches as $tache)<tr class="user-search"><td><span class="time">{{$tache['dateaudiance']->format('h:i A')}}</span></td><td><span class="tab-title">Pour</span><br><span class="infos-av">{{ $tache->getDossierjuridique['for'] }}</span><br><span class="infos-av">Tel: <span style="color: #989898;"></span></span><br><span class="infos-av">Mail: <span style="color: #989898;"></span></span></td><td><span class="tab-title">Contre</span><br><span class="infos-av">{{ $tache->getDossierjuridique['against'] }}</span><br><span class="infos-av">Tel: <span style="color: #989898;"></span></span><br><span class="infos-av">Mail: <span style="color: #989898;"></span></span></td><td><span class="tab-title">Dossier N° <span style="margin-left: 155px; font-weight: normal;">{{ $tache->getDossierjuridique['file_number'] }}</span><br>Numéro de tribunal <span style="margin-left: 100px; font-weight: normal;">{{ $tache->getDossierjuridique['tribunal_number'] }}</span> </span><br><span class="infos-av" style="color: #989898;">Avocat en charge: {{ $tache->getUsers['name'] }}</span><br><span class="count">Date du prochainne audience {{$tache['dateaudiance']->format('d/m/Y')}}</span></td></tr><tr><td height="20" colspan="2"></td></tr>@endforeach</tbody></table> --}}