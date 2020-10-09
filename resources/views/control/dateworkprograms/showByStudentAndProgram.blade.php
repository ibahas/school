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
                    <h4 class="card-title" style="float:right !important">عرض أيام عمل البرنامج للطالب  :: {{App\students::find($idStudent)->name}}</h4>
                    <bdo  class="card-category" style="float:right !important"></bdo>
                  </li>
                </ul>
              </div>
         

<div class="data"  >
    <table  class="table">
        <thead>
            <th>*</th>
            <th>اليوم</th>
            <th>من</th>
            <th>الى</th>
            <th>الحالة</th>
            @if (Auth::user()->role == 1 || Auth::user()->role == 2)
               <th>التقيم</th>
               <th>الحالة</th>
               <th>العمليات</th>
            @endif
        </thead>
        <tbody>
            @php
             $i = 1;   
            @endphp
            <form action="{{action('DateworkprogramsController@updateAll')}}" method="post">
                @csrf

                @foreach ($data as $row)
                <tr scope="row" @if($i % 8 == 0) style="border-top-color: #4caf50 !important; border-top: solid;" @endif>
                    <td>{{$i++}}</td>
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
                    <td  data-toggle="tooltip" data-placement="bottom" title="{{$row->date}}">{{$ar_day}}</td>
                    <td>{{$row->from}}</td>
                    <td>{{$row->to}}</td>
                    <td>@if ($row->status == 0) <p class="text-warning">جاري</p> @else <strong class="text-success"> تم </strong> @endif</td>
                    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                    <td>
                        @if ($row->status == 0)
                        <input type="number" value="{{$row->evaluation}}" name="evaluation[]">
                        <input type="number" value="{{$row->id}}" name="id[]" hidden>
                        @else
                        {{$row->evaluation}} 
                        @endif
                    </td>
                    @endif
                    <td>
                        <select name="status[]">
                            <option selected="true" disabled="disabled">إختار الحالة</option>
                            <option value="0" @if($row->status == 0) selected @endif>جاري</option>
                            <option value="1" @if($row->status == 1) selected @endif>تم</option>
                        </select>
                    </td>
                    <td class="td-actions text-right">
                        <a href="{{action('DateworkprogramsController@edit',$row->id)}}" type="button" rel="tooltip" data-toggle="tooltip" data-placement="bottom" title="تعديل يوم العمل"
                            class="btn btn-success sm"  style=" padding-bottom: 15px; padding-top: 15px; ">
                          <i class="material-icons" style=" margin-top: -9px; ">edit</i>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger sm" data-toggle="tooltip" data-placement="bottom" title="حذف"
                          style=" padding-bottom: 15px; padding-top: 15px; ">
                          <i class="material-icons" style=" margin-top: -9px; ">close</i>
                        <div class="ripple-container"></div></button>
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
</div>
@endsection
