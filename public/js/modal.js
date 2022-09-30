$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Calling modal
 */
$(document).on("click", ".btn-modal", function (e) {
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: $(this).attr("href"),
        async: false,
        cache: false,
        success: function (data) {
            $("#modal").html(data);
            $("#modal").modal("show");
        },
    });
});

/**
 * 
 */
$("#modal").on("hidden.bs.modal", function (e) {
    $(this).html("");
});

/**
 * Delete
 */
$(document).on("click", ".btn-delete", function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Bạn có chắc ?",
        text: "Bạn sẽ không thể hoàn tác điều này !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đồng ý",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: $(this).attr("href"),
                type: "DELETE",
                success: function (data) {
                    if (data.code == 200) {
                        Toast.fire({
                            icon: "success",
                            title: "Xóa thành công !",
                        }).then((result) => {
                            table.draw();
                        });
                    }
                    if (data.code == 400) {
                        Toast.fire({
                            icon: "error",
                            title: data.message,
                        });
                    }
                },
            });
        }
    });
});