<div class="modal fade" id="status_appointment_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 font-white font-nun" id="status_title"></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-doc font-nun text-center font-bold">
                <input type="hidden" id="app_id" name="app_id" value="">
                <input type="hidden" id="accept_status" name="accept_status" value="On Process">
                <input type="hidden" id="done_status" name="done_status" value="Ready to Claim">
                <input type="hidden" id="claimed_status" name="claimed_status" value="Claimed">
            
            <p class="m-0 p-0" id="status_body"></p>
            <!-- fix input hiddent,, passing of  id from the button -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="acceptApp" style="display:none;" class="btn btn-custom ms-3">Confirm</button>
            <button type="submit" id="doneApp" style="display:none;" class="btn btn-custom ms-3">Confirm</button>
            <button type="submit" id="claimedApp" style="display:none;" class="btn btn-custom ms-3">Confirm</button>
        </div>
        </div>
    </div>
</div>

<!-- <script src="{{ asset('js/admin/appointment/status-button.js') }}"></script> -->