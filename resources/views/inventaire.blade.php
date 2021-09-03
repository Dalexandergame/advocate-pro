@extends('layouts.app')

@section('content')
    <div class="container">
        <!--catégories-->
        <div class="row align-items-center ml-1 w-75">
            <div class=" col d-flex align-items-center">
                <select id="categoryList" class="category" name="category_id" required>
                    <option hidden disabled selected value>Choisissez une catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            <button onclick="window.location.href='{{route('categories.index')}}'" class="px-4 config-btn btn-dark">
                <img src="img/config.svg"/>
                <span class="pl-2">Gestion des catégories</span>
            </button>
        </div>
        <!--menu-->
        <div class="row menu ml-1 pt-4 ">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F2F2F2">
                <div class="container-fluid p-0">
                    <div class="navbar-nav sm-menu">
                        <a class="nav-link px-md-5" href="{{route('stocks.index')}}">Entre</a>
                        <a class="nav-link px-md-5 active" aria-current="page" href="{{route('demands.approved')}}">Sortie</a>
                        <a class="nav-link px-md-5" href="{{route('demands.store')}}">Demandes</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <h5 class="font-weight-bold ml-5 pt-4">Liste des produit</h5>
    <div class="pr-container pt-1">
        @foreach(array_chunk($products->toArray(),4,true) as $chunk)
            <div class="pr-wrapper row pl-2">
                @foreach($chunk as $item)
                   <div class="col products">
                           <img src="/storage/{{ $item['photo'] }}" alt="products" class="w-100 h-50"/>
                           <div class="text-center">{{$item['name']}}</div>
                   </div>
                @endforeach
            </div>
        @endforeach
    </div>
    </div>
    <ul class="pagination d-flex justify-content-center pt-3">
        <li class="pl-3">
            <a href="#"><img src="img/previous.svg"/></a>
        </li>
        <li class="pl-3"><a style="color:#6c757d" href="#">1-10</a></li>
        <li class="pl-3">
            <a href="#"><img src="img/next.svg"/></a>
        </li>
    </ul>
@endsection

@section('styles')
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#categoryList').on('change',function(e){
                console.log(e);
                var cat_id = e.target.value;
                //console.log(subcat_id);
                //ajax
                $.get('/getCatProducts?cat_id='+cat_id,function(data){
                    //success
                    console.log(data);
                    var product = $('#productList').empty();
                    $.each(data, function(create, productObj){
                        
                    });
                });


            });
        })

    </script>
@endsection
