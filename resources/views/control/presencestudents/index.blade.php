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
    <table class="table">
        <thead>
            <th>الطالب</th>
            <th>التاريخ</th>
            <th>الحالة</th>
            @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                <th>من طرف</th>
                <th>العمليات</th>
            @endif
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr scope="row">
                <td>{{App\students::find($row->student_id)->name}}</td>
                <td>{{$row->date}}</td>
                <td>{{$row->status}}</td>
                @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                <td>{{App\User::find($row->user_id)->name}}</td>
                <td>
                    <a href="{{action('StudentsController@edit',$row->id)}}">تعديل</a>
                    <br>
                    <a href="{{action('StudentsController@show',$row->id)}}">حذف</a>
                </td>

                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
