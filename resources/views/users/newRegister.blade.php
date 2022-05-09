@extends('layouts.app')

@section('content')
<ul>
    <li><a href="#">Priviléges</a></li>
    <li><a href="#">Rôles</a></li>
    <li><a href="{{ url('/users') }}">Utilisateurs</a></li>
</ul>

<br><br><br>
<div class="container">
<form method="POST" action="{{ route('register') }}">
@csrf
  <div class="form-group">
    <label for="exampleInputPassword1">Nom complet</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputphone">Numero de telephone</label>
    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">adresse email</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    @error('email')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe temporaire</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    @error('password')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">confirmer mdp temporaire</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
  </div>
  <div class="form-group">
        <label for="role">Select Role</label>
        <select class="role form-control" name="role" id="role">
            <option value="">Selectioner le role </option>
            @foreach (App\Models\Role::all() as $role)
            <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>

  <div id="permissions_box" >
      <label for="roles">Select Permissions</label>
      <div id="permissions_ckeckbox_list">
      </div>
  </div>

  <button type="submit" class="btn btn-primary">
       {{ __('Enregistrer et envoyer') }}
  </button>
</form>
</div>


@section('styles')
<link rel="stylesheet" href="{{ asset('css/userview.css') }}">
@endsection



@section('js_user_page')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
        $(document).ready(function(){
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
            permissions_box.hide(); // hide all boxes
            $('#role').on('change', function() {
                var role = $(this).find(':selected');
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');
                permissions_ckeckbox_list.empty();
                $.ajax({
                    url: "/users/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {

                    console.log(data);

                    permissions_box.show();
                    // permissions_ckeckbox_list.empty();

                    $.each(data, function(index, element){
                        $(permissions_ckeckbox_list).append(
                            '<div class="custom-control custom-checkbox">'+
                                '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                                '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                            '</div>'
                        );
                    });
                });
            });
        });
</script>

@endsection
@endsection

