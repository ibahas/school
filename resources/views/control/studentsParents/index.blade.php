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
    <table class="table" id="funSearch">
        <thead>
            @if(Auth::user()->role == 1 || Auth::user()->role == 2)
            <th>الأب</th>
            @endif
            <th>الطالب</th>
            <th>عنوان البلاغ</th>
            <th>العمليات</th>
        </thead>
        <tbody>
            @foreach ($data as $row)
            @if(Auth::user()->role == 1 || Auth::user()->role == 2)
            <tr scope="row">
                <td>{{App\User::find($row->parent)->name}}</td>
                <td>{{App\students::find($row->student)->name}}</td>
                <td>{{$row->titleReport}}</td>
                <td>
                    <a href="{{action('StudentsController@edit',$row->id)}}">تعديل</a>
                    <br>
                    <button type="button" class="btn btn-primary" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="إضافة حضور"
                    onclick="document.getElementById('id_{{$row->id}}').style.display='block'">
                        عرض التفاصيل
                    </button>

                </td>
            </tr>
            @endif
            @if(Auth::user()->role == 4 && $row->parent == Auth::user()->id)
            <tr scope="row">
                <td>{{App\students::find($row->student)->name}}</td>
                <td>{{$row->titleReport}}</td>
                <td>
                    <buttontype="button" class="btn btn-primary" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="إضافة حضور"
                    onclick="document.getElementById('id_{{$row->id}}').style.display='block'">
                        عرض التفاصيل
                    </button>
                    
                </td>
            </tr>
            @endif
            @if(Auth::user()->role == 3)
            @if(Auth::user()->id == $row->byUser)
            <tr scope="row">
                <td>{{App\User::find($row->parent)->name}}</td>
                <td>{{$row->titleReport}}</td>
                <td>
                    <a href="{{action('StudentsController@edit',$row->id)}}">تعديل</a>
                    <br>
                    <button type="button" class="btn btn-primary" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="إضافة حضور"
                    onclick="document.getElementById('id_{{$row->id}}').style.display='block'">
                        عرض التفاصيل
                    </button>

                </td>
            </tr>
            @endif
            @endif
            @endforeach
            @if(Auth::user()->role == 4 && $row->parenzt == Auth::user()->id)
                @foreach ($data as $row)
                        @include('control.model.modelReport')
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@if (Auth::user()->role == 1 || Auth::user()->role == 2)
    @foreach ($data as $row)
        @include('control.model.modelReport')
    @endforeach
@endif
@if (Auth::user()->role == 3)
    @foreach ($data as $row)
        @if(Auth::user()->id == $row->byUser)
            @include('control.model.modelReport')
        @endif
    @endforeach
@endif







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
