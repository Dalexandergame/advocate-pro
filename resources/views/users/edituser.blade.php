@extends('layouts.app')

@section('content')
<ul>
    <li><a href="#">Priviléges</a></li>
    <li><a href="#">Rôles</a></li>
    <li><a href="{{ url('/users') }}">Utilisateurs</a></li>
</ul>
<h2>edit user</h2>
<form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf()
    
    <div class="form-group">
        <label for="name">User name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ $user->name }}" required>
    </div>
    <div class="form-group">
        <label for="name">phone</label>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="phone..." value="{{ $user->phone }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ $user->email }}">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password..." minlength="8">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password Confirm</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
    </div>
    <div class="form-group">
        <label for="role">Selectioner le Role</label>
        <select class="role form-control" name="role" id="role">
            <option value="">Selection</option>
            @foreach ($roles as $role)
                <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}" {{ $user->roles->isEmpty() || $role->name != $userRole->name ? "" : "selected"}}>{{$role->name}}</option>                
            @endforeach
        </select>          
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