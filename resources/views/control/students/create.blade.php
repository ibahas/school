@section('header')
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
@endsection

@section('footer')
<script src="{!! asset('js/sweetalert/sweetalert.min.js') !!}"></script>
@include('sweet::alert')
<script>
    @if(count($errors))
        @foreach ($errors->all() as $item)
          swal({"timer":2500,"html":true,"title":"{{$item}}","showConfirmButton":false,"type":"info"});
        @endforeach
    @endif
</script>
@endsection

@extends('layouts.app')
@section('content')

<div class="row">
    <div class="tab">
        <a href="{{action('StudentsController@create')}}">ADD</a>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{action('StudentsController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <form>
                    <div class="form-group">
                        <label for="name">إسم الطالب</label>
                        <input type="text" class="form-control name" name="name" id="name" aria-describedby="name"
                            placeholder="إسم الطالب" required autocomplete="name" value="{{old('name')}}">
                    </div>


                    <div class="form-group">
                        <label for="bod">تاريخ الميلاد</label>
                        <input type="date" class="form-control" name="bod" id="bod" aria-describedby="bod"
                            placeholder="تاريخ الميلاد" required autocomplete="bod" value="{{old('bod')}}">
                    </div>


                    <div class="form-group">
                        <label for="phone">رقم جوال الطالب</label>
                        <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone"
                            placeholder="رقم جوال الطالب" required autocomplete="phone" value="{{old('phone')}}">
                    </div>


                    <div class="form-group">
                        <label for="photo">صورة الطالب</label>
                        <input type="file" class="form-control" name="photo" id="photo" aria-describedby="photo"
                            value="{{old('photo')}}">
                    </div>


                    <div class="form-group">
                        <label for="address">عنوان الطالب</label>
                        <input type="text" class="form-control" name="address" id="address" aria-describedby="address"
                            placeholder="عنوان الطالب" required autocomplete="address" value="{{old('address')}}">
                    </div>


                    <div class="form-group">
                        <label for="wallet_id">المحفظ</label>
                        <select class="form-control" name="wallet_id" id="wallet_id" aria-describedby="wallet_id"
                            required autocomplete="allUsers" value="{{old('wallet_id')}}">

                            @foreach($allUsers as $user)
                            @if($user->role == 3)
                            <option value="{{$user->id}}" @if(old('wallet_id')==$user->id) selected
                                @endif>{{$user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="pearint_id">الأب</label>
                        <select class="form-control" name="pearint_id" id="pearint_id" aria-describedby="pearint_id"
                            value="{{old('pearint_id')}}">

                            @foreach($allUsers as $user)
                            @if($user->role == 4)
                            <option value="{{$user->id}}" @if(old('pearint_id')==$user->id) selected @endif
                                >{{$user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="program_id">البرنامج</label>
                        <select class="form-control" name="program_id" id="program_id" aria-describedby="pearint_id"
                            value="{{old('program_id')}}">

                            @foreach($programs as $program)
                            <option value="{{$program->id}}" @if(old('program_id')==$program->id) selected @endif
                                >{{$program->title}}</option>
                            @endforeach
                        </select>
                    </div>


                    <button type="submit" class="btn btn-info">إضافة</button>
                    {{-- @if(count($errors))
                    <ul> --}}
                    {{-- @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach --}}
                    {{-- </ul> --}}
                    {{-- @endif --}}
                </form>


        </div>
    </div>
</div>


@endsection
