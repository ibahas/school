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
    @if(count($errors))@foreach ($errors->all() as $item)
    swal({"timer":2500,"html":true,"title":"{{$item}}","showConfirmButton":false,"type":"error"});
    @endforeach  @endif
</script>
@endsection

@extends('layouts.app')
@section('content')


<!--
<v class="row">

    <div class="col-md-6">
        <form action="{{route('updatePassword',$data->id)}}" method="post">
            @csrf
            <input type="password" name="oldPassword" id="oldPassword" class="col-3" required
                value="{{ old('oldPassword') }}" autocomplete="oldPassword" placeholder="كلمت السر الفديمة">
                <br>
            <input type="password" name="password" id="password" class="col-3" required
                value="{{ old('password') }}" autocomplete="password" placeholder="كلمت السر الجديدة">
                <br>
            
                <input id="confirmPassword" type="password" required name="confirmPassword"
                value="{{ old('confirmPassword') }}" autocomplete="new-password" placeholder="تأكيد كلمت المرور الجديدة">
           
                <br>
                <button type="submit" class="btn btn-info submit" >تحديث</button>
        </form>
    </div>

    di
  -->



<div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-4">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="javascript:;">
                <img class="img photo" src="{{asset('image')}}/{{Auth::user()->photo}}" style=" height: 150px; width: 100%; " >
                <form action="{{url('/users/updatephoto')}}/{{Auth::user()->id}}" method="post" enctype="multipart/form-data"
                      onchange="submit();">
                      @csrf
                      @method('PUT')
                      <input type="file" name="photo" id="photo" hidden />
                      {{-- <button type="submit">submit</button> --}}
              </form>
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">
                @if (Auth::user()->role == 1)مدير
                @elseif(Auth::user()->role == 2)مشرف
                @elseif(Auth::user()->role == 3)معلم
                @elseif(Auth::user()->role == 4)أب
                @endif
              </h6>
              <h4 class="card-title">{{Auth::user()->name}}</h4>
              {{-- <p class="card-description">ABVCC</p> --}}
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary ">
            
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <h4 class="card-title" >تعديل البيانات الشخصية</h4>
                  <p class="card-category" style=" float: right; ">قم بتعديل البيانات الخاصة بك</p>
                </li>
              </ul>
            </div>
            <div class="card-body">
                <form action="{{route('userupdate')}}" method="post">
                    @csrf
                    @method('PUT')
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group is-filled">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <label class="card-title" >الإسم</label>
                        </li>
                      </ul>
                      <input type="text" class="form-control" name="name"  value="{{Auth::user()->name}}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group bmd-form-group is-filled">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <label class="card-title" >الإيميل</label>
                        </li>
                      </ul>
                      <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group is-filled">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <label class="card-title" >تاريخ الميلاد</label>
                        </li>
                      </ul>
                      <input class="form-control" type="date" name="bod" value="{{Auth::user()->bod}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group is-filled">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <label class="card-title" >العنوان</label>
                        </li>
                      </ul>
                      <input type="text" class="form-control"  name="address"  value="{{Auth::user()->address}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group bmd-form-group is-filled">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <label class="card-title" >رقم الجوال</label>
                        </li>
                      </ul>
                      <input  class="form-control"  type="number" name="phone"  value="{{Auth::user()->phone}}">
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">تحديث البيانات</button>
              </form>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
@endsection
