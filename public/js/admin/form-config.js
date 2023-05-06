var editForms = document.querySelectorAll(".open_edit_form_modal");
for (var i = 0; i < editForms.length; i++) {
    editForms[i].addEventListener("click", function () {
        var form_id = $(this).data("form-edit-id");
        console.log(form_id);
        $("#editFormModal").modal("show");
        $("#form-id").val(form_id);

        fetch("/form/" + form_id)
            .then((response) => response.json())
            .then((data) => {
                $("#editFormName").val(data.name);
                $("#editAvailability").text(data.form_avail);
                $("#editAvailService").text(data.form_who_avail);
                $("#editReq").text(data.form_requirements);
                $("#editProcessingTime").text(data.form_process);
                $("#editDocFee").text(data.fee);
                $("#editMaxTimeClaim").text(data.form_max_time);
            });
    });
}

var deleteForms = document.querySelectorAll(".open_delete_form_modal");
for (var i = 0; i < deleteForms.length; i++) {
    deleteForms[i].addEventListener("click", function () {
        var form_id = $(this).data("form-delete-id");
        var form_name = $(this).data("form-delete-name");
        console.log(form_id);
        console.log(form_name);
        $("#deleteFormModal").modal("show");
        $("#deleteFormModal #form-id_delete").val(form_id);
        $("#deleteFormModal #formName").text(form_name);
    });
}
