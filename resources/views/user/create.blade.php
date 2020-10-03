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

<form action="{{route('storeUser')}}" method="post">
    @csrf
    <input type="text" name="name" id="name" placeholder="name" value="{{ old('name') }}" required autocomplete="name"
        autofocus>
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <input type="text" name="email" id="email" value="{{ old('email') }}" required autocomplete="email">
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <input type="date" name="bod" id="bod" placeholder="bod" value="{{ old('bod') }}" required autocomplete="bod">
    @error('bod')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <input type="text" name="address" id="address" placeholder="address" value="{{ old('address') }}" required
        autocomplete="address">
    @error('address')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <input type="text" name="photo" id="photo" placeholder="photo" value="{{ old('photo') }}" required
        autocomplete="photo">
    <input type="number" name="phone" id="phone" placeholder="phone" value="{{ old('phone') }}" required
        autocomplete="phone">
    <input type="number" name="role" id="role" placeholder="role" value="{{ old('role') }}" required
        autocomplete="role">
    @error('role')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <input type="password" name="password" id="password" placeholder="password" value="{{ old('password') }}" required
        autocomplete="password">
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
            autocomplete="new-password" placeholder="C_password">
    </div>
    <button type="submit">ADD</button>
</form>
@endsection
