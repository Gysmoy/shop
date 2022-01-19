
var envio = true;
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
        url: "../api/client/validate",
        data: request,
        dataType: "JSON",
        success: function (response) {
            if (response.status == '200') {
                alertBTS(response.message, 'success')

                if (envio) {
                    codVerification = makeid(8);
                    sendEmailVerification(request['email'], codVerification)
                    envio = false
                }
                var codVerificasionEmail = $('#verCod').val();
                alert('1 = '+codVerification+ ' 2 = '+codVerificasionEmail)
                if (codVerification == codVerificasionEmail) {

                    alert('los codigos de vedrificasion si son identicos')
                    /*
                    $.ajax({
                        type: "post",
                        url: "../../api/singup_user.php",
                        data: request,
                        dataType: "json",
                        success: function (response) {

                            if (response['status'] == '400') {
                                alertBTS(response['message'], 'danger')
                            } else {
                                if (!cont) {
                                    envio = true;
                                } else {
                                    alertBTS(response['message'], 'success')
                                    alert('gaa')
                                    click = false;
                                }
                            }
                        }
                    });*/
                }

            }
        },
        error: (error) => {
            console.log(error)
        }
    });
});

function makeid(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}