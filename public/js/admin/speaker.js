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
            { data: "name" },
            { data: "created_at" },
            { data: "updated_at" },
            { data: "action", orderable: false, searchable: false },
            { data: "discussion_name" },
        ],
    columnDefs:
        [
            {
                targets: [0],
                width: "5%",
            },
            {
                targets: [2, 3],
                width: "10%",
            },
            {
                targets: [4],
                width: "5%",
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
            $("input[name=name]").removeClass("is-invalid");
            $("#name").removeClass("text-danger").text("");

            $("input[name=work_place]").removeClass("is-invalid");
            $("#work_place").removeClass("text-danger").text("");

            $("input[name=discussion_name]").removeClass("is-invalid");
            $("#discussion_name").removeClass("text-danger").text("");

            $("input[name=avatar]").removeClass("is-invalid");
            $("#avatar").removeClass("text-danger").text("");

            $("input[name=sex]").removeClass("is-invalid");
            $("#sex").removeClass("text-danger").text("");

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
