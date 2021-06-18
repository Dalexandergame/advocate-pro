@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/correspondence.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="temp row">
            <div class="templates p-4 col col-md-offset-4">
                <form action="{{route('templates.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <h5 class="py-1 pr-3 font-weight-bold">Ajouter template</h5>
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

                        <input type="text" name="title" class="form-control" placeholder="Tapez votre texte ici ...">
                    </div>
                    <div class="form-group">
                        <input type="text" name="tag" class="form-control" placeholder="#Tags">
                    </div>
                    <div>
                        <button class="vis-btn btn-dark" >
                            <img src="img/eye2.png" height="13" width="13"/>
                            <span class="pl-2">visualiser</span>
                        </button>
                        <textarea id="editor" name="description" cols="63" rows="10" placeholder="Tapez votre texte
                        ici ..."></textarea>
                    </div>
                    <div class="d-flex justify-content-end form-group">
                        <button class="Enr-button" id="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="templates col col-md-offset-4">
                <h5 class="py-2 font-weight-bold">Templates</h5>
                <div class="container">
                    @foreach(\App\Models\Template::all() as $template )
                        <div class="row py-3">
                            <div class="col-1"><span>{{$template->id}}</span></div>
                            <div class="col-6"><span class="font-weight-bold">{{$template->title}}</span></div>
                            <div class="col-3"><span>{{$template->updated_at->format('d.m.Y')}}</span></div>
                            <div class="col-2"><a href="{{route('templates.edit' , $template->id)}}" class="text-danger">Editer</a></div>
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
