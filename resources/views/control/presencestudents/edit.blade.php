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
                    <h4 class="card-title" > نعديل حضور الطالب {{App\students::find($data->student_id)->name}}</h4>
                    <p class="card-category"></p>
                  </li>
                </ul>
              </div>
            <form action="{{action('PresencestudentsController@update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                            @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                <div class="row">
                                    <div class="col-md-6">

                                    <div class="form-group">
                                        <input type="date" class="form-control name" name="date" id="name"
                                            aria-describedby="name"  required autocomplete="name"
                                            value="{{{$data->date}}}">
                                        </div>
                                    </div>
                                </div>        
                            @endif
                           <div class="row">

                            <div class="col-md-6">
                                 <div class="form-group">
                                    <select class="form-control thisNotAllowFirstOption" name="status" id="status"
                                        aria-describedby="status" required autocomplete="allUsers">
                                        <option selected="true" disabled="disabled">إختار الحالة</option>
                                        <option @if($data->status == 0) selected @endif value="0">حضور</option>
                                        <option @if($data->status == 1) selected @endif value="1">إنصراف</option>
                                        <option @if($data->status == 2) selected @endif value="2">غياب</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" name="student_id" value="{{$data->student_id}}">
                    <button type="submit" class="btn btn-info">تعديل</button>
                </form>


        </div>
    </div>
</div>


@endsection
