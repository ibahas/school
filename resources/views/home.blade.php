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
    <div class="row">
        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
            @include('control.model.modelAdmin')
        @endif
        @if (Auth::user()->role == 3)
            @include('control.model.modelTeacher')
        @endif
        @if (Auth::user()->role == 4)
            @include('control.model.modelParent')
        @endif
    </div>
</div>
    @endsection
