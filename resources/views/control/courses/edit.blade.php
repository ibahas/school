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
                    <h4 class="card-title" >تعديل بيانات الدورة</h4>
                    <p class="card-category"></p>
                  </li>
                </ul>
              </div>
            <form action="{{action('CoursesController@update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <br>
                        <br>
                        <div class="form-group clearfix">
                            <input type="text" class="form-control name" name="title" id="name" aria-describedby="name"
                                placeholder="إسم الدورة" required autocomplete="name" value="{{$data->title}}">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group is-filled">
                            <textarea type="text" class="form-control" placeholder="وصف الدورة" name="description" rows="4" >{{$data->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                             <select name="status" id="status">
                                 <option value="1" @if($data->status == 1) selected @endif >فعال</option>
                                 <option value="0" @if($data->status == 0) selected @endif >غير فعال</option>
                             </select>
                        </div>
                    <button type="submit" class="btn btn-info">تعديل</button>
                </form>
        </div>
    </div>
</div>


@endsection
