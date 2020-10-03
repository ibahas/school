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
    <div class="tab">
        <a href="{{ url()->previous() }}">ADD</a>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <h4 class="card-title" >نعديل بيانات طالب</h4>
                    <p class="card-category"></p>
                  </li>
                </ul>
              </div>
            <form action="{{action('StudentsController@update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <button type="submit" class="btn btn-info">تعديل</button>
                </form>


        </div>
    </div>
</div>


@endsection
