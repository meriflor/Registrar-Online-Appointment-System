<div class="modal fade" id="incomplete_payment_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-white font-nun">Incomplete Payment</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-doc font-nun text-center font-bold p-4">
                <div class="form-group d-flex flex-row align-items-center mb-3">
                    <label for="reference_number" class="me-2">OR No.: </label>
                    <input type="number" class="form-control" style="flex: 1;" name="reference_number" id="reference_number" placeholder="ex.1234567">
                </div>
                <div class="form-group d-flex flex-column align-items-start">
                    <label for="remarks">Remarks: </label>
                    <textarea type="text" class="form-control" name="remarks" id="remarks" placeholder="ex.You need to pay 25 pesos more."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="" class="btn btn-custom ms-3">Confirm</button>
            </div>
        </div>
    </div>
</div>
<script>

</script>