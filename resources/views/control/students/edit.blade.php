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

    $(document).ready(function () {
        if($('.thisNotAllowFirstOption'))
    });

</script>
@endsection

@extends('layouts.app')
@section('content')

<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <h4 class="card-title" >نعديل بيانات طالب</h4>
                    <p class="card-category"></p>
                  </li>
                </ul>
              </div>
            <form action="{{action('StudentsController@update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="name">إسم الطالب</label>
                        <input type="text" class="form-control name" name="name" id="name" aria-describedby="name"
                            placeholder="إسم الطالب" required autocomplete="name" value="{{$data->name}}">
                    </div>


                    <div class="form-group">
                        <label for="bod">تاريخ الميلاد</label>
                        <input type="date" class="form-control" name="bod" id="bod" aria-describedby="bod"
                            placeholder="تاريخ الميلاد" required autocomplete="bod" value="{{$data->bod}}">
                    </div>


                    <div class="form-group">
                        <label for="phone">رقم جوال الطالب</label>
                        <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone"
                            placeholder="رقم جوال الطالب" required autocomplete="phone" value="0{{$data->phone}}">
                    </div>


                    <div class="form-group">
                        <label for="photo">صورة الطالب</label>
                        <input type="file" class="form-control" name="photo" id="photo" aria-describedby="photo"
                            value="{{$data->photo}}">
                    </div>


                    <div class="form-group">
                        <label for="address">عنوان الطالب</label>
                        <input type="text" class="form-control" name="address" id="address" aria-describedby="address"
                            placeholder="عنوان الطالب" required autocomplete="address" value="{{$data->address}}">
                    </div>


                    <div class="form-group">
                        <label for="wallet_id">المحفظ</label>
                        <select class="form-control thisNotAllowFirstOption" name="wallet_id" id="wallet_id" aria-describedby="wallet_id"
                            required autocomplete="allUsers">
                            <option selected="true" disabled="disabled">إختار المحفظ</option>

                            @foreach($allUsers as $user)
                            @if($user->role == 3)
                            <option value="{{$user->id}}" @if($data->wallet_id == $user->id) selected @endif
                                >{{$user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="pearint_id">الأب</label>
                        <select class="form-control thisNotAllowFirstOption" name="pearint_id" id="pearint_id" aria-describedby="pearint_id"
                            value="{{old('pearint_id')}}">
                            <option selected="true" disabled="disabled">إختار الأب</option>

                            @foreach($allUsers as $user)
                            @if($user->role == 4)
                            <option value="{{$user->id}}" @if($data->pearint_id == $user->id) selected @endif
                                >{{$user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="program_id thisNotAllowFirstOption">البرنامج</label>
                        <select class="form-control" name="program_id" id="program_id" aria-describedby="pearint_id">
                            <option selected="true" disabled="disabled">إختار البرنامج</option>

                            @foreach($programs as $program)
                            <option value="{{$program->id}}" @if($data->program_id == $program->id) selected @endif
                                >{{$program->title}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="rating">التقيم</label>
                        <input type="number" class="form-control" name="rating" id="rating" aria-describedby="rating"
                            placeholder="تقيم الطالب" required autocomplete="rating" value="{{$data->rating}}">
                    </div>


                    <button type="submit" class="btn btn-info">تعديل</button>
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
