@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/correspondence.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <ul class="nav">
            <li class="nav-item" style="margin-right:3rem">
                <a href="/correspondence" class="nav-link active text-decoration-none" style="font-size:large;color:black">Messagerie</a> 
            </li>
            <li class="nav-item"> 
                <a href="" class="nav-link text-decoration-none" style="font-size:large;color:black">Gouvernances</a> 
            </li>
        </ul>
        <div class="temp row">
            <div class="templates p-4 col col-md-offset-4">
                <form action="{{route('govertemplates.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <h5 class="py-1 pr-3 font-weight-bold">Ajouter gouvernance template</h5>
                    <div class="form-group">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <label for="cab_name">Nom de cabinet</label>
                        <input type="text" name="cab_name" class="form-control" placeholder="Nom de cabinet">
                    </div>

                    <div class="foem-group mb-5">
                        <label for="cab_name">Adresse de cabinet</label>
                        <textarea name="cab_adress" cols="65" rows="3" class="form-control" placeholder="Adresse de cabinet"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Titre de la demande ou type">
                    </div>

                    <div class="form-group">
                        <input type="text" name="tag" class="form-control" placeholder="#Tag words">
                    </div>
                    <div>
                        <button class="vis-btn btn-dark" >
                            <img src="img/eye2.png" height="13" width="13"/>
                            <span class="pl-2">visualiser</span>
                        </button>
                        <textarea id="editor" name="description" cols="63" rows="10" placeholder="... ﺎﻨﻫ ﺔﻴﺑﺮﻌﻟﺎﺑ ﺐﻠﻄﻟا ىﻮﺘﺤﻣ"></textarea>
                    </div>
                    <div class="d-flex justify-content-end form-group">
                        <button class="Enr-button" id="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="templates col col-md-offset-4">
                <h5 class="py-2 font-weight-bold">governances Templates</h5>
                <div class="container">
                    @foreach(\App\Models\Govertemplate::all() as $template )
                        <div class="row py-3">
                            <div class="col-1"><span>{{$template->id}}</span></div>
                            <div class="col-6"><span class="font-weight-bold">{{$template->title}}</span></div>
                            <div class="col-3"><span>{{$template->updated_at->format('d.m.Y')}}</span></div>
                            <div class="col-2"><a href="{{route('govertemplates.edit' , $template->id)}}" class="text-danger">Editer</a></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endsection
