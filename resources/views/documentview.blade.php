@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/documents.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="viewdoc">
    <div class="sorttab">
        <h4>Titre de document:</h4>
        <h5>{{$data->title}}</h5>
    </div>
    <div class="sorttab">
        <h4>Description:</h4>
        <h5>{{$data->desc}}</h5>
    </div>
    <div class="sorttab">
        <h4>Date d'ajout:</h4>
        <h5>{{$data->created_at}}</h5>
    </div>
    <div class="sorttab">
        <h4>date dernière modification:</h4>
        <h5>{{$data->updated_at}}</h5>
    </div>
    <div class="sorttab">
        <h4>Contenu de document:</h4>
        <iframe class="doccontent" height="700"  width="90%" src="/assets/{{$data->file}}"></iframe>
    </div>
    
</div>
@endsection
