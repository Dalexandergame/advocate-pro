@extends('layouts.app')

@section('content')
<ul>
    <li><a href="#">Priviléges</a></li>
    <li><a href="#">Rôles</a></li>
    <li><a href="{{ url('/utilisateurs') }}">Utilisateurs</a></li>
</ul>

<a class="button button1" class="btn btn-default btn-lg" href="{{ url('/new-register') }}"><img src="/img/plus.png" height="12px" width="12px" style="margin-top: -5px"> Ajouter nouveau</a>
<button class="button button2" class="btn btn-default btn-lg"><img src="/img/edit.png" height="12px" width="12px" style="margin-top: -5px"> Editer</button>
<button class="button button3" class="btn btn-default btn-lg"><img src="/img/trash.png" height="12px" width="12px" style="margin-top: -5px"> Supprimer la selection</button>


<br><br><br>
<div class="container">

    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Utilisateur</th>
                <th scope="col">Rôle</th>
                <th scope="col" class="text-right" style="  padding-right: 65px;">E-mail</th>
                <th scope="col"></th>
                <th scope="col"  style="padding-right: 65px;">Téléphone</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $data)
            <tr class="shadowrow1">
                <td><input type="checkbox" name="checkbox" style="margin-right: 20px" /><img src="/img/profile.png" height="70px" width="70px"/></td>
                <td><br>{{$data->name}}</td>
                <td><br>Role 1</td>
                <td style="text-align: right;"><br>{{$data->email}}<br> <button class="buttonx button-vue" class="btn btn-default btn-lg">  <img src="/img/eye2.png" height="15px" width="15px" style="margin-top: -3px"/> Vue</button></td>
                <td><br><br> <button class="buttonx button-editer" class="btn btn-default btn-lg">  <img src="/img/edit.png" height="15px" width="15px" style="margin-top: -3px"/> Editer</button></td>
                <td style="text-align: left;"><br>{{$data->phone}}<br> <button class="buttonx button-supprimer" class="btn btn-default btn-lg">  <img src="/img/trash.png" height="15px" width="15px" style="margin-top: -3px"/> Supprimer</button></td>
            </tr>
            <tr>
                <td height="20" colspan="2"></td>
            </tr>
        @endforeach 
        </tbody>

    </table>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/userview.css') }}">
@endsection

@section('scripts')
@endsection