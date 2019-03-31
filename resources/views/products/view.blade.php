@extends('layouts.product')

@section('stylescript')
    <link href="{{ asset('css/products/show.css') }}" rel="stylesheet">
@endsection

@section('pagescript')
    <script src="{{ asset('js/products/show.js') }}"></script>
    <script>
        $(document).ready(function ($) {
            fetchProduct('{{ $product_id }}');
        });
    </script>
@endsection

@section('content')
    <div class="row product-view">
        <div class="col-md-6">
            <div class="card">
                <img class="card-img-top product-img-top" alt="Card image cap">
                <div class="card-body product-body">
                    <h5 class="card-title product-title"></h5>
                    <p class="card-text product-text"></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <ul class="list-group">
                    <li class="list-group-item">Price: <strong><span class="price"></span></strong></li>
                    <li class="list-group-item">SKU: <strong><span class="sku"></span></strong></li>
                    <li class="list-group-item">Stocks Available: <strong><span class="stocks-available"></span></strong></li>
                    <li class="list-group-item">
                        Categories
                        <strong>
                        <ul class="list-group category-item">
                        </ul>
                        </strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection