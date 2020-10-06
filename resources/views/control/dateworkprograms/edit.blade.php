@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
@include('sweet::alert')
<script>
    @if(count($errors))
        @foreach ($errors->all() as $item)
          swal({"timer":2500,"html":true,"title":"{{$item}}","showConfirmButton":false,"type":"info"});
        @endforeach
    @endif

    $(document).ready(function () {
        if($('.thisNotAllowFirstOption'))
    });

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
                  <h4 class="card-title" >تعديل بيانات دوام يوم معين للطالب {{App\students::find($data->student_id)->name}}</h4>
                    <p class="card-category"></p>
                  </li>
                </ul>
              </div>
            <form action="{{action('DateworkprogramsController@update',$data->id)}}" method="post"
                 enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-1 "></div>
                            <div class="col-md-3 col-ms-12">
                                <div class="form-group float-right ">
                                    <label for="date"> التاريخ : </label>
                                    <input type="date" id="date" name="date" value="{{$data->date}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-12 col-ms-12">
                                    <div class="form-group float-right" style=" position: relative; right: -1rem; float: right;  ">
                                        <label for="form"> من :</label>
                                        <input type="text" name="from" id="from" placeholder="من" value="{{$data->from}}">
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="form-group float-right" style=" position: relative; right: -1rem;float: right;  ">
                                        <label for="to"> إلى :</label>
                                        <input type="text" name="to" id="to" placeholder="الى" value="{{$data->to}}">
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="form-group float-right" style=" position: relative; right: -1rem; float: right;  ">
                                        <label for="evaluation"> التقيم :</label>
                                        <input type="number" name="evaluation" id="evaluation" placeholder="التقيم" value="{{$data->evaluation}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-ms-12">
                                <div class="form-group float-right">
                                    <label for="status"> الحالة :</label>
                                    <select name="status" id="status">
                                        <option value="0" @if($data->status == 0) selected @endif >جاري</option>
                                        <option value="1" @if($data->status == 1) selected @endif >تم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-info">تعديل</button>
                </form>
        </div>
    </div>
</div>


@endsection
