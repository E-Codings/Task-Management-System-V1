$(document).ready(function () {
    $(document).on("click", 'button[data-action="show"]', function () {
        const url = $(this).data("modal-url");
        $.ajax({
            url,
            success: function (res) {
                // $("#createStatusModal").addClass("show");
                // $("#createStatusModal").css("display", "block");
                // $("#createStatusModal").find(".modal-dialog").html(res);
                // Inject the modal content
                $("#createStatusModal .modal-dialog").html(res);

                // Use Bootstrap’s native show method for animation
                const modal = new bootstrap.Modal(
                    document.getElementById("createStatusModal")
                );
                modal.show();
            },
        });
    });
});
