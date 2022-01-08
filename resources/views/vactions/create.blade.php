<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">اضف وسيله دفع</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('vactions.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <input type="date" class="form-control" name="holidayDate" placeholder="Holiday Date">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="holidayName" placeholder="Holiday Name">
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit" id="AddUnits"> Save </button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                    </div>
                </form>
        </div>
    </div>
</div>
