@extends('layouts.app')

@section('content')
<ul>
    <li><a href="#">Priviléges</a></li>
    <li><a href="#">Rôles</a></li>
    <li><a href="{{ url('/users') }}">Utilisateurs</a></li>
</ul>
<div class="container">       
    <div class="card">
        <div class="card-header">
            <h3>Name: {{$user->name}}</h3> 
            <h4>phone: {{$user->phone}}</h4> 
            <h4>Email: {{$user->email}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Role</h5>
            <p class="card-text">
            @if ($user->roles->isNotEmpty())
                @foreach ($user->roles as $role)
                    <span class="badge badge-primary">
                        {{ $role->name }}
                    </span>
                @endforeach
            @endif
            </p>

        </div>
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/userview.css') }}">
@endsection

@section('scripts')
@endsection