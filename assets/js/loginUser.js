$('#message-shop-cont').hide();

$('#init-session-facebook').click(function (e) {
    e.preventDefault();
    alertBTS('Esta opcion aun no esta disponible', 'warning')
});
$('#init-session-google').click(function (e) { 
    e.preventDefault();
    alertBTS('Esta opcion aun no esta disponible', 'warning')
});

$('form').submit(function (e) {
    e.preventDefault();
    var request = {}
    request['pass'] = $('#pass').val();
    request['email'] = $('#email').val();
    $.ajax({
        type: "POST",
        url: "../../api/login_user",
        data: request,
        dataType: "JSON",
        success: function (response) {
            console.log(response)
            window.open("../../home_user/","_self")
        }
    });

});