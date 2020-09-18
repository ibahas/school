@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
@include('sweet::alert')
@endsection

@extends('layouts.app')
@section('content')

<div class="row" dir="rtl">
      <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <h4 class="card-title" style="float:right !important">عرض تفاصيل البرنامج :: {{$data->title}}</h4>
                    <bdo  class="card-category" style="float:right !important">{{$data->description}}</bdo>
                  </li>
                </ul>
              </div>
          </div>
      </div>
</div>

<div class="data"  >
    <table  class="table">
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
            @foreach ($students as $student)
            <tr scope="row">
                    
                <td>{{$student->name}}</td>
                <td>{{$student->bod}}</td>
                <td>0{{$student->phone}}</td>
                <td>{{$student->rating}}</td>
                <td>{{App\User::find($student->wallet_id)->name}}</td>
                <td>{{App\User::find($student->pearint_id)->name}}</td>
                <td>{{App\programs::find($student->program_id)->title}}</td>
                <td>
                    <a href="{{action('StudentsController@edit',$student->id)}}">تعديل</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
