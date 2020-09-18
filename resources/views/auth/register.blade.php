@extends('layouts.log')

@section('contents')

<form action="{{ route('register')  }}" class="m-login__form m-form" method="post" role="form">
    @csrf

    <div class="form-group m-form__group">
        <input class="form-control m-input" type="name"  placeholder="إسم المستخدم" name="name"   value="{{ old('name') }}" autofocus/>
        @error('name')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
     </div>


    <div class="form-group m-form__group">
       <input class="form-control m-input" type="email"  placeholder="البريد الإلكتروني" name="email"   value="{{ old('email') }}" required autocomplete="email"  />
       @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group m-form__group">
       <input class="form-control m-input m-login__form-input--last" type="password" placeholder="كلمة المرور" name="password"  required autocomplete="new-password" />
       @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group m-form__group">
        <input class="form-control m-input m-login__form-input--last" type="password" placeholder="كلمة المرور" name="password_confirmation"  required autocomplete="new-password" />
        @error('password_confirmation')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
     </div>

     <div class="row m-login__form-sub">
        <div class="col m--align-left m-login__form-left">
           <label class="m-checkbox  m-checkbox--light"  style="background-color: #9acd3200 !important;">
             <input id="RememberMe" name="RememberMe" type="checkbox" value="true" />
             <input name="RememberMe" type="hidden" value="false" /> <h6 style="font-weight: bolder">تذكرني</h6> 
             <span class="che"></span>
           </label>
        </div>
     </div>
    <div class="m-login__form-action">
       <button id="m_login_signin_submit" type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">تسجيل الدخول </button>
    </div>
 </form>



@endsection
