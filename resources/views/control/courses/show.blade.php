@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
@include('sweet::alert')
@endsection

@extends('layouts.app')
@section('content')
<div class="clearfix">        
    <div class="float-right">
        <a class="nav-link" href="{{action('PresencecoursesController@create',$courses->id)}}">
            <p><i class="material-icons">add</i>إضافة أيام عمل للدورة</p>
        </a>
    </div>
    <div class="float-left">
        <a class="nav-link " href="{{action('CoursetestingController@create',$courses->id)}}">
            <p><i class="material-icons">add</i>إضافة علامة إختبار الدورة</p>
        </a>
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
              <br>
              <div class="row">
                  <div class="col-md-12 col-xl-12 col-sm-12 col-lg-12">
                      <div class="clearfix">
                          <div class="float-right">
                                <a class="nav-link " href="{{action('CoursestudentsController@create',$courses->id)}}">
                                    <p><i class="material-icons">add</i>إضافة طالب للدورة</p>
                                </a>
                          </div>
                      </div>
                  </div>
              </div>
                <table class="table">
                    <thead>
                        <th>إسم الطالب</th>
                        <th>الحالة</th>
                        <th>درجة الإختبار</th>
                        <th>العمليات</th>
                    </thead>
                    <tbody>
                        
                        <form action="{{action('CoursestudentsController@updateAllRows')}}" method="post">
                            @csrf
                            {{-- @method('PUT') --}}
                            
                            @foreach ($coursesStds as $row)
                            @php
                                $thiStudentCount = App\coursetesting::where('course_id',$courses->id)->where('student_id',$row->student_id)->count();
                                $thiStudent = App\coursetesting::where('course_id',$courses->id)->where('student_id',$row->student_id)->first();
                            @endphp
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
                                    @if ($thiStudentCount !== 0)
                                        {{$thiStudent->rating}}
                                    @elseif($thiStudentCount == 0 && $row->status)
                                        <p class="text-warning"> يرجى إضافة علامة الطالب</p> 
                                    @else
                                    <p class="text-info"> الدورة في تقدم</p> 
                                    @endif
                                </td>
                                <td>
                                    <a href="{{action('PresencecoursesController@showDetailsStudent',[$courses->id,$row->student_id])}}">  عرض أيام عمل الدورة</a>
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
