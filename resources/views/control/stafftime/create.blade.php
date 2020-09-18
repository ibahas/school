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
    
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary ">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <h4 class="card-title" >إضافة برنامج جديد</h4>
                    <p class="card-category"></p>
                  </li>
                </ul>
              </div>
            <form action="{{action('ProgramsController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" aria-describedby="title"
                            placeholder="عنوان البرنامج" required autocomplete="title" >
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group is-filled">
                          <input type="text" class="form-control" placeholder="وصف البرنامج" name="description" >
                        </div>
                      </div>

                    <button type="submit" class="btn btn-info">إضافة</button>
                </form>


        </div>
    </div>
</div>


@endsection
