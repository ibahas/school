@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
<script>
  $(document).ready(function () {
      $(".sweet-overlay").fadeTo(2000, 500).slideUp(500, function () {
          $(".sweet-overlay").slideUp(500);
      });س
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
    <div class="tab">
        <div class="nav">
            <ul class="navbar-nav">
            <li class="nav-item"></li>
            <a class="nav-link" href="{{route('createUser')}}">
                <p>
                <i class="material-icons">person_add</i>
                إضافة محفظ جديد</p>
            </a>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <table dir="rtl" class="table" id="funSearch">
        <thead>
            <th>الإسم</th>
            <th>رقم الجوال</th>
            <th>الإيميل</th>
            <th>العمليات</th>
        </thead>
        <tbody>
            <tr scope="row">
                <td>{{$data->name}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->email}}</td>
                <td>
                <form action="{{route('updatePassword',$data->id)}}" method="POST">
                    @csrf
                    <input type="password" name="password" placeholder="كلمت المرور الجديدة">
                    <br>
                    <input type="password" name="confirmPassword" placeholder="تأكيد كلمت المرور">
                    <br>
                    <button type="submit" class="btn btn-success">تحديث</button>
                </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
