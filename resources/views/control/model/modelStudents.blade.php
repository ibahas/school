<div id="id_{{$row->id}}" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('id_{{$row->id}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
      <br>
      <br>
        @if(Auth::user()->role == 1 || Auth::user()->role == 2)
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-6">
              <div class="form-group">
                  <input type="date" class="form-control name" id="dateSelected" required>
              </div>
          </div>
      </div>
      @endif
    </div>
      <form action="{{action('PresencestudentsController@store')}}" method="post" id="formPresence" hidden>
        @csrf
            <div class="row">
              <div class="col-md-2"></div>
                <div class="col-md-6">
                    <input type="text" name="date" id="date1">
                    <input type="hidden" name="status" value="0" >
                    <input type="hidden" name="student_id" value="{{$row->id}}">
                </div>
            </div>
        </form>
        <form action="{{action('PresencestudentsController@store')}}" method="post" id="formDeparture" hidden>
          @csrf
              <div class="row">
                <div class="col-md-2"></div>
                  <div class="col-md-6">
                      <input type="text" name="date" id="date2">
                      <input type="hidden" name="status" value="1" >
                      <input type="hidden" name="student_id" value="{{$row->id}}">
                  </div>
              </div>
          </form>
        <form action="{{action('PresencestudentsController@store')}}" method="post" id="formAbsence" hidden>
          @csrf
              <div class="row">
                <div class="col-md-2"></div>
                  <div class="col-md-6">
                      <input type="text" name="date" id="date3">
                      <input type="hidden" name="status" value="2" >
                      <input type="hidden" name="student_id" value="{{$row->id}}">
                  </div>
              </div>
          </form>
          <br>
          <br>
          <div class="row">
            <div class="col-3"></div>

            <div class="col-3">
              <button id="formDeparture" class="btn btn-warning" type="submit" onclick="document.getElementById('formDeparture').submit();">إضافة إنصراف</button>  
            </div>
            <div class="col-3">
              <button id="formPresence" class="btn btn-success" type="submit" onclick="document.getElementById('formPresence').submit();">إضافة حضور</button>
            </div>
            <div class="col-3">
              <button id="formAbsence" class="btn btn-danger" type="submit" onclick="document.getElementById('formAbsence').submit();">إضافة غياب</button>
            </div>
        </div>
        <br>

    </div>
  </div>
</div>
</div>