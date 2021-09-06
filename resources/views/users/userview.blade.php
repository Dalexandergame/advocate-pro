@extends('layouts.app')

@section('content')
<ul>
    <li><a href="{{ url('/permissions') }}">Priviléges</a></li>
    <li><a href="{{ url('/roles') }}">Rôles</a></li>
    <li><a href="{{ url('/users') }}">Utilisateurs</a></li>
</ul>

<a class="button button1" class="btn btn-default btn-lg" href="{{ url('/register') }}"><img src="/img/plus.png" height="12px" width="12px" style="margin-top: -5px"> Ajouter nouveau</a>
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
        @foreach ($user as $user)
            <tr class="shadowrow1">
                <td><input type="checkbox" name="checkbox" style="margin-right: 20px" /><img src="/img/profile.png" height="70px" width="70px"/></td>
                <td><br>{{$user->name}}</td>
                <td><br>
                @if ($user->roles->isNotEmpty())
                    @foreach ($user->roles as $role)
                        <span class="badge badge-secondary">
                            {{ $role->name }}
                        </span>
                    @endforeach
                @endif</td>
                <td style="text-align: right;"><br>{{$user->email}}<br> <a class="buttonx button-vue" href="/users/{{ $user['id'] }}">  <img src="/img/eye2.png" height="15px" width="15px" style="margin-top: -3px"/> Vue</a></td>
                <td><br><br> <a class="buttonx button-editer" href="/users/{{ $user['id'] }}/edit"> <img src="/img/edit.png" height="15px" width="15px" style="margin-top: -3px"/> Editer</a></td>
                <td style="text-align: left;"><br>{{$user->phone}}<br> <a class="buttonx button-supprimer" href="/users/delete/{{ $user['id'] }}">  <img src="/img/trash.png" height="15px" width="15px" style="margin-top: -3px"/> Supprimer</a></td>
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
