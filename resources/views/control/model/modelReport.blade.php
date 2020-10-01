<style>
    .modal-header .close {
    padding: 1rem !important;
    margin: -1rem 0rem auto !important;
}
.modal-body{
    float: right !important;
}
</style>
<!-- Modal -->
<div class="modal fade"  id="modal_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_{{$row->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel_{{$row->id}}">بلاغ الطالب :: {{App\students::find($row->student)->name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
          <div style="float: right;">
            <p style=" float: inherit; ">عنوان البلاغ : {{$row->titleReport}}</p>
            <br>
            <p>تفاصيل البلاغ : {{$row->detailsReport}}</p>
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  