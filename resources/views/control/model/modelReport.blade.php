<div id="id_{{$row->id}}" class="w3-modal">
  <div class="w3-modal-content">
    <span onclick="document.getElementById('id_{{$row->id}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
    <div class="w3-container">
      <div>
        <br>
        <br>
          <div class="row" dir="rtl">
              <div class="col-2"></div>
              <div class="col-6">
                <p style="float: right"> <mark>عنوان البلاغ :</mark> <span>{{$row->titleReport}}</span></p>
                <br>
                <br>
                <p style="float: right"> <mark>تفاصيل البلاغ :</mark> <span>{{$row->detailsReport}}</span></p>
                <br>
                <br>
            </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>