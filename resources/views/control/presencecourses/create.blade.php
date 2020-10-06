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
                    <h4 class="card-title">إضافة أيام عمل للدورة :: {{$findThisCourse->title}}</h4>
                        <p class="card-category"></p>
                    </li>
                </ul>
            </div>
            <form action="{{action('PresencecoursesController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="course_id" value="{{$findThisCourse->id}}">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>*</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="thisIndex_1">1</td>
                                <td> <input required type="date" name="date[]"> </td>
                            </tr>

                        </tbody>
                    </table>
                    <button type="button" class="float-right btn btn-success" id="addDay">إضافة يوم</button>
                    <button type="submit" class="btn btn-info">إضافة</button>
                
            </form>


        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.thisIndex').each(function (index, element) {
            // element == this
            
            // console.log();
        });
        var counter = 2 ;

        $('#addDay').click(function (e) { 
            e.preventDefault();
            $('.table>tbody').append('<tr class="thisIndex_' + counter + '" id="' + counter + '"><td>' + counter + '</td><td><input required type="date" name="date[]"></td></tr>');
            counter++;
        });
    });
</script>


@endsection