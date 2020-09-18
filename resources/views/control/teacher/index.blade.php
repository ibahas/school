@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">


@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
<script>


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
    <table class="table">
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
                <td>
                    <a href="{{action('PresencestudentsController@create',$row->id)}}" data-toggle="tooltip" data-placement="top" title="إضافة حضور">
                        <i class="material-icons">note_add</i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
