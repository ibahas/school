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
        <a href="{{action('ProgramsController@create')}}">
            <i class="material-icons">add_circle_outline</i>
            إضافة برنامج جديد 
    </a>
    </div>
</div>
<div class="row">
    <table class="table" id="funSearch">
        <thead>
            <th>عنوان البرنامج</th>
            <th>تفاصيل البرنامج</th>
            <th>من طرف</th>
            <th>تاريخ  عمل البرنامج</th>
            <th>العمليات</th>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr scope="row">
                <td>{{$row->title}}</td>
                <td>{{$row->description}}</td>
                <td>{{App\User::find($row->user_id)->name}}</td>
                <td style="width: 25%">{{$row->date_start}} - {{$row->expires_at}}</td>
                <td>
                    <a href="{{action('ProgramsController@edit',$row->id)}}">تعديل</a>
                    <br>
                    <a href="{{action('ProgramsController@show',$row->id)}}">عرض</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
