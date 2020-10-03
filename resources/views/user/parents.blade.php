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
                    <a class="btn btn-success">تعديل</a>
                <form action="{{url('users/destroy')}}/{{ $row->id }}" method="post">
                            @csrf
                        <button type="submit" class="btn btn-warning">حذف</button>
                    </form>
                    {{-- <a class="btn btn-success"></a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
