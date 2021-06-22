@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/documents.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-flex px-3">
        <a href="#" class="text-dark text-decoration-none px-4 py-2">Mes documents</a>
        <a href="#" class="text-dark text-decoration-none px-4 py-2">Doccuments interne</a>
    </div>
    <div class="btn-wrapper d-flex pt-3">
        <button class="move-btn">
            <img src="img/move.svg"/>
            <span class="pl-2">Deplacer dossier</span>
        </button>
        <button class="download-btn">
            <img src="img/download.svg"/>
            <span class="pl-2">Telecharger la selection</span>
        </button>
        <button class="plus-btn btn-dark">
            <img src="img/plus.svg"/>
            <span class="pl-2" data-toggle="modal" data-target="#adddocument">Ajouter nouveau</span>
        </button>
        <button class="trash-btn btn-danger">
            <img src="img/trash.svg"/>
            <span class="pl-2">Supprimer la selection</span>
        </button>
    </div>
    <div class="container mt-3 px-5 py-4" style="background-color: #F5F5F5;">
            <table border="1px">
            <tr>
                <th>title</th>
                <th>desc</th>
                <th>file</th>
                <th>view</th>
                <th>download<th>
            </tr>
            @foreach ($data as $data)
            <tr>
            <td>{{$data->title}}</td>
                 <td>{{$data->desc}}</td>
                 <td>{{$data->file}}</td>
                 <td><a href="">view</td>
                 <td><a href="">download</td>
            </tr>
            @endforeach
            </table>
    </div>
<!-- Modal -->
<div class="modal" id="adddocument" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter nouveau document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{url('uploaddocument')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="title">Titre du document :</label><br>
        <input type="text" name="title"><br><br>
        <label for="desc">Description du document :</label><br>
        <input type="text" name="desc"><br><br>
        <label for="file">Le document à ajouter :</label><br>
        <input type="file" name="file"><br><br>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
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
@endsection
