@extends('layouts.app')

@section('content')
<ul>
    <li><a href="#">Priviléges</a></li>
    <li><a href="#">Rôles</a></li>
    <li><a href="#">Utilisateurs</a></li>
</ul>

<button class="button button1" class="btn btn-default btn-lg"><img src="/img/plus.png" height="12px" width="12px" style="margin-top: -5px"> Ajouter nouveau</button>
<button class="button button2" class="btn btn-default btn-lg"><img src="/img/edit.png" height="12px" width="12px" style="margin-top: -5px"> Editer</button>
<button class="button button3" class="btn btn-default btn-lg"><img src="/img/trash.png" height="12px" width="12px" style="margin-top: -5px"> Supprimer la selection</button>


<br><br><br>
<div class="container">

    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Utilisateurs</th>
                <th scope="col">Rôle</th>
                <th scope="col" class="text-right" style="  padding-right: 65px;">E-mail</th>
                <th scope="col"></th>
                <th scope="col"  style="padding-right: 65px;">Tél</th>
            </tr>
        </thead>
        <tbody>
            <tr class="shadowrow1">
                <td><input type="checkbox" name="checkbox" style="margin-right: 20px" /><img src="/img/profile.png" height="70px" width="70px"/></td>
                <td><br>Nom et prénom</td>
                <td><br>Role 1</td>
                <td style="text-align: right;"><br>Nom.Prenom@gmail.com<br> <button class="buttonx button-vue" class="btn btn-default btn-lg">  <img src="/img/eye2.png" height="15px" width="15px" style="margin-top: -3px"/> Vue</button></td>
                <td><br><br> <button class="buttonx button-editer" class="btn btn-default btn-lg">  <img src="/img/edit.png" height="15px" width="15px" style="margin-top: -3px"/> Editer</button></td>
                <td style="text-align: left;"><br>+212 665 887 444<br> <button class="buttonx button-supprimer" class="btn btn-default btn-lg">  <img src="/img/trash.png" height="15px" width="15px" style="margin-top: -3px"/> Supprimer</button></td>
            </tr>
            <tr>
                <td height="20" colspan="2"></td>
            </tr>
            <tr class="shadowrow1">
                <td><input type="checkbox" name="checkbox" style="margin-right: 20px" /><img src="/img/profile.png" height="70px" width="70px"/></td>
                <td><br>Nom et prénom</td>
                <td><br>Role 2</td>
                <td style="text-align: right;"><br>Nom.Prenom@gmail.com<br> <button class="buttonx button-vue" class="btn btn-default btn-lg">  <img src="/img/eye2.png" height="15px" width="15px" style="margin-top: -3px"/> Vue</button></td>
                <td><br><br> <button class="buttonx button-editer" class="btn btn-default btn-lg">  <img src="/img/edit.png" height="15px" width="15px" style="margin-top: -3px"/> Editer</button></td>
                <td style="text-align: left;"><br>+212 665 887 444<br> <button class="buttonx button-supprimer" class="btn btn-default btn-lg">  <img src="/img/trash.png" height="15px" width="15px" style="margin-top: -3px"/> Supprimer</button></td>
            </tr>
            <tr>
                <td height="20" colspan="2"></td>
            </tr>
        </tbody>

    </table>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/userview.css') }}">
@endsection

@section('scripts')
@endsection