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
    request['password'] = $('#pass').val();
    request['email'] = $('#email').val();
    $.ajax({
        type: "POST",
        url: "../api/client/access",
        data: request,
        dataType: "JSON",
        success: function (response) {
            console.log(response)
            if(response.status=='200'){
                alertBTS(response.message,'success')
                window.open("index.php","_self")
            }else{
                alertBTS(response.message,'danger')
            }
        }
    });

});