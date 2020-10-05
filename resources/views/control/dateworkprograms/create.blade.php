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
                    <h4 class="card-title">إضافة أيام عمل للبرنامج :: {{$program->title}}</h4>
                        <p class="card-category"></p>
                    </li>
                </ul>
            </div>
            <br>
            <form action="{{action('DateworkprogramsController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="button" class="btn btn-success" id="btnAddWeek">
                    <i class="material-icons">add</i>
                </button>
                <div id="week1">
                </div>
                <div id="newWeeks">

                </div>
                <input type="number" name="thisProgram" value="{{$program->id}}" hidden>
                <button type="submit" class="btn btn-info">إضافة</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var NoPlus = 2;
        $('#btnAddWeek').click(function (e) { 
            e.preventDefault();
            $('#newWeeks').append('<div id="week'+ NoPlus +'"><p class="float-right" style="margin-right: 1rem" onClick="funDelete('+NoPlus+')"> الإسبوع '+ NoPlus +' </p> ');
            for(var i = 1; i <= 7 ; i++){
                 if(i == 1){
                    $('#week' + NoPlus).append('<br><br> <div class="row"> <div class="col-1"></div> <div class="col-8"> <div class="form-group"> <label for="date'+ i +'">تاريخ اليوم</label> <input type="date" id="date'+ i +'" name="date[]" /> <label for="from'+ i +'">من</label> <input type="text" id="from'+ i +'" name="from[]" /> <label for="to'+ i +'">إلى</label> <input type="text" id="to'+ i +'" name="to[]" /> </div> </div> </div></div>').hide().show('slow');
                }else{
                    $('#week' + NoPlus).append('<div class="row"> <div class="col-1"></div> <div class="col-8"> <div class="form-group"> <label for="date'+ i +'">تاريخ اليوم</label> <input type="date" id="date'+ i +'" name="date[]" /> <label for="from'+ i +'">من</label> <input type="text" id="from'+ i +'" name="from[]" /> <label for="to'+ i +'">إلى</label> <input type="text" id="to'+ i +'" name="to[]" /> </div> </div> </div></div>').hide().show('slow');
                }
            }

            NoPlus++;
       });
    });
    
    $(document).ready(function () {
        $('#week1').append('<div ><p class="float-right" style="margin-right: 1rem" onClick="funDelete(1)"> الإسبوع 1 </p> ');
        for(var i = 1; i <= 7 ; i++){
                if(i == 1){
                    $('#week1').append('<br><br> <div class="row"> <div class="col-1"></div> <div class="col-8"> <div class="form-group"> <label for="date'+ i +'">تاريخ اليوم</label> <input type="date" id="date'+ i +'" name="date[]" /> <label for="from'+ i +'">من</label> <input type="text" id="from'+ i +'" name="from[]" /> <label for="to'+ i +'">إلى</label> <input type="text" id="to'+ i +'" name="to[]" /> </div> </div> </div></div>').hide().show('slow');
                }else{
                    $('#week1').append('<div class="row"> <div class="col-1"></div> <div class="col-8"> <div class="form-group"> <label for="date'+ i +'">تاريخ اليوم</label> <input type="date" id="date'+ i +'" name="date[]" /> <label for="from'+ i +'">من</label> <input type="text" id="from'+ i +'" name="from[]" /> <label for="to'+ i +'">إلى</label> <input type="text" id="to'+ i +'" name="to[]" /> </div> </div> </div></div>').hide().show('slow');
                }
        }
    });
</script>


@endsection