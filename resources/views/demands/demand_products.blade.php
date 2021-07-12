@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-baseline mx-5 pt-4">
            <h5 class="font-weight-bold">Liste des produit</h5>
            <span class="text-danger font-weight-bold totalItems"></span>
        </div>
        <div class="pr-container pt-1">
            <form action="{{route('StoreDemandProducts')}}" enctype="multipart/form-data" method="Post">
                @csrf
                @foreach(array_chunk($products->toArray(),4,true) as $chunk)
                    <div class="pr-wrapper row pl-2 pb-4">
                        @foreach($chunk as $item)
                            <div class="col products p-0">
                                <div class="m-3">
                                    <img src="/storage/{{ $item['photo'] }}" alt="products" class="w-100"/>
                                    <div class="text-center">{{$item['name']}}</div>
                                </div>
                                <div class="d-flex justify-content-center py-2 px-3" style="background-color:#EC1E24">
                                    <span id="{{$item['id']}}" class="mx-4 text-decoration-none addProduct"><img src="{{url('img/plus.svg')}}"/></span>
                                    <input class="text-center input-quantity" id="input_quantity_{{$item['id']}}" name="quantity[{!! $item['id'] !!}]" value="0"  style="width:2rem"></input>
                                    <span id="{{$item['id']}}" class="mx-4 text-decoration-none removeProduct"><img src="{{url('img/minus.svg')}}"/></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <ul class="pagination d-flex justify-content-center pt-3">
                    <li class="pl-3">
                        <a href="#"><img src="{{ url('img/previous.svg') }}"/></a>
                    </li>
                    <li class="pl-3"><a style="color:#6c757d" href="#">1-10</a></li>
                    <li class="pl-3">
                        <a href="#"><img src="{{ url('img/next.svg') }}"/></a>
                    </li>
                </ul>
                <button type="submit" class="btn-dark py-1 col-2 offset-md-10 mb-5 ">Suivant</button>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/inventaire.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.addProduct').on('click',function increment_quantity() {
                id = this.id;
                quantity = $('#input_quantity_'+ id).val();
                quantity =  parseInt(quantity)+1;
                $('#input_quantity_'+ id).val(quantity);

            });

            $('.removeProduct').on('click',function decrement_quantity() {
                id = this.id;
                quantity = $('#input_quantity_'+ id).val();
                if(quantity > 0) {
                    quantity = parseInt(quantity) - 1;
                    $('#input_quantity_' + id).val(quantity);
                }
            });
        });
    </script>
@endsection
