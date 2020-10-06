{{-- myChildren --}}
<div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-text card-header-warning float-right">
        <div class="card-text" style="float: right !important; ">
          <h4 class="card-title" style="float: right !important;font-weight: bold;">أبنائي</h4>
          <br>
          <br>
          <p class="card-category" style="float: right !important;"></p>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
            <thead class="text-warning">
                <tr>
                    <th>*</th>
                    <th>إسم الطالب</th>
                    <th>البرنامج</th>
                </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
              @foreach ($myChildren as $row)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{App\programs::find($row->program_id)->title}}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
  {{-- myChildren --}}
<div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-text card-header-danger float-right">
        <div class="card-text" style="float: right !important; ">
          <h4 class="card-title" style="float: right !important;font-weight: bold;">بلاغات الأبناء</h4>
          <br>
          <br>
          <p class="card-category" style="float: right !important;"></p>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
            <thead class="text-danger">
                <tr>
                    <th>*</th>
                    <th>الطالب</th>
                    <th>عنوان البلاغ</th>
                    <th>تفاصيل البلاغ</th>
                </tr>
            </thead>
            <tbody>
              @php
                  $ii = 1;
              @endphp
              @foreach ($reportChildren as $row)
                <tr>
                  <td>{{$ii++}}</td>
                  <td>{{App\students::find($row->student)->name}}</td>
                  <td>{{$row->titleReport}}</td>
                  <td>{{$row->detailsReport}}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>