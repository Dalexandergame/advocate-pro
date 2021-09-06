@extends('layouts.app')

@section('content')
    <div class="full">
        <div class="menu">
            <table style="width:50%">
                <tr>
                    <td><h2><a href="{{ url('/jurisprudence') }}">Interne</a></h2></td>
                    <td><h2><a href="">Advocate Pro</a></h2></td>
                    <td><h2><a href="">Externe</a></h2></td>
                </tr>
            </table>
        </div>
        <div class="container">
            <div class="cab">
                <div id="div1">
                    <h4>Contencieux</h4>
                    {{$data->Contencieux}}
                </div>
                <div id="div2">
                    <h4>Utilisateur en charge</h4>
                    nom: {{$data->Users['name']}}<br>
                    tel: {{$data->Users['phone']}}<br>
                    mail: {{$data->Users['email']}}<br>
                </div>
                <div id="div3">
                    <h4>Cabinet nom</h4>
                    {{$data->cabinetname}}
                </div>
            </div>
            <div class="info">
                <h5>Date</h5> {{$data->date}}
                <h5>Nom du dossier</h5> {{$data->dossiername}}
                <h5>Numero du dossier</h5> {{$data->dossiernumero}}
                <h5>Resultat final</h5> {{$data->resultat}}
            </div>
            <div class="file">
                <iframe class="doccontent" height="400"  width="100%" src="/assets/{{$data->file}}"></iframe>
            </div>
            <div class="tele">
                <a class="btn btn-primary" href="{{url('/jurisprudence/download',$data->file)}}"  id="tele" role="button">telecharger</a>
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
@endsection

@section('styles')
    <link href="{{ asset('css/jurisprudenceview.css') }}" rel="stylesheet">
@endsection
