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
          </div>
      </div>
</div>

<div class="data"  >
    <table  class="table">
        <thead>
            <th>اليوم</th>
            <th>من</th>
            <th>الى</th>
            <th>الحالة</th>
            @if (Auth::user()->role == 1 || Auth::user()->role == 2)
               <th>التقيم</th>
            @endif
        </thead>
        <tbody>
            <form action="{{action('DateworkprogramsController@updateAll')}}" method="post">
                @csrf

                @foreach ($data as $row)
                <tr scope="row">
                    <td>{{$row->date}}</td>
                    <td>{{$row->from}}</td>
                    <td>{{$row->to}}</td>
                    <td>@if ($row->status == 0) <p class="text-warning">جاري</p> @else تم @endif</td>
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
                </tr>
                @endforeach
                <button class="btn btn-success">تحديث</button>

            </form>

        </tbody>
    </table>
</div>


@endsection
