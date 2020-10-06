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
    <div class="tab">
        <div class="nav">
            <ul class="navbar-nav">
            <li class="nav-item"></li>
            <a class="nav-link" href="{{action('StudentsController@create')}}">
                <p>
                <i class="material-icons">person_add</i>
                إضافة طالب</p>
            </a>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <table class="table" id="funSearch">
        <thead>
            <th>الطالب</th>
            <th>اليوم</th>
            <th>التقييم</th>
            <th>الحالة</th>
            <th>من طرف</th>
            <th>البرنامج</th>
            <th>العمليات</th>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr scope="row">
                <td>{{App\students::find($row->student_id)->name}}</td>
                <td>{{$row->date}}</td>
                <td>{{$row->evaluation}}</td>
                <td>{{$row->status}}</td>
                <td>{{App\User::find($row->user_id)->name}}</td>
                <td>{{App\programs::find($row->program_id)->title}}</td>
                <td>
                    <a href="{{action('StudentsController@edit',$row->id)}}">تعديل</a>
                    <br>
                    <a href="{{action('StudentsController@show',$row->id)}}">عرض</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
