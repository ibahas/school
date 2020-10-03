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
            <a class="nav-link" href="{{action('CoursesController@create')}}">
                <p>
                <i class="material-icons">person_add</i>
                إضافة دورة جديدة</p>
            </a>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <table class="table" id="funSearch">
        <thead>
            <th>العنوان</th>
            <th>الوصف</th>
            <th>الحالة</th>
            <th>العمليات</th>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr scope="row">
                <td>{{$row->title}}</td>
                <td>{{ \Illuminate\Support\Str::limit($row->description, 40) }}</td>
                <td>
                    @if ($row->status == 1)
                        <button class="btn btn-success">فعال</button>
                    @else    
                        <button class="btn btn-warning">غير فعال</button>
                    @endif
                </td>
                <td>
                    <a href="{{action('CoursesController@edit',$row->id)}}">تعديل</a>
                    <br>
                    <a href="{{action('CoursesController@show',$row->id)}}">عرض</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
