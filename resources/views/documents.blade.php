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
            <span class="pl-2" id="deleteAllSelectedRecord">Supprimer la selection</span>
            <!-- <button type="button" class="btn btn-danger" id="deleteAllSelectedRecord"><img src="img/trash.svg"/> Supprimer la selection</button> -->
        </button>
        
    </div>
    <div class="container mt-3 px-5 py-4" style="background-color: #F5F5F5;">
            <table border="1px">
            <tr>
                <th><input type="checkbox" id="chkCheckAll" /></th>
                <th>title</th>
                <th>desc</th>
                <th>file</th>
                <th>view</th>
                <th>down<th>
            </tr>
            @foreach ($data as $data)
            <tr id="sid{{$data->id}}">
                 <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$data->id}}" /></td>
                 <td>{{$data->title}}</td>
                 <td>{{$data->desc}}</td>
                 <td>{{$data->file}}</td>
                 <td><a href="">view</td>
                 <td><a class="btn btn-primary" href="{{url('/download',$data->file)}}" role="button">telecharger</a></td>
                 <form action="{{url('documents/'.$data->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <td><button type="submit" class="btn btn-danger">supprimer</button></td>
                 </form>   
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
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script>
    $(function(e){
            $("#chkCheckAll").click(function(){
                $(".checkBoxClass").prop('checked',$(this).prop('checked'));
            });

             $("#deleteAllSelectedRecord").click(function(e){
                  e.preventDefault();
                  var allids = [];

                  $("input:checkbox[name=ids]:checked").each(function(){
                      allids.push($(this).val());
                  });

                  $.ajax({
                    url:"{{route('doc.deleteSelected')}}",
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
