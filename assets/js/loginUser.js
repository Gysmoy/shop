
var codVerification = '';
var envio = false;
$('form').submit(function (e) {
    e.preventDefault();

    var request = {}
    request['pass'] = $('#pass').val();
    request['email'] = $('#email').val();


    if (!envio) {
        codVerification = makeid(8);
        $.ajax({
            method: 'POST',
            url: `https://formsubmit.co/ajax/${request['email']}`,
            dataType: 'json',
            accepts: 'application/json',
            data: {
                name: 'Correo de verificasion de SHOP... Queresmos estar seguros de que eres tu ;)',
                message: `Tu codigo de verificasion  de tu Gmail es ===  ${codVerification}  ===`
            },
            success: (data) => {
                $('#contVer').show();
                envio = true;
            },
            error: (err) => console.log(err)
        });

    }else {
        var codVerificasionEmail = $('#verCod').val();
        if (codVerification == codVerificasionEmail) {
            $.ajax({
                type: "post",
                url: "../../api/login.php",
                data: request,
                dataType: "json",
                success: function (response) {
                    console.log('Enviado')
                }
            });
        } else {
            console.log(codVerification + ' : ' + codVerificasionEmail)
        }

    }


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