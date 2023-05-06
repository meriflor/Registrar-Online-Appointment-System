<div
    class="modal fade"
    id="appointment_slot_modal"
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
                    Date: <span class="ms-2" id="slot_date_text"></span>
                </h1>
                    
                <a id="view_app_btn" class="btn btn-reverse justify-content-end font-nun">
                    View Appointments
                </a>
            </div>
            <div class="modal-body font-nun px-5 text-center">
                <div class="d-flex flex-row justify-content-end">
                    <div id="edit_div">
                        <input class="form-check-input" id="edit_check" type="checkbox" value="yes" name="disabled" style="border: 2px solid #131313;">
                        <label class="form-check-label font-karma ms-2" for="update_check">
                            Edit
                        </label>
                    </div>
                    <div id="delete_div" class="ms-3">
                        <input class="form-check-input" id="delete_check" type="checkbox" value="yes" name="disabled" style="border: 2px solid #131313;">
                        <label class="form-check-label font-karma ms-2" for="delete_check">
                            Delete
                        </label>
                    </div>
                </div>
                <div id="set_slot_div">
                    <hr id="hr_insert" style="display:none;">
                    <form id="create_slot_form" method="POST" action="{{ route('appointment_slots.store') }}">
                        @csrf
                        <input type="hidden" class="form-control" id="slot_date" name="slot_date" required>
                        <input type="hidden" class="form-control" id="disabled_text" name="disabled_text">
                        <div class="w-auto d-flex flex-row justify-content-end">
                            <input class="form-check-input" id="disable_check" type="checkbox" value="yes" name="disabled" style="border: 2px solid #131313;">
                            <label class="form-check-label font-karma ms-2" for="disable_check">
                                Disable
                            </label>
                        </div>
                        <div id="input_appSlot">
                            <label
                                class="p-0 font-karma text-center mb-2"
                                for="input_slot">
                                Available Slots:
                            </label>
                            <input
                                class="form-control"
                                type="number"
                                id="available_slots" name="available_slots"
                                aria-label="default input example"
                            />
                        </div>
                    </div>
                </div>
                <div id="slot_info" class="px-5 py-3 text-center font-nun">
                    <div id="info-text" class="text-center font-nun"></div>
                    There's
                    <div class="font-bold" id="pending-text"></div>
                    <div class="font-bold" id="onProcess-text"></div>
                    <div class="font-bold" id="readyToClaim-text"></div>
                    <div class="font-bold" id="claimed-text"></div>
                    document(s) at the moment.
                </div>
                <div id="delete_slot_div" class="text-center px-5 py-3 font-nun">
                    Do you want to delete this appointment slot? <br>
                    We'll inform the users to move their appointments who have booked on this day.
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
            </form>
        </div>
    </div>
</div>
