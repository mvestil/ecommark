@extends('layouts.product')

@section('stylescript')
    <link href="{{ asset('css/products/list.css') }}" rel="stylesheet">
@endsection

@section('pagescript')
    <script src="{{ asset('js/products/list.js') }}"></script>
    <script src="{{ asset('js/products/categories.js') }}"></script>
@endsection

@section('content')
    <div class="spinner"></div>

    @include('products.sections.filters')
    @include('products.sections.pagination')

    <div class="listing row" style=""></div>
@endsection