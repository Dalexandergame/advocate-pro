@extends('layouts.app')

@section('content')
    <div class="mx-3">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h5 class="ml-4 font-weight-bold pt-4">Gestion des catégorie</h5>
            <a href="#">
                <img src="img/red-plus.svg"/>
                <span class="text-danger font-weight-bold pr-5">Ajouter catégorie</span>
            </a>
        </div>
        <div class="d-flex justify-content-between">
            @foreach($categories as $category)
                <div class="mx-auto">
                    <!--maincategories-->
                    <div class="p-2 mb-3 px-5 bg-danger">
                        <span class="text-white">{{$category->name}}</span>
                        <img class="px-3" src="img/dropdown.svg">
                    </div>
                    <!--Products-->
                    @foreach($category->products as $product)
                        <div class="shadow py-3 my-3 produit">
                            <a href="{{route('products.show' , $product->id)}}" class="d-flex text-decoration-none text-black-50">
                                <img class="mx-2 mt-1" src="img/produit-default.svg" height="28" width="32"/>
                                <div>
                                    <span class=" lead font-weight-bold">{{$product->name}}</span><br>
                                    <span class="txt-small">Rest en stock 400</span>
                                    <div>
                                        <img src="img/alarm.png"/>
                                        <span class="text-danger font-weight-bold txt-xx-small text">Alerte minimum du stock à 40</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <!--Add a subcategroy-->
                    <div class="mt-4">
                        <a href="" class="add-catg shadow mb-3 px-5" style="">
                            <img class="pr-1" src="img/grey-plus.svg"/>
                            <span class="">Ajouter Produit</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
@endsection
