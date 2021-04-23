@extends('layouts.app')

@section('content')
<ul>
  <li><a href="#">Privilèges</a></li>
  <li><a href="#">Rôles</a></li>
  <li><a href="#">Utilisateurs</a></li>  
</ul>

<button class="button button5" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-plus"></span>Ajouter nouveau</button>
<button class="button button4"> <span class="glyphicon glyphicon-edit"></span> Editer</button>
<button class="button button3"><span class="glyphicon glyphicon-trash"></span> Supprimer en selection</button>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th> </th>
                        <th>Utilisateurs</th>                       
                        <th>Rôle</th>
                        <th>E-mail</th>
                        <th> </th>
                        <th>Tél</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>  <input type="checkbox" name="brand"> </td>
                        <td><a href="#"><img class="img-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=42"> Nom et Prenom</a></td>
                        <td style="padding-top:20px">Rôle 1</td>                        
                        <td style="padding-top:20px">Nom.Prenom@gmail.com <br> 
                        <button class="buttonx buttony" class="btn btn-default btn-lg"> <span class="glyphicon glyphicon-eye-open
                            "></span>  Vue</button>
                        </td>
                        <td style="padding-top:20px"><br>
                            <button class="buttonx buttonz"> <span class="glyphicon glyphicon-edit"></span> Editer</button>
                        </td>
                        <td style="padding-top:20px">+21260000000 <br>
                            <button class="buttonx buttonw"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>     
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/userview.css') }}"> 
@endsection
