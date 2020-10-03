@section('header')


<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">

@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
<script>
    $(document).ready(function () {
        $(".sweet-overlay").fadeTo(2000, 500).slideUp(500, function () {
            $(".sweet-overlay").slideUp(500);
        });
        $(".sweet-alert").fadeTo(2000, 500).slideUp(500, function () {
            $(".sweet-alert").slideUp(500);
        });
    });
</script>
@include('sweet::alert')
<script>
    @if (count($errors)) @foreach($errors -> all() as $item)
    swal({ "timer": 2500, "html": true, "title": "{{$item}}", "showConfirmButton": false, "type": "warning" });
    @endforeach
    @endif
</script>

<style>
    label{
      float: right !important;
    }
</style>
@endsection

@extends('layouts.app')
@section('content')

<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <h4 class="card-title">إضافة دورة جديد</h4>
                        <p class="card-category"></p>
                    </li>
                </ul>
            </div>
            <form action="{{action('CoursesController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <br>
                <div class="form-group clearfix">
                    <input type="text" class="form-control name" name="title" id="name" aria-describedby="name"
                        placeholder="إسم الدورة" required autocomplete="name">
                </div>
                <div class="col-md-12">
                    <div class="form-group bmd-form-group is-filled">
                      <textarea type="text" class="form-control" placeholder="وصف الدورة" name="description" rows="4" ></textarea>
                    </div>
                  </div>
                <button type="submit" class="btn btn-info">إضافة</button>
            </form>


        </div>
    </div>
</div>


@endsection