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
                    <h4 class="card-title">إضافة علامة الإختبار النهائي للدورة {{$course->title}}</h4>
                        <p class="card-category"></p>
                    </li>
                </ul>
            </div>
            <form action="{{action('CoursetestingController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <table class="table" id="funSearch">
                        <thead>
                            <th>الإسم</th>
                            <th>العلامة</th>
                        </thead>
                        <tbody>
                            @foreach ($coursestudents as $row)
                            @php
                                $thiStudent = App\coursetesting::where('course_id',$course->id)->where('student_id',$row->student_id)->count();
                            @endphp
                            <tr scope="row">
                                <td>{{App\students::find($row->student_id)->name}}</td>
                                <td>
                                    @if ($row->status == 0)
                                        <p data-toggle="tooltip" data-placement="right" title="يتم قبوله من قبل الأدمن" >
                                        جاري</p>
                                    @else
                                    @if($thiStudent !== 0) 
                                    <p class="text-success" data-toggle="tooltip" data-placement="right" title="هذا الطالب تم إضافة علامة الدورة مسبقاً" >
                                        تم</p>
                                    @endif
                                    <input @if($thiStudent !== 0) hidden @endif  type="number"  name="rating[]">
                                    <input @if($thiStudent !== 0) hidden @endif type="number" value="{{$row->student_id}}"  name="student_id[]" required hidden>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <input type="number" value="{{$course->id}}" name="course_id" hidden>

                <button type="submit" class="btn btn-info">إضافة</button>
            </form>


        </div>
    </div>
</div>


@endsection