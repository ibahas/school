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




<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <h4 class="card-title" style="float: right !important">إضافة مستخدم جديد</h4>
                    <p class="card-category" style="float: right !important"></p>
                    </li>
                </ul>
            </div>

            <br>
            <br>
            <form action="{{route('storeUser')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control"  type="text" name="name" id="name" placeholder="إسم المستخدم" value="{{ old('name') }}" required autocomplete="name"
                            autofocus>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" placeholder="البريد الإلكتروني"  type="text" name="email" id="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control"  type="date" name="bod" id="bod" placeholder="تاريخ الميلاد" value="{{ old('bod') }}" required autocomplete="bod">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control"  type="text" name="address" id="address" placeholder="العنوان" value="{{ old('address') }}" required
                            autocomplete="address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-file-upload form-file-multiple">
                            <input type="file" multiple="" name="photo" class="inputFileHidden">
                            <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="الصورة">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-fab btn-round btn-primary">
                                        <i class="material-icons">attach_file</i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control"  type="number" name="phone" id="phone" placeholder="رقم الجوال" value="{{ old('phone') }}" required
                              autocomplete="phone">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control thisNotAllowFirstOption" name="role" id="role"
                                aria-describedby="pearint_id" value="{{old('role')}}">
                                <option selected="true" disabled="disabled">إختار الصلاحية</option>
                                <option value="1">مدير</option>
                                <option value="2">مشرف</option>
                                <option value="3">محفظظ</option>
                                <option value="4">ولي أمر</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control"  type="password" name="password" id="password" placeholder="كلمت المرور" value="{{ old('password') }}" required
                                autocomplete="password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" required
                                autocomplete="new-password" placeholder="تأكيد كلمت المرور">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">إضافة</button>
            </form>

        </div>
    </div>
</div>
@endsection
