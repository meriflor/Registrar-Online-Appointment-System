<div class="modal fade" id="approve_payment_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-white font-nun">Approved Payment</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('payment-status-update') }}" method="post">
                @csrf
                <div class="modal-body modal-doc font-nun text-center font-bold">
                    <input type="hidden" id="app_id" name="app_id" value="">
                    <input type="hidden" name="payment_status" value="approve">
                    <div class="form-group d-flex flex-row align-items-center">
                        <label for="or_number" class="me-2">OR No.: </label>
                        <input type="text" class="form-control" style="flex: 1;" name="or_number" id="or_number" placeholder="ex.1234567" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="" class="btn btn-custom ms-3">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>