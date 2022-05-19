@extends('layouts.app')

@section('content')
<ul>
    <li><a href="{{ url('/permissions') }}">Priviléges</a></li>
    <li><a href="{{ url('/roles') }}">Rôles</a></li>
    <li><a href="{{ url('/users') }}">Utilisateurs</a></li>
</ul>

<a class="button button1 btn btn-default btn-lg mt-0 slide_down"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</a>
<button class="button button2 btn btn-default btn-lg mt-0"><img src="/img/edit.png" height="12px" width="12px"> Editer</button>
<button class="button button3 btn btn-default btn-lg mt-0"><img src="/img/trash.png" height="12px" width="12px"> Supprimer la selection</button>

<br><br><br>
<div class="container p-1">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="add_user" class="row bg-white p-3 m-1 justify-content-between mb-0" style="display: none;border: 1px solid #9EBFBFBF">
            <div class="col-md">
                <div>
                    <div class="font-weight-bold mb-1">Nom D’utilisateur</div>
                    <input class="form-control" type="text" name="name" placeholder="Nom complet" required>
                </div>
                <div class="mt-3">
                    <div class="font-weight-bold mb-1">Tél</div>
                    <input class="form-control" type="text" name="phone" placeholder="Numéro de téléphone">
                </div>
                <div class="mt-3">
                    <div class="font-weight-bold mb-1">E-mail</div>
                    <input class="form-control" type="text" name="email" placeholder="E-mail" required>
                </div>
            </div>
            <div class="col-md">
                <div>
                    <div class="font-weight-bold mb-1">Search</div>
                    <input class="form-control" type="text" name="search" placeholder="#Tag words">
                </div>
            </div>
            <div class="col-md">
                <div>
                    <div class="font-weight-bold mb-1">Role</div>
                    <select class="form-control" name="role[]" multiple required>
                        @foreach($roles_available as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 mt-2 offset-md-6">
                <button type="button" class="ml-4 py-2 slide_up">Masquer</button>
                <button type="submit" name="action" value="give_access" class="ml-4 py-2">Créer & Envoyer Accès</button>
                <button type="submit" name="action" value="save" class="submit-button ml-4">Enregistrer</button>
            </div>
        </div>
    </form>
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
        @foreach ($users as $user)
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
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(".slide_down").click(function(){
            $("#add_user").slideDown("slow");
        });
        $(".slide_up").click(function(){
            $("#add_user").slideUp("slow");
        });
    </script>
@endsection
