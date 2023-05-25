var viewBtns = document.querySelectorAll(".view-btn");
for (var i = 0; i < viewBtns.length; i++) {
    viewBtns[i].addEventListener("click", function () {
        var bookingId = this.id;

        // Send a request to the server to get the booking information
        fetch("/bookings/" + bookingId)
            .then((response) => response.json())
            .then((data) => {
                console.log(data.email);
                console.log(data.status);
                console.log(data.doc_req_year);

                // Set the booking information in the modal
                $("#viewFullName").text(data.fullName);
                $("#viewEmail").text(data.email);
                $("#viewCpNo").text(data.cell_no);
                $("#viewSchoolID").text(data.school_id);
                $("#viewCourse").text(data.course);
                $("#viewStudentStatus").text(data.status);

                $("#viewAcadYear").text(data.acadYear);
                $("#viewGradYear").text(data.gradYear);
                if (data.acadYear === null) {
                    $("#viewGradYearSect").show();
                    $("#viewAcadYearSect").hide();
                }
                if (data.gradYear === null) {
                    $("#viewAcadYearSect").show();
                    $("#viewGradYearSect").hide();
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
                if (data.doc_req_year === null) {
                    $("#viewTOR").hide();
                } else {
                    $("#viewTOR").show();
                }
                $("#viewPurpose").text(data.app_purpose);
                $("#viewDocFee").text("PHP " + data.doc_fee + ".00");

                if (data.a_transfer == 0) {
                    $("#viewATransfer").text("No");
                } else {
                    $("#viewATransfer").text("No, " + data.a_transfer_school);
                }
                if (data.b_transfer == 0) {
                    $("#viewBTransfer").text("No");
                } else {
                    $("#viewBTransfer").text("No, " + data.b_transfer_school);
                }

                if (data.remarks == null || data.remarks == "") {
                    $("#remarks_info").hide();
                } else {
                    $("#remarks_info").show();
                    $("#viewRemarks").text(data.remarks);
                }

                if (data.payment_method === null) {
                    $("#payment_sect_modal").hide();
                }
                $("#viewMethod").text(data.payment_method);

                if (data.payment_method === "Walk-in") {
                    $("#viewPopButton").hide();
                    $("#viewPopImage").hide();
                } else {
                    $("#viewPopButton").show();
                    $("#viewPopImage").show();
                    $("#viewProofOfPayment").attr(
                        "src",
                        url + "/" + data.proof_of_payment
                    );
                    $("#downloadProofOfPayment").attr(
                        "href",
                        url + "/" + data.proof_of_payment
                    );
                    $("#viewProofOfPaymentPic").attr(
                        "href",
                        url + "/" + data.proof_of_payment
                    );
                }

                var requirements = data.requirements;
        
                if (requirements.length > 0) {
                    $("#requirements_info_section").show();
                    var requirementsHtml = '';
                    data.requirements.forEach(function (requirement) {
                        var fileName = requirement.file_name;
                        var baseUrl = window.location.origin; // Get the base URL
                        var fileLink = baseUrl + '/' + requirement.file_path;
                        requirementsHtml += '<tr class="font-nun">';
                        requirementsHtml += '<td>' + fileName + '</td>';
                        requirementsHtml += '<td><a href="' + fileLink + '" target="_blank" class="btn btn-primary font-nun" style="background-color: #1e1e1e; color:white; border:none;">View</a></td>';
                        requirementsHtml += '</tr>';
                    });
                    $("#requirementsTable tbody").html(requirementsHtml);
                } else {
                    $("#requirements_info_section").hide();
                }

                $("#view-request-modal").modal("show");
            });
    });
}
