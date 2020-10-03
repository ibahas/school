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
    <table class="table" id="funSearch">
        <thead>
            <th>الإسم</th>
            <th>تاريخ الميلاد</th>
            <th>رقم الجوال</th>
            <th>أخر درجة</th>
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
                <td>{{App\User::find($row->pearint_id)->name}}</td>
                <td>{{App\programs::find($row->program_id)->title}}</td>
                <td style="padding: 0 !important">
                    <div class="bd-example">
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
                    </div>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@foreach ($data as $row)
@include('control.model.modelStudents')
@endforeach
