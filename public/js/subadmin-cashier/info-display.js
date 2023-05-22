var viewBtns = document.querySelectorAll('.view-btn-pop');
for (var i = 0; i < viewBtns.length; i++) {
    viewBtns[i].addEventListener('click', function() {
        var bookingId = this.id;

            // Send a request to the server to get the booking information
        fetch('/bookings/' + bookingId)
            .then(response => response.json())
            .then(data => {
                $('#referenceNum').text(data.reference_number);
                $('#viewProofOfPayment_cashier').attr('src', url + "/" + data.proof_of_payment);
                
                $('#proof_of_payment_modal').modal('show');
        });
    });
}