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
    @if (count($errors)) @foreach($errors -> all() as $item)
    swal({ "timer": 2500, "html": true, "title": "{{$item}}", "showConfirmButton": false, "type": "warning" });
    @endforeach
    @endif
</script>
@endsection

@extends('layouts.app')
@section('content')


<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <h4 class="card-title">إضافة طالب جديد لدورة {{$findCourse->title}}
                        </h4>
                        <p class="card-category"></p>
                    </li>
                </ul>
            </div>
            <form action="{{action('CoursestudentsController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <form>
                    <input type="hidden" name="course" value="{{$findCourse->id}}">

                    <div class="row table-responsive">
                        <table class="table" id="funSearch">
                        <thead>
                            <th>الإسم</th>
                            <th>تاريخ الميلاد</th>
                            <th>رقم الجوال</th>
                            <th>المحفظ</th>
                            <th>الأب</th>
                            <th>البرنامج الحالي</th>
                            <th>الإضافة</th>
                        </thead>
                        <tbody>
                            @foreach ($studnets as $row)
                                @foreach ($thisCourseStudents as $item)
                                    @if($item->student_id == $row->id) 
                                        <script>
                                            $(document).ready(function () {
                                                $('#id_{{$row->id}}').prop('disabled','true');
                                                $('#id_{{$row->id}}').attr('data-toggle','tooltip');
                                                $('#id_{{$row->id}}').attr('data-placement','top');
                                                $('#id_{{$row->id}}').attr('title','هذا الطالب موجد بالفعل بهذه الدورة');
                                            });
                                        </script>        
                                    @endif
                                @endforeach
                                <tr>
                                    <td >{{$row->name}}</td>
                                    <td>{{$row->bod}}</td>
                                    <td>0{{$row->phone}}</td>
                                    <td>{{App\User::find($row->wallet_id)->name}}</td>
                                    <td>{{App\User::find($row->pearint_id)->name}}</td>
                                    <td>{{App\programs::find($row->program_id)->title}}</td>
                                    <td>
                                        <input id="id_{{$row->id}}"  type="checkbox" name="student_id[]" value="{{$row->id}}" id="studnets_{{$row->id}}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                
                    <button type="submit" class="btn btn-info">إضافة</button>
                </form>


        </div>
    </div>
</div>


@endsection