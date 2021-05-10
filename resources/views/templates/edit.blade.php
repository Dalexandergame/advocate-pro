<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AdvocatePRO') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/correspondence.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color:#333333;
            padding-top: 5%;
        }
    </style>

</head>
<body>
    <div class="templates col-6 m-auto p-4" style="z-index: 2; margin-top: 5%">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('templates.update', $template->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <h5 class="py-1 pr-3 font-weight-bold">Ajouter template</h5>
            <div class="form-group">

                <input type="text" name="title" class="form-control" placeholder="Tapez votre texte ici ..." value="{{ old('title') ?? $template->title }}">
            </div>
            <div class="form-group">
                <input type="text" name="tag" class="form-control" placeholder="#Tags" value="{{ old('tag') ?? $template->tag }}">
            </div>
            <div>
                <button class="vis-btn btn-dark" >
                    <img src="img/eye2.png" height="13" width="13"/>
                    <span class="pl-2">visualiser</span>
                </button>
                <textarea id="editor" name="description" cols="81" rows="20" placeholder="Tapez votre texteici ...">{{ old('description') ?? $template->description }}</textarea>
            </div>
            <div class="d-flex justify-content-end form-group">
                <button class="Enr-button" id="submit">Enregistrer</button>
            </div>
        </form>

        <!-- Scripts -->
        <script src="//cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'editor' );
            CKEDITOR.on('instanceLoaded', function(e) {e.editor.resize(670, 450)} );
        </script>

    </div>
</body>
