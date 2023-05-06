<div class="modal fade" id="editFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFormModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-white font-nun" id="editFormModal">Edit Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <div class="mb-3">
                    <label for="editDocFee" class="form-label">Document Fee</label>
                    <textarea class="form-control" name="editDocFee" id="editDocFee" rows="3"></textarea>
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
                editMaxTimeClaim: editMaxTimeClaim
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