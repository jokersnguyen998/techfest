/**
 * Datatables
 */
let table = $("#data-table").DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: "/dashboard/users",
    columns:
        [
            { data: "DT_RowIndex", searchable: false },
            { data: "name" },
            { data: "username" },
            { data: "email" },
            { data: "created_at" },
            { data: "updated_at" },
            { data: "type" },
            { data: "action", orderable: false, searchable: false },
        ],
    columnDefs:
        [
            {
                targets: [6],
                width: '8%',
                className: "text-center",
            },
            {
                targets: [7],
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
            $("input[name=firstname]").removeClass("is-invalid");
            $("#firstname").removeClass("text-danger").text("");

            $("input[name=lastname]").removeClass("is-invalid");
            $("#lastname").removeClass("text-danger").text("");

            $("input[name=username]").removeClass("is-invalid");
            $("#username").removeClass("text-danger").text("");

            $("input[name=password]").removeClass("is-invalid");
            $("#password").removeClass("text-danger").text("");

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
                    $(`input[name=${property}]`).addClass("is-invalid");
                    $(`textarea[name=${property}]`).addClass("is-invalid");
                    $(`#${property}`).addClass("text-danger").text(errors[property]);
                }
            }
            $("#add-submit-btn").html("Lưu").attr("type", "submit");
            $("#edit-submit-btn").html("Lưu chỉnh sửa").attr("type", "submit");
        },
    });
});
