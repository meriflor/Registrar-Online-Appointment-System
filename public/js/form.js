$(document).ready(function () {
    $("#inputStudentStatus").change(function () {
        if ($(this).val() === "senior_high_graduate" ||$(this).val() === "undergraduate_alumni" ||$(this).val() === "masteral_alumni") {
            $("#reg-input-acadYear").hide();
            // $('#reg-input-acadYear').removeAttr('required');
            $("#reg-input-gradYear").show();
            // $('#reg-input-gradYear').attr('required', 'required');
        } else {
            $("#reg-input-gradYear").hide();
            // $('#reg-input-gradYear').removeAttr('required');
            $("#reg-input-acadYear").show();
            // $('#reg-input-acadYear').attr('required', 'required');
        }
    });
});

// fix
$(document).ready(function () {
    $("#editStatus").change(function () {
        if ($(this).val() === "senior_high_graduate" ||$(this).val() === "undergraduate_alumni" ||$(this).val() === "masteral_alumni") {
            $("#edit-AcadYear").hide();
            $("#edit-GradYear").show();
        } else {
            $("#edit-GradYear").hide();
            $("#edit-AcadYear").show();
        }
    });
    // var status = $("#editStatus").val();
    if ($("#editStatus").val() === "senior_high_graduate" ||$("#editStatus").val() === "undergraduate_alumni" ||$("#editStatus").val() === "masteral_alumni") {
        $("#edit-AcadYear").hide();
        $("#edit-GradYear").show();
    } else {
        $("#edit-GradYear").hide();
        $("#edit-AcadYear").show();
    }
});

$(document).ready(function () {
    $("input[name=payment_method]").change(function () {
        if ($(this).val() === "GCash") {
            $("#gcash-sect").show();
        } else {
            $("#gcash-sect").hide();
        }
    });
});

$(document).ready(function () {
    // var status = $("#inputStudentStatus").val();
    if ($("#inputStudentStatus").val() === "senior_high_graduate" ||$("#inputStudentStatus").val() === "undergraduate_alumni" ||$("#inputStudentStatus").val() === "masteral_alumni") {
        $("#input-acadYear").hide();
        $("#input-gradYear").show();
    } else {
        $("#input-gradYear").hide();
        $("#input-acadYear").show();
    }
});

$(document).ready(function () {
    $("input[name=isATransfer]").change(function () {
        if ($(this).val() === "Yes") {
            $("#ATransferSchool").show();
        } else {
            $("#ATransferSchool").hide();
        }
    });
    $("input[name=isBTransfer]").change(function () {
        if ($(this).val() === "Yes") {
            $("#BTransferSchool").show();
        } else {
            $("#BTransferSchool").hide();
        }
    });
});
