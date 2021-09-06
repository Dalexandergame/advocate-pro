@extends('layouts.app')

@section('content')
<ul>
    <li><a href="{{ url('/permissions') }}">Priviléges</a></li>
    <li><a href="{{ url('/roles') }}">Rôles</a></li>
    <li><a href="{{ url('/users') }}">Utilisateurs</a></li>
</ul>

<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>list des permissions</h2>
    </div>
    <div class="col-md-6">
        {{-- <a href="/permissions/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">cree une permission</a> --}}
    </div>
</div>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>permission</th>
                <th>date de creation</th>
                <th>options</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($perms as $perms)
                    <tr>
                        <td>{{ $perms['id'] }}</td>
                        <td>{{ $perms['name'] }}</td>
                        <td>{{ $perms['created_at'] }}</td>
                        <td>
                            <a href="/permissions/{{ $perms['id'] }}/edit">Editer - </i></a>
                            <a href="/permissions/delete/{{ $perms['id'] }}"><i class="fas fa-trash-alt">Supprimer</i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/userview.css') }}">
@endsection

@section('scripts')
@endsection