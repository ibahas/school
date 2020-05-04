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
        <a href="{{action('ProgramsController@create')}}">ADD</a>
    </div>
</div>
<div class="row">
    <table dir="ltr" class="table">
        <thead>
            <th>عنوان البرنامج</th>
            <th>تفاصيل البرنامج</th>
            <th>من طرف</th>
            <th>العمليات</th>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr scope="row">
                <td>{{$row->title}}</td>
                <td>{{$row->description}}</td>
                <td>{{App\User::find($row->user_id)->title}}</td>
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
