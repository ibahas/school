@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
@include('sweet::alert')
@endsection

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="text-center">
        <div class="all">
            <a href="/products/all">All Products</a>
        </div>
        <div class="alert">
            Weleocme ...
        </div>
    </div>
</div>
    @endsection
