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
            <a class="nav-link" href="{{action('PresencecoursesController@create',$courses->id)}}">
                <p>
                <i class="material-icons">person_add</i>
                إضافة أيام عمل للدورة</p>
            </a>
            </ul>
        </div>
    </div>
  </div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                  <h4 class="card-title" >الدورة {{$courses->title}}</h4>
                    <p class="card-category"></p>
                  </li>
                </ul>
              </div>
                <table class="table">
                    <thead>
                        <th>إسم الطالب</th>
                        <th>الحالة</th>
                        <th>العمليات</th>
                    </thead>
                    <tbody>
                        <form action="{{action('CoursestudentsController@updateAllRows')}}" method="post">
                            @csrf
                            {{-- @method('PUT') --}}
                            
                            @foreach ($coursesStds as $row)
                              <tr scope="row">
                                <td>{{App\students::find($row->student_id)->name}}</td>
                                    <input type="number" name="ids[]" hidden  value="{{$row->id}}">
                                <td>
                                    <select name="status[]">
                                        <option selected="true" disabled="disabled">إختار الحالة</option>
                                        <option value="0" @if($row->status == 0) selected @endif>جاري</option>
                                        <option value="1" @if($row->status == 1) selected @endif>ختم الدورة</option>
                                </select>
                                </td>
                                <td>
                                    <a href="{{action('PresencecoursesController@showDetailsStudent',[$courses->id,$row->id])}}">عرض أيام عمل الدورة</a>
                                    <br>
                                    <a href="{{action('CoursestudentsController@destroy',$row ->id)}}">حذف</a>
                                </td>
                            </tr>
                            @endforeach
                            <button class="btn btn-success"> تحديث </button>
                            
                        </form>
                    </tbody>
                </table>
        </div>
    </div>
</div>



@endsection
