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
            @foreach ($data as $row)
            @if($row->role == 3)
            <tr scope="row">
                <td>{{$row->name}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->email}}</td>
                <td>
                <form action="{{action('StafftimeController@store')}}" method="post" onchange="submit()">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$row->id}}">
                    <select name="state" >
                        <option aria-disabled="true" disabled selected>الحضور</option>
                        <option value="1">حضور</option>
                        <option value="2">غياب</option>
                    </select>
                </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
