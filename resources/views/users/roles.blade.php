@extends('layouts.app')

@section('content')
    <ul>
        <li><a href="{{ url('/permissions') }}">Priviléges</a></li>
        <li><a href="{{ url('/roles') }}">Rôles</a></li>
        <li><a href="{{ url('/users') }}">Utilisateurs</a></li>
    </ul>

    <a class="button button1 btn btn-default btn-lg mt-0 slide_down"><img src="/img/plus.png" height="12px" width="12px"> Ajouter nouveau</a>
    <button class="button button2 btn btn-default btn-lg mt-0"><img src="/img/edit.png" height="12px" width="12px">Editer</button>
    <button class="button button3 btn btn-default btn-lg mt-0"><img src="/img/trash.png" height="12px" width="12px">Supprimer la selection</button>
    <br/><br/>

    <div class="container p-1">
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div id="add_role" class="row bg-white p-3 m-1 justify-content-between" style="display: none">
                <div class="col-md-3">
                    <div class="font-weight-bold mb-1">Role</div>
                    <input class="form-control" type="text" name="name" required>
                </div>
                <div class="col-md-7 px-2">
                    <div class="font-weight-bold mb-3">Permissions</div>
                    <div class="permissions-container container mt-3">
                        @foreach(\App\Helpers\Sections::SECTIONS as $item)
                            <div class="perm-section">
                                <div class="row">
                                    <div class="col font-weight-bold">{{$item}}</div>
                                </div>
                                <div class="row py-2">
                                    <div class="col"><span class="mr-2">voir tout</span><input type="checkbox" name="view all {{$item}}s" value="view all {{$item}}s"></div>
                                    <div class="col"><span class="mr-2">lire</span><input type="checkbox" name="view {{$item}}" value="view {{$item}}"></div>
                                    <div class="col"><span class="mr-2">Modifier</span><input type="checkbox" name="edit {{$item}}" value="edit {{$item}}"></div>
                                    <div class="col"><span class="mr-2">Supprimer</span><input type="checkbox" name="delete {{$item}}" value="delete {{$item}}"></div>
                                </div>
                            </div>
                        @endforeach
                            <div class="perm-section">
                                <div class="row py-2">
                                    <div class="col font-weight-bold">Dashboard</div>
                                </div>
                                <div class="row py-2">
                                    <div class="col">
                                        <span class="mr-2">lire</span><input type="checkbox" name="view Dashboard">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="hide-button ml-4 slide_up">Masquer</button>
                    <button type="submit" class="submit-button ml-4">Enregistrer</button>
                </div>
            </div>
        </form>

        <table class="table table-borderless">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Rôle</th>
                <th scope="col" style="padding-right: 65px;">Permissions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr class="shadowrow1">
                    <td><input type="checkbox" name="checkbox"/></td>
                    <td><br>{{$role->name}}</td>
                    <td><br>
                        @foreach ($role->getAllPermissions()->take(4) as $permission)
                            <span class="badge badge-secondary">
                            {{ $permission->name }}
                        </span>
                        @endforeach
                    </td>
                    <td style="text-align: right;"><a class="buttonx button-vue" href="#"> <img src="/img/eye2.png" height="15px" width="15px"/> Vue</a>
                    </td>
                    <td><a class="buttonx button-editer" href="#"> <img src="/img/edit.png" height="15px" width="15px"/>Editer</a></td>
                    <td style="text-align: left;"><a class="buttonx button-supprimer" href="#"> <img src="/img/trash.png" height="15px" width="15px"/> Supprimer</a></td>
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
        $("#add_role").slideDown("slow");
    });
    $(".slide_up").click(function(){
        $("#add_role").slideUp("slow");
    });
</script>
@endsection
