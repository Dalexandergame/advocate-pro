@extends('layouts.app')

@section('content')
    <div class="full">
        <div class="menu">
            <table style="width:50%">
                <tr>
                        <nav class="navbar navbar-expand-lg navbar-light" id="tnav">
                            <div class="container-fluid p-0" id="tmenu">
                                <div class="navbar-nav ">
                                    <a class="nav-link px-md-4" href="{{ url('/jurisprudence') }}">Interne</a>
                                    <a class="nav-link px-md-4 active" href="">Advocate Pro </a>
                                    <a class="nav-link px-md-4" href="">Externe </a>
                                </div>
                            </div>
                        </nav>
                </tr>
            </table>
        </div>
        <div class="form-group row">
            <div class="box1">
                <input type="text" class="form-control" placeholder="# Recherche par tagwords">
            </div>
            <div class="box2">
                <input type="text" class="form-control" placeholder="Nom ou numero du dossier">
            </div>
            <div class="box3">
                <input type="text" class="form-control" placeholder="Date du jugement">
            </div>
            <div class="box4">
                <input type="text" class="form-control" placeholder="Type du dossier">
            </div>
            <div class="boxsearch">
                <button type="button" class="btn btn-dark">
                    <img src="/img/search.png" height="22px" width="22px"/>
                </button>
            </div>
        </div>
        <div class="form-group row">
            <div class="impo">
                <span type="button" class="pl-2" id="impo" data-toggle="modal" data-target="#addjuris"><img src="img/download.svg" alt="download">Importer Jurisprudence</span>
            </div>
            <div class="expo">
                <button type="button" id="expo">Exporter la selection</button>
            </div>
            <div class="del">
                <span type="button" id="del">Supprimer la selection</span>
            </div>
        </div>
        <div class="file">
            <table class="table custom-table">
                <thread>
                    <tr>
                        <th scope="col"><input type="checkbox" id="chkCheckAll"/></th>
                        <th scope="col">Nom du dossier</th>
                        <th scope="col">N° dossier</th>
                        <th scope="col">Type du contentieux</th>
                        <th scope="col">Avocate en charge</th>
                        <th scope="col">Date</th>
                        <th scope="col">Résultat final</th>
{{--                        <th scope="col">Options</th>--}}
                    </tr>
                </thread>
                <tbody>
                @foreach ($data as $data)
                <tr id="sid{{$data->id}}">
                    <th scope="row">
                        <input type="checkbox" name="ids" class="checkBoxClass" value="{{$data->id}}" />
                    </th>
                    <td>{{$data->dossiername}}</td>
                    <td>{{$data->dossiernumero}}</td>
                    <td>{{$data->Contencieux}}</td>
                    <td>{{$data->Users['name']}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->resultat}}</td>
                    <td>
                        <div class="form-group row">
                            <div class="vue">
                                <a class="btn btn-info" href="{{url('/jurisprudence/jurisprudenceview',$data->id)}}" id="vue" role="button">Afficher details</a>
                            </div>
                            <div class="tele">
                                <a class="btn btn-primary" href="{{url('/jurisprudence/download',$data->file)}}"  id="tele" role="button">telecharger</a>
                            </div>
                        </div>
                    </td>
                <tr class="spacer">
                    <td colspan="300"></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal add-->
<div class="modal" id="addjuris" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Importer une Jurisprudence</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container">
      <form action="{{url('/jurisprudence/upload')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
          <div class="col">
              <label class="font-weight-bold" for="cabinetname">Nom cabinet:</label>
              <input type="text" name="cabinetname" placeholder="Nom du cabinet"><br>
          </div>

          <div class="col">
              <label class="font-weight-bold" for="charge">Utilisateur en charge:</label>
              <input type="hidden" name="userid" value="{{ $user->id }}">
              <h6 class="text-sm-left">Nom: {{ $user->name }}</h6>
              <h6 class="txt-small">Tel: {{ $user->phone }}</h6>
              <h6 class="txt-small">Mail: {{ $user->email }}</h6>
          </div>

          <div class="col">
              <label class="font-weight-bold" for="Contencieux">Contencieux:</label>
              <select name="Contencieux" id="Contencieux">
                  <option value="" disabled selected>type de contencieux</option>
                  <option value="type1">Type1</option>
                  <option value="type2">type2</option>
              </select>
          </div>
          <br><br>
      </div>
      <div class="row justify-content-end">
          <div class="p-4 mr-5 vstack gap-3 bg-light text-dark">
            <label class="font-weight-bold" for="date">Date:</label>
            <input type="date" id="date" name="date"><br><br>

            <label class="font-weight-bold" for="dossiername">Nom du dossier:</label>
            <input type="text" name="dossiername" placeholder="Nom du dossier"><br><br>

            <label class="font-weight-bold" for="dossiernumero">Numero du dossier:</label>
            <input type="number" name="dossiernumero" placeholder="Num du dossier"><br><br>

            <label class="font-weight-bold" for="file">Le document à importer :</label>
            <input type="file" name="file"><br><br>

            <label class="font-weight-bold" for="resultat">resultat final</label>
                <select name="resultat" id="resultat">
                <option value="" disabled selected>resultat</option>
                <option value="gagner">Gagner</option>
                <option value="perdu">Perdu</option>
                </select><br><br>
          </div>
      </div>
      <div class="row justify-content-end">
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
      </div>
    </form>
      </div>
    </div>
  </div>
</div> 
@endsection
@section('scripts')
    <script src="{{ asset('js/menuselector.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script>
    $(function(e){
            $("#chkCheckAll").click(function(){
                $(".checkBoxClass").prop('checked',$(this).prop('checked'));
            });

             $("#del").click(function(e){
                  e.preventDefault();
                  var allids = [];

                  $("input:checkbox[name=ids]:checked").each(function(){
                      allids.push($(this).val());
                  });

                  $.ajax({
                    url:"{{route('jurisprudence.deleteSelected')}}",
                    type:"DELETE",
                    data:{
                      _token:$("input[name=_token]").val(),
                      ids:allids
                    },
                  success:function(response){
                      $.each(allids,function(key,val){
                      $("#sid"+val).remove();
                        });
                    }
                  });
              })
      });
    </script>
@endsection

@section('styles')
    <link href="{{ asset('css/jurisprudence.css') }}" rel="stylesheet">
@endsection
