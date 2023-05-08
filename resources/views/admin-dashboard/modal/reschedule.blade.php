<div
    class="modal fade"
    id="re_sched_modal"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-white font-nun">
                    Re-Schedule
                </h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-nun px-5 text-center">
            <div class="col-md-7">
                <div class="d-flex flex-row flex-wrap">
                    <b>Selected Date:</b><p id="app_date" class="ms-2">Select a date first.</p>
                </div>
                <div class="d-flex flex-row notice-box p-3" id="exp_sect">
                    <p class="m-0"><b>Reminder: </b>The <span id="form-name"></span> maximum time to claim is <span id="exp_date"></span> upon approving the request</p>
                </div>
                <div class="d-flex flex-row flex-wrap justify-content-end mt-2">
                    <div class="full-sect mx-2 d-flex flex-row align-items-center">
                        <div class="legend-box fc-event-full me-1"></div>
                        <div>Full</div>
                    </div>
                    <div class="avai-sect mx-2 d-flex flex-row align-items-center">
                        <div class="legend-box fc-event-available me-1"></div>
                        <div>Available</div>
                    </div>
                </div>
                <div id="calendar" class="mt-3"></div>
            </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-custom"
                    data-bs-dismiss="modal"
                    id="dismiss_cal"
                >
                    Dissmis
                </button>
                <button id="submit_slot" type="submit" class="btn btn-custom ms-2">
                    Set
                </button>
                <button id="edit_slot" type="submit" class="btn btn-custom ms-2">
                    Update
                </button>
                <a href="" id="delete_slot" type="submit" class="btn btn-custom ms-2" style="display:none;">
                    Delete
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>
