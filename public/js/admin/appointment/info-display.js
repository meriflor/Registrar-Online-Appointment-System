var viewBtns = document.querySelectorAll('.view-btn');
for (var i = 0; i < viewBtns.length; i++) {
    viewBtns[i].addEventListener('click', function() {
        var bookingId = this.id;

            // Send a request to the server to get the booking information
        fetch('/bookings/' + bookingId)
            .then(response => response.json())
            .then(data => {
                console.log(data.email);
                console.log(data.status);
                console.log(data.doc_req_year);
                    
                // Set the booking information in the modal
                $('#viewFullName').text(data.fullName);
                $('#viewEmail').text(data.email);
                $('#viewCpNo').text(data.cell_no);
                $('#viewSchoolID').text(data.school_id);
                $('#viewCourse').text(data.course);
                $('#viewStudentStatus').text(data.status);
                $('#viewAcadYear').text(data.acadYear);
                $('#viewGradYear').text(data.gradYear);
                if(data.acadYear === null){
                    $('#viewGradYearSect').show();
                    $('#viewAcadYearSect').hide();
                }if(data.gradYear === null){
                    $('#viewAcadYearSect').show();
                    $('#viewGradYearSect').hide();
                }
                $("#viewGender").text(data.gender);
                $("#viewCivilStats").text(data.civil_status);
                $("#viewBirthdate").text(data.birthdate);
                $("#viewAddress").text(data.address);

                $("#viewAppID").text(data.booking_number);
                $("#viewAppDate").text(data.appointment_date);
                $("#viewDocDateReq").text(data.doc_created);
                $("#viewDocName").text(data.doc_name);
                $("#viewDocReqYear").text(data.doc_req_year);
                if(data.doc_req_year === null){
                    $('#viewTOR').hide();
                }else{
                    $('#viewTOR').show();
                }
                $("#viewPurpose").text(data.app_purpose);
                $("#viewDocFee").text(data.doc_fee);

                $("#viewMethod").text(data.payment_method);

                if(data.payment_method === "Walk-in"){
                    $('#viewPopButton').hide();
                    $('#viewPopImage').hide();
                }else{
                    $('#viewPopButton').show();
                    $('#viewPopImage').show();
                $('#viewProofOfPayment').attr('src', url + "/" + data.proof_of_payment);
                $('#downloadProofOfPayment').attr('href', url + "/" + data.proof_of_payment);
                }
                
                $('#view-request-modal').modal('show');
        });
    });
}