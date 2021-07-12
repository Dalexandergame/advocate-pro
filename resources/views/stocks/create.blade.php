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
        <form action="{{route('stocks.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <select id="categoryList" class="category" name="category" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <select id="productList" class="category mt-2" name="product" required>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col">
                    <h5 class="font-weight-bold">Responsable du stock</h5>
                    <div>Nom d’étulisateur</div>
                    <div>Tel<span>+212 600 137 224</span></div>
                    <div>Mail<span>nom&prénom@gmail.com</span></div>
                </div>
                <div class="col">
                    <h5 class="font-weight-bold">Fournisseur</h5>
                    <div>Nom & prénom</div>
                    <div>Tel<span>+212 600 137 224</span></div>
                    <div>Mail<span>nom&prénom@gmail.com</span></div>
                </div>
            </div>
            <div class="row mt-5 mx-4">
                <div class="container offset-4 p-3" style="background-color: #FAFAFA">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div id="product_name" class="col font-weight-bold"></div>
                        <div class="col pl-2">
                            <span class="pl-1">Reste en stock<span id="product_rest_en_stock" class="ml-2 font-weight-bold"></span></span><br>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col font-weight-bold">Date</div>
                        <div class="col">{{Carbon\Carbon::now()->format('d.m.Y')}}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col font-weight-bold">Quantité</div>
                        <div class="col">
                            <input type="number" name="quantity" class="stock-alert" placeholder="100">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="invoice-input" class="add-catg pl-1 py-1" style="margin-left: 53%">
                            <img class="pr-1" src="{{url('img/grey-plus.svg')}}"/>
                            <span class="">Ajouter la facture</span>
                        </label>
                        <input id="invoice-input" name="invoice" type="file" style="position: absolute;z-index: -1;" />
                    </div>
                    <button class="col-md-5 offset-7 Enr-button" id="submit">Enregistrer</button>                
                </div>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#categoryList').on('change',function(e){
                //console.log(e);
                var cat_id = e.target.value;
                //ajax
                $.get('/getCatProducts?cat_id='+cat_id,function(data){
                    //success
                    //console.log(data);
                    var product = $('#productList').empty();
                    $.each(data, function(create, productObj){
                        product.append('<option value="'+productObj.id+'">'+productObj.name+'</option>');
                    });
                });
            });

            $('#productList').on('change',function(e){
                
                var product_id = e.target.value;

                $.get('/getProduct?product_id='+product_id,function(data){
                    //success
                    console.log(data);
                    $.each(data,function(create, productObj){
                        $('#product_name').html(productObj.name);
                        if(productObj.stock != null) $('#product_rest_en_stock').html(productObj.stock.quantity);
                        else $('#product_rest_en_stock').html(0);
                    });
                });   
            });
        })

    </script> 
</body>
