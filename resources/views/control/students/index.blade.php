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
    <table class="table">
        <thead>
            <th>الإسم</th>
            <th>تاريخ الميلاد</th>
            <th>رقم الجوال</th>
            <th>أخر درجة</th>
            <th>المحفظ</th>
            <th>الأب</th>
            <th>البرنامج الحالي</th>
            <th>العمليات</th>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr scope="row">
                <td>{{$row->name}}</td>
                <td>{{$row->bod}}</td>
                <td>0{{$row->phone}}</td>
                <td>{{$row->rating}}</td>
                <td>{{App\User::find($row->wallet_id)->name}}</td>
                <td>{{App\User::find($row->pearint_id)->name}}</td>
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







{{-- عرض الطلاب بمجمعات.....#####

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home" class="active">Home</a></li>
    <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active in show" >
      <h3>HOME</h3>
      <p>Some content.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Some content in menu 1.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Some content in menu 2.</p>
    </div>
  </div> --}}




@endsection
