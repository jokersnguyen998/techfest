/**
 * Preview image before upload
 */
$(document).on("change", "#filePhoto", function (e) {
    $(document).find("#previewImage").parent().css('display', 'block');
    readURL(this, $("#previewImage"));
});

/**
 * Datatables
 */
let table = $("#data-table").DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: window.location.pathname,
    columns:
        [
            { data: "DT_RowIndex", searchable: false },
            { data: "image" },
            { data: "position" },
            { data: "action", orderable: false, searchable: false },
        ],
    columnDefs:
        [
            {
                targets: [1],
                width: "30%",
            },
            {
                targets: [2, 3],
                className: "text-center",
            },
        ],
    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    initComplete: function () {
        table.buttons().container().appendTo('#data-table_wrapper .col-md-6:eq(0)');
        $("#data-table_wrapper").show();
    },
});

/**
 * Submit form
 */
$(document).on("submit", "#submit", function (e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("input[name=position]").removeClass("is-invalid");
            $("#position").removeClass("text-danger").text("");

            $("input[name=file_path]").removeClass("is-invalid");
            $("#file_path").removeClass("text-danger").text("");

            $("#add-submit-btn")
                .html(
                    `<div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>`
                ).attr("type", "button");

            $("#edit-submit-btn")
                .html(
                    `<div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>`
                ).attr("type", "button");
        },
        success: function (data) {
            if (data.code == 200) {
                $("#modal").modal("hide");
                table.draw();
            }
        },
        error: function (data) {
            if (data.status === 422) {
                let errors = data.responseJSON.errors;
                for (const property in errors) {
                    var prop = property.split(".");
                    $(`input[name=${prop[0]}]`).addClass("is-invalid");
                    $(`textarea[name=${prop[0]}]`).addClass("is-invalid");
                    $(`#${prop[0]}`).addClass("text-danger").text(errors[property]);
                }
            }
            $("#add-submit-btn").html("Lưu").attr("type", "submit");
            $("#edit-submit-btn").html("Lưu chỉnh sửa").attr("type", "submit");
        },
    });
});
