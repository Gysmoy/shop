function alertBTS(message, status) {
    $('#message-shop-cont').show(250);
    $('#message-shop').text(message)
    if (status == 'danger') {
        $('#message-shop-svg').attr('aria-label', 'Dangert:')
        $('#message-shop-use').attr('xlink:href', '#exclamation-triangle-fill')
        $('#message-shop-cont-color').removeClass('alert-success alert-warning').addClass('alert-danger');
       
    } else if (status == 'warning') {
        $('#message-shop-svg').attr('aria-label', 'Warning:')
        $('#message-shop-use').attr('xlink:href', '#exclamation-triangle-fill')
        $('#message-shop-cont-color').removeClass('alert-success alert-danger').addClass('alert-warning');
    } else {
       
        $('#message-shop-svg').attr('aria-label', 'Success:')
        $('#message-shop-use').attr('xlink:href', '#check-circle-fill')
        $('#message-shop-cont-color').removeClass('alert-danger alert-warning').addClass('alert-success');
    }
}

function sendEmailVerification (email,code){
    $.ajax({
        method: 'POST',
        url: `https://formsubmit.co/ajax/${email}`,
        dataType: 'json',
        accepts: 'application/json',
        data: {
            name: 'Correo de verificasion de SHOP... Queresmos estar seguros de que eres tu ;)',
            message: `Tu codigo de verificasion  de tu Gmail es ===  ${code}  ===`
        },
        success: (data) => {
            $('#contVer').show();
            $('#verCod').focus()
            alertBTS('Ingrese el codigo de verificasion enviado a su correo electronico', 'warning')
        },
        error: (err) => console.log(err)
    });
    return true;
}