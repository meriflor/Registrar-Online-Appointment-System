<div class="modal fade" id="editFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFormModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-white font-nun" id="editFormModal">Edit Form</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <input type="hidden" id="form-id">
                <div class="mb-3">
                    <label for="editFormName" class="form-label">Form Name</label>
                    <input type="text" class="form-control" name="editFormName" id="editFormName" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="editAvailability" class="form-label">Availability of the Service</label>
                    <textarea class="form-control" name="editAvailability" id="editAvailability" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="editAvailService" class="form-label">Who may Avail the Service</label>
                    <textarea class="form-control" name="editAvailService" id="editAvailService" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="editReq" class="form-label">What are the Requirements</label>
                    <textarea class="form-control" name="editReq" id="editReq" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="editProcessingTime" class="form-label">Complete Processing Time</label>
                    <textarea class="form-control" name="editProcessingTime" id="editProcessingTime" rows="3"></textarea>
                </div>
                <div class="mb-3 form-group row">
                    <div class="col-md-3">
                        <label for="editDocFee" class="form-label">Document Fee</label>
                        <div class="d-flex flex-row align-items-center">   
                            <p class="p-0 m-0 me-2 font-bold">PHP </p>
                            <input type="number" class="form-control" style="flex: 1;" name="editReq"  id="editDocFee" placeholder="ex. 50 or 0 for No Payment">
                            <p class="p-0 m-0 ms-2 font-bold"> .00</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="editDocFeeType" class="form-label">Collection Type</label>
                        <div class="d-flex flex-row align-items-center">
                            <input type="text" class="form-control" style="flex: 1;" name="editDocFeeType"  id="editDocFeeType" placeholder="ex. Per Page, None or (Collected as part of graduation fee)">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="editDocPages" class="form-label">Pages</label>
                        <div class="d-flex flex-row align-items-center">
                            <p class="p-0 m-0 me-2 font-bold">At least </p>
                            <input type="number" class="form-control" style="flex: 1;" name="editDocPages"  id="editDocPages" placeholder="ex. 4">
                            <p class="p-0 m-0 ms-2 font-bold"> Page(s)</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="editMaxTimeClaim" class="form-label">Maximum Time to Claim</label>
                    <textarea class="form-control" name="editMaxTimeClaim" id="editMaxTimeClaim" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Dissmis</button>
                <button type="submit" class="btn btn-custom ms-3" id="submit_form_update">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#submit_form_update').on('click', function(){
        var formID = $('#form-id').val();
        var editFormName = $('#editFormName').val();
        var editAvailability = $('#editAvailability').val();
        var editAvailService = $('#editAvailService').val();
        var editReq = $('#editReq').val();
        var editProcessingTime = $('#editProcessingTime').val();
        var editDocFee = $('#editDocFee').val();
        var editMaxTimeClaim = $('#editMaxTimeClaim').val();
        var editDocFeeType = $('#editDocFeeType').val();
        var editDocPages = $('#editDocPages').val();

        $.ajax({
            url: "{{ route('editform') }}",
            method: "PUT",
            data: {
                formID: formID,
                editFormName: editFormName,
                editAvailability: editAvailability,
                editAvailService: editAvailService,
                editReq: editReq,
                editProcessingTime: editProcessingTime,
                editDocFee: editDocFee,
                editMaxTimeClaim: editMaxTimeClaim,
                editDocFeeType: editDocFeeType,
                editDocPages: editDocPages
            },
            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
</script>