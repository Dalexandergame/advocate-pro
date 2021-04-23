@extends('layouts.app')

@section('content')
    <div id="my-page-id">
        <h1>Welcome page</h1>

        <div class="my-div-class">
            My page content
        </div>

        <pre>For reference only</pre>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <style>
        #my-page-id {
            font-size: large;
        }
    </style>
@endsection

@section('scripts')
    {{-- If needed we add js libraries --}}
    {{-- <script src="{{ asset('js/welcome.js') }}"></script> --}}
    <script>
        let custom = "welcome!";
        console.log(custom);
    </script>
@endsection
