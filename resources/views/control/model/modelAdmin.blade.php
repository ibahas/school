{{-- Students --}}
<div class="col-lg-6 col-md-12">
  <div class="card">
    <span style="float: left; position: absolute; left: 0;" class="card-header-warning" data-toggle="tooltip" data-placement="top" title="إضافة طالب جديد ">
      <a href="{{action('StudentsController@create')}}" style=" padding: 6px; "> <i class="material-icons">person_add</i></a>
    </span>
    <div class="card-header card-header-text card-header-warning float-right">
      <div class="card-text" style="float: right !important; ">
        <h4 class="card-title" style="float: right !important;font-weight: bold;">الطلاب</h4>
        <br>
        <br>
        <p class="card-category" style="float: right !important;">أخر 5 طلاب تم إضافتهم</p>
      </div>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
          <thead class="text-warning">
              <tr>
                  <th>*</th>
                  <th>إسم الطالب</th>
                  <th>البرنامج</th>
                  <th>المحفظ</th>
              </tr>
          </thead>
          <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($students as $row)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$row->name}}</td>
                <td>{{App\programs::find($row->program_id)->title}}</td>
                <td>{{App\User::find($row->wallet_id)->name}}</td>        
              </tr>
            @endforeach

          </tbody>
      </table>
    </div>
  </div>
</div>
{{-- Programs --}}
<div class="col-lg-6 col-md-12">
  <div class="card">
    <span style="float: left; position: absolute; left: 0;" class="card-header-success"  data-toggle="tooltip" data-placement="top" title="إضافة برنامج جديد ">
      <a href="{{action('ProgramsController@create')}}" style=" padding: 6px; "> <i class="material-icons">add</i></a>
    </span>
    <div class="card-header card-header-text card-header-success float-right">
      <div class="card-text" style="float: right !important; ">
        <h4 class="card-title" style="float: right !important;font-weight: bold;">البرامج</h4>
        <br>
        <br>
        <p class="card-category" style="float: right !important;">أخر 5 برامج تم إضافتهم</p>
      </div>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
          <thead class="text-success">
              <tr>
                  <th>*</th>
                  <th>إسم البرنامج</th>
                  <th>الوصف</th>
              </tr>
          </thead>
          <tbody>
            @php
                $ii = 1;
            @endphp
            @foreach ($programs as $row)
              <tr>
                <td>{{$ii++}}</td>
                <td>{{$row->title}}</td>
                <td data-toggle="tooltip" data-placement="top" title="{{$row->description}}">{{ \Illuminate\Support\Str::limit($row->description, 30) }}</td>
              <tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
{{-- Courses --}}
<div class="col-lg-6 col-md-12">
  <div class="card">
    <span style="float: left; position: absolute; left: 0;" class="card-header-info" data-toggle="tooltip" data-placement="top" title="إضافة دورة جديدة">
      <a href="{{action('ProgramsController@create')}}" style=" padding: 6px; "> <i class="material-icons">add</i></a>
    </span>
    <div class="card-header card-header-text card-header-info float-right">
      <div class="card-text" style="float: right !important; ">
        <h4 class="card-title" style="float: right !important;font-weight: bold;">الدورات</h4>
        <br>
        <br>
        <p class="card-category" style="float: right !important;color: white ">أخر 5 دورات تم إضافتهم</p>
      </div>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
          <thead class="text-info">
              <tr>
                  <th>*</th>
                  <th>إسم الدورة</th>
                  <th>الوصف</th>
              </tr>
          </thead>
          <tbody>
            @php
                $iii = 1;
            @endphp
            @foreach ($courses as $row)
              <tr>
                <td>{{$iii++}}</td>
                <td>{{$row->title}}</td>
                <td data-toggle="tooltip" data-placement="top" title="{{$row->description}}">{{ \Illuminate\Support\Str::limit($row->description, 30) }}</td>
              <tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
{{-- ReportStudents --}}
<div class="col-lg-6 col-md-12">
  <div class="card">
    <div class="card-header card-header-text card-header-danger float-right">
      <div class="card-text" style="float: right !important; ">
        <h4 class="card-title" style="float: right !important;font-weight: bold;">البلاغات</h4>
        <br>
        <br>
        <p class="card-category" style="float: right !important;color: white ">أخر 5 بلاغات تم إضافتهم</p>
      </div>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
          <thead class="text-danger">
              <tr>
                  <th>*</th>
                  <th>عنوان البلاغ</th>
                  <th>تفاصيل البلاغ</th>
              </tr>
          </thead>
          <tbody>
            @php
                $iiii = 1;
            @endphp
            @foreach ($reportStudents as $row)
              <tr>
                <td>{{$iiii++}}</td>
                <td>{{$row->titleReport}}</td>
                <td data-toggle="tooltip" data-placement="top" title="{{$row->detailsReport}}">{{ \Illuminate\Support\Str::limit($row->detailsReport, 30) }}</td>
              <tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
