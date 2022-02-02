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
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            padding-top: 5%;
            height: 50%;
            width: 75%;
            margin-left: 15%;
        }
    </style>

</head>
<body>
<div class="container bg-white p-4">
    <div class="row">
        <div class="col-md-4">
            <h5 class="font-weight-bold">Paiements</h5>
            <div>Dossier N° {{$dossier->file_number}}</div>
        </div>
        <div class="col-md-4">
            <h5 class="font-weight-bold">Utilisateur en charge</h5>
            <div> {{$user->name}}</div>
            <div>Tel: <span>{{$user->phone}}</span></div>
            <div>Mail: <span>{{$user->email}}</span></div>
        </div>
        <div class="col-md-4">
            <div class="d-flex">
                <img src="{{url('img/briefcase1.png')}}" height="50" width="50" alt="">
                <div class="ml-3">
                    <h5 class="font-weight-bold">{{$dossier->for->nom_entreprise}}</h5>
                    <div> {{$dossier->for->nom_contact_principal}}</div>
                    <div>Tel: <span> {{$dossier->for->tel_contact_principal}} </span></div>
                    <div>Mail: <span> {{$dossier->for->mail_contact_principal}} </span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mx-2">
        <div class="col-md-8 offset-4" style="background-color: #FAFAFA ; padding: 2.5rem">
            <div class="d-flex">
                <div class="font-weight-bold" for="Date">Date</div>
                <div class="px-2" style=" margin-left: 8.3rem">{{$payedDossier->created_at}}</div><br><br>
            </div>

            <div class="d-flex">
                <div class="font-weight-bold" for="cost">Somme totale</div>
                <div class="px-2" style=" margin-left: 8.3rem">{{$payedDossier->somme}}</div>
            </div>
            <br><br>

            <div class="d-flex mt-3">
                <div class="f-label font-weight-bold">Mode de paiement</div>
                <div class="mr-4 font-weight-bold" style="width: 20rem; margin-left: 5rem">{{$dossier->payment_mode}}</div>
            </div>
            
            <br>

            @if($cheque)
                <div id="chequeLabel" class="d-flex">
                    <div class="f-label font-weight-bold">Chèque</div>
                    <div class="" style="margin-left:10rem">
                        <span>{{$cheque->serial_number ?? ''}}</span><br>
                        <button id="showCheque" class="btn btn-link text-danger font-weight-bolder}}">Visualiser le chèque</button>
                    </div>
                </div>
            @endif

            <div class="d-flex mt-3">
                <div class="f-label font-weight-bold">Etat</div>
                <div class="mr-4" style="width: 20rem; margin-left: 10rem">{{$payedDossier->status}}</div>
            </div>
            <div class="d-flex mt-4">
                <div class="f-label font-weight-bold">Client</div>
                <div class="mr-4" style="width: 20rem; margin-left: 9.2rem">
                    <div class="font-weight-bold">{{$dossier->for->nom_contact}}</div>
                    <div>Tel<span>{{$dossier->for->tel_contact}}</span></div>
                    <div>Mail<span>{{$dossier->for->mail_contact}}</span></div>
                </div>
            </div>
            <div id="panel" class="mx-4 mb-5" style="background-color: #FAFAFA; display:none">
                <span class="p-2" id="hide"><img src="{{url('img/hide.svg')}}"/><br></span>
                <img src="/storage/{{$cheque->screen ?? ''}}" alt="" class="w-100"/><br>
            </div>   
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        // $('input:radio[name="paymentMethod"]').change(function(){
        //     if($(this).val() != 'Cheque'){
        //         $("#chequeLabel").removeClass("d-flex").addClass("d-none");
        //     }
        //     else $("#chequeLabel").addClass("d-flex");
        // });

        $("#showCheque").click(function(){
            $("#panel").slideDown("slow");
        });
        $("#hide").click(function(){
            $("#panel").slideUp("slow");
        });
    
    });
</script>
</body>
