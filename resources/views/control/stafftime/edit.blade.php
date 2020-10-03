@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
@include('sweet::alert')
<script>
    @if(count($errors))
        @foreach ($errors->all() as $item)
          swal({"timer":2500,"html":false,"title":"{{$item}}","showConfirmButton":false,"type":"info"});
        @endforeach
    @endif
</script>
@endsection

@extends('layouts.app')
@section('content')
{{-- @if(count($errors))
@foreach ($errors->all() as $item)
<p>{{$item}}</p>
@endforeach
@endif --}}
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <h4 class="card-title" >تعديل حضور المحفظ :: {{App\User::find($data->user_id)->name}}</h4>
                    <p class="card-category"></p>
                  </li>
                </ul>
              </div>
            <form action="{{action('StafftimeController@update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <br>
                <br>
                  <div class="row">
                        <div class="col-3"></div>
                        <div class="col-3">
                          <div class="form-group">
                            <label for="date" style=" float: right; ">تاريخ</label>
                            <input type="date" class="form-control" name="date" id="date" aria-describedby="date"
                                placeholder="تاريخ" required autocomplete="date" value="{{$data->date}}">
                          </div>
                          <br>
                          <div class="form-group">
                            <label for="state" style=" float: right; ">الحضور</label>
                            <select name="state" id="state" >
                              <option aria-disabled="true" disabled selected>الحضور</option>
                              <option value="1">حضور</option>
                              <option value="2">غياب</option>
                          </select>
                          </div>
                        </div>                    
                  </div>
                <button type="submit" class="btn btn-info">إضافة</button>
                </form>


        </div>
    </div>
</div>


@endsection
