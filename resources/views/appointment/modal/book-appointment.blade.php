<div class="modal fade" id="appointmentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="form_name"></h1>
            <button type="button" class="btn-close btn-close-white dismissButton" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body font-mont">
                <input type="hidden" name="form_id" id="form_id">
                <input type="hidden" name="form_acad_year" id="form_acad_year">
                <input type="hidden" name="form_requirements" id="form_requirements">
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="app_purpose">Purpose: </label>
                            <textarea placeholder="Enter your purpose here" class="form-control" id="app_purpose" name="app_purpose" style="height: 150px;" type="text" placeholder="" aria-label="default input example"></textarea>
                        </div>
                        <div class="mb-3" id="app-acad-year">
                            <label for="inputDocAcadYear">Academic Year: </label>
                            <input class="form-control" type="text" name="acad_year" id="acad_year" placeholder="Academic Year" aria-label="default input example">
                        </div>
                        <div class="mb-3">
                            <label for="num_copies">Number of Copy: </label>
                            <select class="form-control" name="num_copies" id="num_copies">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group mt-3" id="college-form">
                            <div class="d-flex flex-column justify-content-start custom-form-group">
                                <p class="font-small font-mont m-0 font-bold">Before MSU-MSAT, did you study in a different school?</p>
                                <div>
                                    <label>
                                        <input type="radio" name="isATransfer" value="Yes">
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="isATransfer" value="No">
                                        No
                                    </label>
                                </div>
                                <div class="w-100" id="ATransferSchool">
                                    <label for="inputATransferSchool">Please indicate school</label>
                                    <input type="text" class="form-control" id="inputATransferSchool" placeholder="">
                                </div>
                            </div>
                    
                            <div class="d-flex flex-column justify-content-start custom-form-group mt-2">
                                <p class="font-small font-mont m-0 font-bold">After MSU-MSAT, did you study in a different school?</p>
                                <div>
                                    <label>
                                        <input type="radio" name="isBTransfer" value="Yes">
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="isBTransfer" value="No">
                                        No
                                    </label>
                                </div>
                                <div class="w-100" id="BTransferSchool">
                                    <label for="inputAcadYear">Please indicate school</label>
                                    <input type="text" class="form-control" id="inputBTransferSchool" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div><hr class="row my-3"></div>
                        <div id="payment_section">
                            <div class="d-flex flex-column w-100 mb-3">
                                <p class="fs-4 font-mont font-bold">Payment Method</p>
                                <div>
                                    <input type="radio" id="walk-in" name="payment_method" value="Walk-in">
                                    <label for="walk-in">Walk-in</label>
                                </div>
                                <div>
                                    <input type="radio" id="g-cash" name="payment_method" value="GCash">
                                    <label for="gcash">G-Cash</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3" id="gcash-sect">
                            <div class="notice-box p-1 mb-2">
                                <p class="m-0"><b>Document Fee: </b><span id="doc_fee"></span></p>
                            </div>
                            <img src="/images/g-cash-temp.png" alt="">
                            <div class="d-flex flex-column w-100 my-3">
                                <label for="reference_number">Gcash Reference No.</label>
                                <input type="text" class="form-control" name="reference_number" id="reference_number" placeholder="Reference No.">
                            </div>
                            <input type="hidden" id="form_fee_val">
                            <div class="mt-3">
                                <label for="proof_of_payment" class="form-label">Upload the picture or screenshot of the proof of payment.</label>
                                <input class="form-control" type="file" id="proof_of_payment" name="proof_of_payment" accept=".jpg,.png,.jpeg,.svg">
                            </div>
                            <div id="requirements_section" class="mt-3">
                                <div class="d-flex flex-column w-100 mb-3">
                                    <p class="fs-4 font-mont font-bold">Upload Requirements</p>
                                    <label for="inputRequirements" class="form-label">Requirements</label>
                                    <input type="file" class="form-control" id="inputRequirements" name="requirements[]" multiple accept=".doc,.docx,.pdf,.jpg,.png,.jpeg,.svg">
                                    <div id="selectedFiles" class="p-3" style="-webkit-text-stroke-width: medium;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            
        </div>
        <div class="modal-footer">
            <button type="button" id="dismissButton" class="btn btn-appoint dismissButton" data-bs-dismiss="modal">Close</button>
            <button type="button" id="proceedButton" class="btn btn-appoint">Proceed</button>
        </div>
        </div>
    </div>
</div>

<script>
    $('#inputRequirements').on('change', function() {
        var files = $(this)[0].files;
        var selectedFiles = '';
        for (var i = 0; i < files.length; i++) {
            selectedFiles += files[i].name + '<br>';
        }
        $('#selectedFiles').html(selectedFiles);
    });
</script>