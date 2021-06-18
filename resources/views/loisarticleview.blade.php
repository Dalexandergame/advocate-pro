<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AdvocatePRO') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loisarticle.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-xl">
<h2 style="text-align: center;">{{$data->nom}}</h2>
<h4 style="text-align: center;">{{$data->type}}</h4>
	 
                <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item me-3 me-lg-1">
                    <i class="nav-link" style="text-align:right;">
                     <a style="color: black;" href="../"><-Retour</a>
                    </i>
                  </li>
                </ul>
   

<iframe onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+"px";}(this));' style="height:200px;width:100%;border:none;overflow:hidden;" src="../../assets/{{$data->file}}"></iframe>
</body>
</html>
