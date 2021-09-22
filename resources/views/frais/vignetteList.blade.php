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
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/dossierjuridiquevue.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/createdossierjuridique.css') }}">
    <link href="{{ asset('css/tachesdetails.css') }}" rel="stylesheet">
    <link href="{{ asset('css/taches.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendrier.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            padding-top: 5%;
            height: 75%;
            width: 90%;
            margin-left: 5%;
        }
        input:focus, textarea:focus {
            outline: none;
        }
    </style>

</head>
<body>
    <div class="container p-4">
        <div class="row my-2">
            <div class="col-6 ml-4 mr-4">
                <h5 class=" text-danger mb-2 font-weight-bold">Vignette ( {{$vignetteNumsTotal->count()}} )</h5> 
                @foreach ($vignetteNums as $vignetteNum)
                    <div class="row mb-4 p-4 bg-white">
                        <div class="col-4">
                            <img src="{{url('img/vignettedef.svg')}}" alt=""/>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">Vignette N° {{$vignetteNum->serial_number}}</div>
                            <button id="{{$vignetteNum->serial_number}}" class="add-vignette btn btn-dark px-3">Ajouter ce produit</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-5">
                <h5 class=" text-danger mb-2 font-weight-bold">Demande</h5>
                <div class="p-4 bg-white">
                    <form action="{{route('dossierCost.vignettes.post', $dossier->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex">
                            <img src="{{url('img/profile.png')}}" alt="" width="75" height="75">
                            <div class="ml-3 mt-3">
                                <h5 class=" font-weight-bold">Utillisateur en charge</h5>
                                <span>{{$user->name}}</span>
                                <h5 class=" font-weight-bold mt-4">Dossier N° {{$dossier->file_number}}</h5>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="">{{Carbon\Carbon::now()->format('d.m.Y')}}</div>
                                <div class="font-weight-bold mt-4">Vignette N°
                                    <input style="border:none" type="text" name="vSerial_number" id="set_vignette_serial_number" readonly required>
                                </div>
                                <div>Description du besoin</div>
                                <textarea class="mt-2" name="description" id="" cols="30" rows="7" required></textarea>
                                <div>
                                    <label for="screen-input" class="add-catg pl-1 py-1">
                                        <img class="pr-1" src="{{url('img/grey-plus.svg')}}"/>
                                        <span class="">Ajouter une capture</span>
                                    </label>
                                    <input id="screen-input" name="screen" type="file" style="position: absolute;z-index: -1;"/>
                                </div>
                            </div>   
                        </div>
                        <button class="Enr-button" style="margin-left: 55%" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-2 offset-9"><a class="btn btn-secondary py-2 px-3" href="{{ route('dossier.vue',$dossier->id) }}">Retour au dossier</a></div>
        <div class="col-2.5" id="red-writing-3">Historique du Vignette</div>
        <div class="row mt-5 mx-4">
            <div class="float-child" style="width: 100%">
                <div class="big-grid2" >
                    <div class="row">
                        <hr class="red-line2" style="width:1px;">
        
                        
                        @foreach($fraisvignettes as $fraivignette)
        
                        <div class="style-n-all2">
                            <div class="style-n1">Vignette N° {{ $fraivignette->serial_number }}</div>
                            <div class="style-n2 mx-1">Dossier {{ $fraivignette->dossierjuridique->file_number }}</div>
                            <div class="style-n3"> Marrakech le ({{ $fraivignette->created_at->format('d/m/Y') }})</div>
                        </div>
                        <hr class="red-line2" style="width:50px;">
                
                        @endforeach
               
        
                        {{-- <div class="style-n-all2"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div>
                        <hr class="red-line2">
                        <div class="style-n-all2"><div class="style-n1">N du dossier</div><div  class="style-n2">N du tribunal</div><div class="style-n3">Type du dossier</div><div class="style-n4">Date</div></div> --}}
                    </div>
                </div>
            </div>   
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.add-vignette').on('click',function(){
                var VSerialNumber = this.id ;
                //console.log(VSerialNumber);
                $('#set_vignette_serial_number').val(VSerialNumber);
            });
        });    
    </script>
</body>