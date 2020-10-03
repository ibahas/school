@extends('layouts.log')

@section('contentLog')

<form action="{{ route('login') }}" class="m-login__form m-form" method="post" role="form">
    @csrf
    <div class="form-group m-form__group">
       <input class="form-control m-input"  type="email"  placeholder="البريد الإلكتروني" name="email"   value="{{ old('email') }}" required autocomplete="email" autofocus/>
       @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group m-form__group">
       <input class="form-control m-input m-login__form-input--last" type="password" placeholder="كلمة المرور" name="password" />
       @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row m-login__form-sub" >
       <div class="col m--align-left m-login__form-left">
          <label class="m-checkbox  m-checkbox--light" style="background-color: #9acd3200 !important;">
            <input id="RememberMe" name="RememberMe" type="checkbox" value="true" />
            <input name="RememberMe" type="hidden" value="false" /> تذكرني
            <span class="che"></span>
          </label>
       </div>
    </div>
    <div class="m-login__form-action">
       <button id="m_login_signin_submit" type="submit" class="btn btn-focus m-btn m-btn--pill   m-login__btn">تسجيل الدخول </button>
    </div>
 </form>

@endsection
