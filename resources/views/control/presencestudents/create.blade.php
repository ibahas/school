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
                        <h4 class="card-title">إضافة حضور جديد للطالب {{$this_student->name}}</h4>
                        <p class="card-category"></p>
                    </li>
                </ul>
            </div>
            <form action="{{action('PresencestudentsController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    @if (Auth::user()->role == 1||2)

                    <div class="row">
                        <div class="col-md-6">
                            @if (Auth::user()->role == 1 || Auth::user()->role == 2)

                            <div class="form-group">
                                <input type="date" class="form-control name" name="date" id="name"
                                    aria-describedby="name" placeholder="إسم الطالب" required autocomplete="name"
                                    value="{{old('name')}}">
                            </div>
                                
                            @endif
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <select class="form-control thisNotAllowFirstOption" name="status" id="status"
                                        aria-describedby="status" required autocomplete="allUsers" value="{{old('status')}}">
                                        <option selected="true" disabled="disabled">إختار الحالة</option>
                                        <option value="0">حضور</option>
                                        <option value="1">إنصراف</option>
                                        <option value="2">غياب</option>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="student_id" value="{{$this_student->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                    </div>
                        
                    @endif

                    <button type="submit" class="btn btn-info">إضافة</button>
                </form>


        </div>
    </div>
</div>


@endsection