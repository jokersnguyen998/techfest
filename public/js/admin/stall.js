/**
 * Datatables
 */
let table = $("#data-table").DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: "/dashboard/stalls",
    columns:
        [
            { data: "DT_RowIndex", searchable: false },
            { data: "logo" },
            { data: "name" },
            { data: "created_at" },
            { data: "updated_at" },
            { data: "action", orderable: false, searchable: false },
            { data: "description" },
            { data: "contact" },
            { data: "video_path" },
        ],
    columnDefs:
        [
            {
                targets: [0],
                width: "5%"
            },
            {
                targets: [1],
                className: "text-center",
                width: "10%"
            },
            {
                targets: [2],
            },
            {
                targets: [3, 4],
                width: "10%"
            },
            {
                targets: [5],
                className: "text-center",
                width: "10%"
            },
            {
                targets: [6],
                class: "wrapok"
            },
        ],
    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    initComplete: function () {
        table.buttons().container().appendTo('#data-table_wrapper .col-md-6:eq(0)');
        $("#data-table_wrapper").show();
    },
});

/**
 * Preview image before upload
 */
$(document).on("change", "#filePhoto", function (e) {
    $(document).find("#previewImage").parent().css('display', 'block');
    readURL(this, $("#previewImage"));
});

$(document).on("change", "#fileVideo", function (e) {
    $(document).find("#previewVideo").parent().css('display', 'block');
    readURL(this, $("#previewVideo"));
});

$(document).on("change", "#fileLogo", function (e) {
    $(document).find("#previewLogo").parent().css('display', 'block');
    readURL(this, $("#previewLogo"));
});

$(document).on("change", "#fileStandy", function (e) {
    $(document).find("#previewStandy").parent().css('display', 'block');
    readURL(this, $("#previewStandy"));
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

            $("textarea[name=description]").removeClass("is-invalid");
            $("#description").removeClass("text-danger").text("");

            $("input[name=contact]").removeClass("is-invalid");
            $("#contact").removeClass("text-danger").text("");

            $("input[name=position]").removeClass("is-invalid");
            $("#position").removeClass("text-danger").text("");

            $("input[name=logo]").removeClass("is-invalid");
            $("#logo").removeClass("text-danger").text("");

            $("input[name=standy]").removeClass("is-invalid");
            $("#standy").removeClass("text-danger").text("");

            $("input[name=stall_image_path]").removeClass("is-invalid");
            $("#stall_image_path").removeClass("text-danger").text("");

            $("input[name=video_path]").removeClass("is-invalid");
            $("#video_path").removeClass("text-danger").text("");

            $("input[name=images]").removeClass("is-invalid");
            $("#images").removeClass("text-danger").text("");

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
