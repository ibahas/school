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
{{--  --}}
<div class="row">
    <table class="table" style="overflow: hidden" id="funSearch">
        <thead>
            <th>الطالب</th>
            <th>التاريخ</th>
        </thead>
        <tbody>
            @foreach ($findChildren as $row)
            <tr >
                <td>{{$row->name}}</td>
                <td>
                    @foreach ($findPresenceChildren as $item)
                        @if ($item->student_id == $row->id)
                            <p class="@if($item->status == 0)  text-success  @elseif($item->status == 2) text-danger  @else text-warning  @endif"> {{$item->date}} </p>
                        @endif
                    @endforeach
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
