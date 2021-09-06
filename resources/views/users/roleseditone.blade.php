@extends('layouts.app')

@section('content')
<ul>
    <li><a href="#">Priviléges</a></li>
    <li><a href="#">Rôles</a></li>
    <li><a href="{{ url('/users') }}">Utilisateurs</a></li>
</ul>

<h1>modifier le Role</h1>

<form method="POST" action="/roles/{{$role->id}}">
    @csrf
    @method('PATCH')
    
    <div class="form-group">
        <label for="role_name">nom Role </label>
        <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Role name..." value="{{$role->name}}" required>
    </div>
    <div class="form-group">
        <label for="role_slug">Role Slug</label>
        <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug" placeholder="Role Slug..." value="{{$role->slug}}" required>
    </div>
    <div class="form-group" >
        <label for="roles_permissions">Ajouter Permissions</label>
        <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="@foreach ($role->permissions as $permission)
            {{$permission->name.","}}
        @endforeach">   
    </div>     

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/userview.css') }}">
@endsection

@section('scripts')
@endsection