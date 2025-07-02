$(document).ready(function(){
    //timer
    function generateTimer(){
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        const date = new Date();
        let today = date.getDay();
        let todayDate = date.getDate();
        let month = date.getMonth();
        let year = date.getFullYear();
        $('#date').html(`${days[today]}: ${todayDate} / ${months[month]} / ${year}`);
    }
    generateTimer();



})
function show_toast(type, message){
    let title = 'Success'
    let bgClass = 'bg-success';
    let icon = 'ri-checkbox-circle-fill';
    if(type === "error"){
        title = 'Error';
        bgClass = 'bg-danger';
        icon = 'ri-error-warning-fill';
    }
    $('.toast').addClass('show')
    $('.toast').addClass(bgClass)
    $('.toast-title').text(title)
    $('.toast-header .icon-base').addClass(icon)
    $('.toast-body').text(message)
    setTimeout(()=>{
        $('.toast').removeClass('show');
    }, 5000)
}

$(document).on('click', '.open-modal', function(){
    const url = $(this).data('url');
    $('.btn-open-modal').click();
    const title = $(this).data('modal-title');

    $('#basicModal').find('.modal-title').text(title);
    console.log($('#basicModal').find('.modal-title'));

    $.ajax({
        url,
        success:function(res){
            $('.modal-body').html(res)
        }
    });
});

