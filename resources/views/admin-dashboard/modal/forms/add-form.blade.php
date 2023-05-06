<div class="modal fade" id="addFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-nun font-white" id="addModalTitle">Add Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <form action="{{ route('create-form') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="addFormName" class="form-label">Form Name</label>
                        <input type="text" class="form-control" name="name"  id="addFormName" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="addAvailability" class="form-label">Availability of the Service</label>
                        <textarea class="form-control" name="form_avail" id="addAvailability" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="addAvailService" class="form-label">Who may Avail the Service</label>
                        <textarea class="form-control" name="form_who_avail" id="addAvailService" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="addReq" class="form-label">What are the Requirements</label>
                        <textarea class="form-control" name="form_requirements" id="addReq" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="addProcessingTime" class="form-label">Complete Processing Time</label>
                        <textarea class="form-control" name="form_process" id="addProcessingTime" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="addDocFee" class="form-label">Document Fee</label>
                        <textarea class="form-control" name="fee" id="addDocFee" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="addMaxTimeClaim" class="form-label">Maximum Time to Claim</label>
                        <textarea class="form-control" name="form_max_time" id="addMaxTimeClaim" rows="3"></textarea>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Dissmis</button>
                    <button type="submit" class="bb btn btn-custom ms-3">Add Form</button>
                </div>
            </form>
        </div>
    </div>
</div>