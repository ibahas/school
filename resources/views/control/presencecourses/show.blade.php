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
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                    <h4 class="card-title">    إضافة حضور الطالب {{App\students::find($first->student_id)->name}}
                         للدورة :: {{App\courses::find($first->course_id)->title}}
                    </h4>
                        <p class="card-category"></p>
                    </li>
                </ul>
            </div>
            <table  class="table">
                <thead>
                    <th>التاريخ</th>
                    <th>الحالة</th>
                </thead>
                <tbody>
                    <form action="{{action('PresencecoursesController@updateStudentPresence')}}" method="POST">
                        @csrf
                        @foreach ($data as $row)
                            <tr scope="row">
                                @php
                                $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
                                $your_date = $row->date; // The Current Date
                                $en_month = date("M", strtotime($your_date));
                                foreach ($months as $en => $ar) {
                                    if ($en == $en_month) { $ar_month = $ar; }
                                }
                            
                                $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
                                $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
                                $ar_day_format  = date("D", strtotime($your_date));
                                $ar_day = str_replace($find, $replace, $ar_day_format);
                                
                            @endphp
                                <td  data-toggle="tooltip" data-placement="right" title="{{$row->date}}">{{$ar_day}}</td>
                                <td>
                                    <select name="status[]" id="">
                                        <option value="0" @if($row->status == 0) selected @endif>غياب</option>
                                        <option value="1" @if($row->status == 1) selected @endif>حضور</option>
                                    </select>
                                    <input type="number" name="id[]" value="{{$row->id}}" hidden>
                                </td>
                            </tr>
                        @endforeach
                        <button class="btn btn-success">تحديث</button>
                    </form>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
