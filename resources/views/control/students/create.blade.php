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
    @if (count($errors)) @foreach($errors -> all() as $item)
    swal({ "timer": 2500, "html": true, "title": "{{$item}}", "showConfirmButton": false, "type": "warning" });
    @endforeach
    @endif
</script>


<script>
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

$('#blah').click(function (e) { 
    e.preventDefault();
    $('#imgInp').click();
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
                        <h4 class="card-title">إضافة طالب جديد</h4>
                        <p class="card-category"></p>
                    </li>
                </ul>
            </div>
            <form action="{{action('StudentsController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" style="float: right !important">إسم الطالب</label>
                                <input type="text" class="form-control name" name="name" id="name"
                                    aria-describedby="name" placeholder="إسم الطالب" required autocomplete="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" style="float: right !important">إسم الطالب</label>
                                <input type="date" class="form-control" name="bod" id="bod" aria-describedby="bod"
                                    placeholder="تاريخ الميلاد" required autocomplete="bod" value="{{old('bod')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" style="float: right !important">إسم الطالب</label>
                                <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone"
                                    placeholder="رقم جوال الطالب" required autocomplete="phone" value="{{old('phone')}}">
                            </div>
        
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="imgInp" style="float: right !important">صورة الطالب</label>
                                <input type="file" class="form-control" name="photo" id="imgInp" aria-describedby="photo"
                                    value="{{old('photo')}}">
                                    <img id="blah" height="180px" width="300px" src="{{url('image/students/icon/std.png')}}" alt="your image" />
                            </div>
        
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" style="float: right !important">عنوان الطالب</label>
                                <input type="text" class="form-control" name="address" id="address" aria-describedby="address"
                                    placeholder="عنوان الطالب" required autocomplete="address" value="{{old('address')}}">
                            </div>
        
        
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" style="float: right !important">إختار المحفظ</label>
                                <select class="form-control thisNotAllowFirstOption" name="wallet_id" id="wallet_id"
                                    aria-describedby="wallet_id" required autocomplete="allUsers" value="{{old('wallet_id')}}">
                                    <option selected="true" disabled="disabled">إختار المحفظ</option>
                                    @foreach($allUsers as $user)
                                    @if($user->role == 3)
                                    <option value="{{$user->id}}" @if(old('wallet_id')==$user->id) selected
                                        @endif>{{$user->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pearint_id" style="float: right !important">إختار الأب</label>
                                <select class="form-control thisNotAllowFirstOption" name="pearint_id" id="pearint_id"
                                    aria-describedby="pearint_id" value="{{old('pearint_id')}}">
                                    <option selected="true" disabled="disabled">إختار الأب</option>
                                    @foreach($allUsers as $user)
                                    @if($user->role == 4)
                                    <option value="{{$user->id}}" @if(old('pearint_id')==$user->id) selected @endif
                                        >{{$user->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="program_id" style="float: right !important">إختار البرنامج</label>
                                <select class="form-control thisNotAllowFirstOption" name="program_id" id="program_id"
                                    aria-describedby="pearint_id" value="{{old('program_id')}}">
                                    <option selected="true" disabled="disabled">إختار البرنامج</option>
                                    @foreach($programs as $program)
                                    <option value="{{$program->id}}" @if(old('program_id')==$program->id) selected @endif
                                        >{{$program->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                

                

                





                    <button type="submit" class="btn btn-info">إضافة</button>
                </form>


        </div>
    </div>
</div>


@endsection