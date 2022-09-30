$("#modal").on("shown.bs.modal", function (e) {
    CKEDITOR.replace('my-editor', options);
    $('#reservationdatetime').datetimepicker({
        icons: { time: 'far fa-clock' },
        sideBySide: true,
        format: 'HH:mm:ss DD-MM-YYYY'
    });
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
            { data: "time_start" },
            { data: "created_at" },
            { data: "updated_at" },
            { data: "active" },
            { data: "action", orderable: false, searchable: false },
            { data: "topic" },
            { data: "location" },
            { data: "type" },
        ],
    columnDefs:
        [
            {
                targets: [1],
                width: '55%',
            },
            {
                targets: [2, 3, 4],
                width: '16%',
            },
            {
                targets: [6],
                className: "text-center",
                width: '5%',
            },
            {
                targets: [7, 8],
                class: 'wrapok',
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

            $("input[name=location]").removeClass("is-invalid");
            $("#location").removeClass("text-danger").text("");

            $("input[name=active]").removeClass("is-invalid");
            $("#active").removeClass("text-danger").text("");

            $("input[name=time_start]").removeClass("is-invalid");
            $("#time_start").removeClass("text-danger").text("");

            $("textarea[name=topic]").removeClass("is-invalid");
            $("#topic").removeClass("text-danger").text("");

            $("textarea[name=schedule]").removeClass("is-invalid");
            $("#schedule").removeClass("text-danger").text("");

            $("textarea[name=type]").removeClass("is-invalid");
            $("#type").removeClass("text-danger").text("");

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
