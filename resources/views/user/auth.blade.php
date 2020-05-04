

@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
@include('sweet::alert')
<script>
    @if(count($errors))@foreach ($errors->all() as $item)
    swal({"timer":2500,"html":true,"title":"{{$item}}","showConfirmButton":false,"type":"error"});
    @endforeach  @endif
</script>
@endsection

@extends('layouts.app')
@section('content')

@if (Auth::user()->role == 1)مدير
@elseif(Auth::user()->role == 2)مشرف
@elseif(Auth::user()->role == 3)معلم
@elseif(Auth::user()->role == 4)أب
@endif

<div class="row">
    <div class="col-md-6">
        <form action="/users/updatephoto/{{Auth::user()->id}}" method="post" enctype="multipart/form-data"
            onchange="submit();">
            @csrf
            @method('PUT')
            <input type="file" name="photo" id="photo" hidden />
            {{-- <button type="submit">submit</button> --}}
        </form>
        <p class="fa fa-edit photos" title="تغير الصورة"
            style=" position: absolute; top: 72px; left: 76px; z-index: 999999999999999999999999; color: white; display: none;">
        </p>
        <img src="/image/{{Auth::user()->photo}}" class="photo" height="150" width="150"
            title="{{App\models\roles::find(Auth::user()->role)->title_ar}} || تغير الصورة" />
    </div>

    <div class="col-md-6">
        <form action="{{route('updatePassword',$data->id)}}" method="post">
            @csrf
            <label for="oldPassword">old password</label>
            <input type="password" name="oldPassword" id="oldPassword" class="col-3" required
                value="{{ old('oldPassword') }}" autocomplete="oldPassword">
            <label for="password">password</label>
            <input type="password" name="password" id="password" class="col-3" required
                value="{{ old('password') }}" autocomplete="password">
            <label for="confirmPassword">Confirm Password</label>
            <input id="confirmPassword" type="password" required name="confirmPassword"
                value="{{ old('confirmPassword') }}" autocomplete="new-password" placeholder="Confirm Password">
            <button type="submit" class="btn btn-info submit" >sumbit</button>


        </form>
    </div>
</div>

@endsection
