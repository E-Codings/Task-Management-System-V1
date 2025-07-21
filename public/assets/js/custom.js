$(document).ready(function () {
    //timer
    function generateTimer() {
        const days = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
        ];
        const months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
        const date = new Date();
        let today = date.getDay();
        let todayDate = date.getDate();
        let month = date.getMonth();
        let year = date.getFullYear();
        $("#date").html(
            `${days[today]}: ${todayDate} / ${months[month]} / ${year}`
        );
    }
    generateTimer();
});
function show_toast(type, message) {
    let title = "Success";
    let bgClass = "bg-success";
    let icon = "ri-checkbox-circle-fill";
    if (type === "error") {
        title = "Error";
        bgClass = "bg-danger";
        icon = "ri-error-warning-fill";
    }
    $(".toast").addClass("show");
    $(".toast").addClass(bgClass);
    $(".toast-title").text(title);
    $(".toast-header .icon-base").addClass(icon);
    $(".toast-body").text(message);
    setTimeout(() => {
        $(".toast").removeClass("show");
    }, 5000);
}

$(document).on("click", ".open-modal", function () {
    const url = $(this).data("url");
    $(".btn-open-modal").click();
    const title = $(this).data("modal-title");

    $("#basicModal").find(".modal-title").text(title);

    $.ajax({
        url,
        success: function (res) {
            $("#basicModal").find(".modal-body").html(res);
            configTinymce();
        }
    });
});

function configTinymce(){
    //tinymce
    tinymce.remove('textarea');
    tinymce.init({
        selector: 'textarea',
        theme: 'silver',
        menubar: false,
        plugins: 'lists link image code',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | code',
        height: 300
    });
}

// Search and pagination handling
const urlParams = new URLSearchParams(window.location.search);
const search = urlParams.get("search");
if (search) {
    $("#search_txt").val(search);
}

const page = urlParams.get("page");
if (page) {
    let btnPage = $(".btn-page");
}
$(document).on("click", "#btn-page", function () {
    let pageNumber = $(this).data("page-number");
    let url = window.location.origin + window.location.pathname;

    if (search) {
        url = url + "?search=" + search;
    }

    var fullUrl = new URL(url);
    fullUrl.searchParams.append("page", pageNumber);
    window.location.href = fullUrl;
});


