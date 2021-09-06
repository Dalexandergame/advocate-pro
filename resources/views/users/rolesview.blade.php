@extends('layouts.app')

@section('content')
<ul>
    <li><a href="{{ url('/permissions') }}">Priviléges</a></li>
    <li><a href="{{ url('/roles') }}">Rôles</a></li>
    <li><a href="{{ url('/users') }}">Utilisateurs</a></li>
</ul>

<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>list des roles</h2>
    </div>
    <div class="col-md-6">
        <a href="/roles/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">cree un Role</a>
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
                <th>Role</th>
                <th>Slug</th>
                <th>Permissions</th>
                <th>Options</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Slug</th>
                <th>Permissions</th>
                <th>Options</th>
            </tr>
            </tfoot>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role['id'] }}</td>
                        <td>{{ $role['name'] }}</td>
                        <td>{{ $role['slug'] }}</td>
                        <td>
                            @if ($role->permissions != null)
                                    
                                @foreach ($role->permissions as $permission)
                                <span class="badge badge-secondary">
                                    {{ $permission->name }}                                    
                                </span>
                                @endforeach
                            
                            @endif
                        </td>
                        <td>
                            <a href="/roles/{{ $role['id'] }}">View </i></a>-
                            <a href="/roles/{{ $role['id'] }}/edit">Editer </i></a>-
                            <a href="/roles/delete/{{ $role['id'] }}"><i class="fas fa-trash-alt">Supprimer</i></a>
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