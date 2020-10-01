@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
@include('sweet::alert')
@endsection

@extends('layouts.app')
@section('content')


<div class="data">
    <table dir="ltr" class="table">
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
            <tr scope="row">
                <td>{{$data->name}}</td>
                <td>{{$data->bod}}</td>
                <td>0{{$data->phone}}</td>
                <td>{{$data->rating}}</td>
                <td>{{App\User::find($data->wallet_id)->name}}</td>
                <td>{{App\User::find($data->pearint_id)->name}}</td>
                <td>{{App\programs::find($data->program_id)->title}}</td>
                <td>
                    <a href="{{action('StudentsController@edit',$data->id)}}">تعديل</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@endsection
