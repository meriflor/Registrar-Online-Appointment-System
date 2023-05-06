<div class="modal fade" id="remarks_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 font-white font-nun">To: <span id="last_name"></span>, <span id="first_name"></span></h1>
            <button type="button" class="btn-close btn-close-white-bg" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-doc font-nun text-center font-bold">
            <input type="hidden" id="app_id" name="app_id" value="">
            
            <label for="remarks_message" class="form-label">Remarks</label>
            <textarea class="form-control" name="remarks_message" id="remarks_message" placeholder="Type here..." style="height:150px;"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<script src="js/admin/appointment/remarks.js"></script>