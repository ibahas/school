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
@endsection

@extends('layouts.app')
@section('content')


<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <h4 class="card-title" style="float: right !important">إضافة بلاغ جديد للطالب :: {{App\students::find($findStudent->id)->name}}</h4>
                    <p class="card-category" style="float: right !important"></p>
                    </li>
                </ul>
            </div>
            <form action="{{action('StudentsParentsController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control titleReport" name="titleReport" id="titleReport"
                                aria-describedby="titleReport" placeholder="عنوان البلاغ" required autocomplete="titleReport"
                                value="{{old('titleReport')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <textarea class="form-control" name="detailsReport" placeholder="تفاصيل البلاغ" rows="3"></textarea>
                              </div>
                        </div>
                    </div>
                    <input type="hidden" name="student" value="{{$findStudent->id}}">
                    <button type="submit" class="btn btn-info">إضافة</button>
                </form>
        </div>
    </div>
</div>


@endsection