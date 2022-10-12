<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AdvocatePRO') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'gotham', sans-serif;
            background-color: #FAFAFA;

        }
    </style>

    @yield('styles')
</head>
<body>
    <div >
        @include('layouts.sidebar')

        <div class="flex flex-col md:pl-80">
            @include('layouts.navbar')

            <main class="grow">
                <div class="py-6">
                    {{--<div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
                    </div>--}}
                    <div class="mx-auto max-w-full px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-4">
                            @yield('content')
                        </div>
                        <!-- /End replace -->
                    </div>
                </div>
            </main>
        </div>


    </div>
    {{--<div class="navigation">
        <main class="py-4">
            @include('layouts.navbar')
        </main>
    </div>--}}
    {{--<div class="content">
        @yield('content')
    </div>--}}

    @yield('scripts')
    @yield('js_user_page')
</body>
</html>
