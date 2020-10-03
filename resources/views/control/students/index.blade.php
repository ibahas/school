@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
@include('sweet::alert')
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
<div class="row table-responsive">
  <table class="table" id="funSearch">
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
              <td style="padding: 0 !important">
                <div class="bd-example">
                  <button type="button" data-toggle="tooltip" data-placement="bottom" title="تعديل" 
                  class="btn btn-primary btn-sm" onClick="window.open('{{action('StudentsController@edit',$row->id)}}');">
                  <br>
                     <i class="material-icons">mode_edit</i>
                     </button>
                 <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="عرض"
                  onClick="window.open('{{action('StudentsController@show',$row->id)}}');">
                     <br>
                     <i class="material-icons">open_in_new</i>
                     </button>
                 {{-- <a href="{{route('createPS',$row->id)}}">إضافة حضور</a> --}}
                 <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="إضافة حضور"
                  onclick="document.getElementById('id_{{$row->id}}').style.display='block'">
                  <br>
                     <i class="material-icons">add_circle_outline</i>
                 </button>
                 <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="إضافة بلاغ"
                 onClick="window.open('{{route('createReport',$row->id)}}');">
                     <br>
                     <i class="material-icons">error_outline</i>
                 </button>                 
                    @foreach ($data as $row)
                      @include('control.model.modelStudents')
                    @endforeach
                </div>
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
