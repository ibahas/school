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
    @if(count($errors))@foreach ($errors->all() as $item)
    swal({"timer":2500,"html":true,"title":"{{$item}}","showConfirmButton":false,"type":"error"});
    @endforeach  @endif
</script>
@endsection

@extends('layouts.app')
@section('content')

<div class="row">
    <div class="tab">
        <div class="nav">
            <ul class="navbar-nav">
            <li class="nav-item"></li>
            <a class="nav-link" href="{{route('createUser')}}">
                <p>
                <i class="material-icons">person_add</i>
                إضافة محفظ جديد</p>
            </a>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <table dir="rtl" class="table" id="funSearch">
        <thead>
            <th>الإسم</th>
            <th>رقم الجوال</th>
            <th>الإيميل</th>
            <th>العمليات</th>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr scope="row">
                <td>{{$row->name}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->email}}</td>
                <td>
                    @if (Auth::user()->role == 1 )
                    @if($row->role == 1)
                    @else
                        <a class="btn btn-success btn-sm"  data-toggle="tooltip" data-placement="bottom" title="تحديث كلمت المرور" 
                        href="{{route('updateUser',$row->id)}}">
                            <i class="material-icons" style="padding-top: 1rem;padding-bottom: 1rem">vpn_key</i>
                        </a>

                        <form style="display: inline-block;" action="{{route('banndUser',$row->id)}}"
                            method="post">
                            @csrf

                            @if($row->status == 0)
                            <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="فك حضر"
                                type="submit">
                                <i class="material-icons" style="padding-top: 1rem;padding-bottom: 1rem">delete_forever</i>
                            </button>
                            @else
                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="حظر"
                                type="submit">
                                <i class="material-icons" style="padding-top: 1rem;padding-bottom: 1rem">delete_forever</i>
                            </button>
                            @endif
                        </form>
                        @endif
                    @endif
                    @if (Auth::user()->role == 2)
                        @if($row->role == 1 || $row->role == 2)
                            @else
                            <a class="btn btn-success btn-sm"  data-toggle="tooltip" data-placement="bottom" title="تحديث كلمت المرور" 
                            href="{{route('updateUser',$row->id)}}">
                                <i class="material-icons" style="padding-top: 1rem;padding-bottom: 1rem">vpn_key</i>
                            </a>
                        @endif
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
