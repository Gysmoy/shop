
var codVerification = '';
var envio = false;
var cont = false; 
var click = false;
var contClick = 0;


var request = {}
request['pass'] = $('#pass').val();
request['email'] = $('#email').val();
request['tocken'] = 'false';

function alertBTS(message, status){
    
    $('#message-shop-cont').show(250);
    $('#message-shop').text(message)
    if(status == 'danger'){
        $('#message-shop-svg').attr('aria-label', 'Dangert:')
        $('#message-shop-use').attr('xlink:href', '#exclamation-triangle-fill')
        $('#message-shop-cont-color').removeClass('alert-success', 'alert-warning').addClass('alert-danger');
        alert(message);
    } else if(status == 'warning'){
        $('#message-shop-svg').attr('aria-label', 'Warning:')
        $('#message-shop-use').attr('xlink:href', '#exclamation-triangle-fill')
        $('#message-shop-cont-color').removeClass('alert-success' , 'alert-danger').addClass('alert-warning');
    }else{
         alert(status);
        $('#message-shop-svg').attr('aria-label', 'Success:')
        $('#message-shop-use').attr('xlink:href', '#check-circle-fill')
        $('#message-shop-cont-color').removeClass('alert-danger', 'alert-warning').addClass('alert-success');
    }
}
$('#message-shop-cont').hide();
$('form').submit(function (e) {
    
    alert(contClick);
    e.preventDefault();
    

    if (envio) { 
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
                contClick = contClick +1;
                envio = false;
                cont = true;
                request['tocken'] = 'true';
                $('#contVer').show();
                $('#verCod').focus()
                alertBTS('Ingrese el codigo de verificasion enviado a su correo electronico', 'warning')
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
                    
                    if (response['status'] == '400'){
                       alertBTS(response['message'],'danger')

                    }else {
                        if (!cont){
                            envio = true;
                            click = true;
                            contClick = contClick +1;
                            request['tocken'] = true;

                        }else{
                            alertBTS(response['message'],'success')
                            alert('gaa')
                            click = false;
                        }
                       
                    }
                   /* if (click){
                        function time () { 
                            $('#init-session-shop').click()
                         }
                    
                         setInterval( time, 3000);
                    }*/
                    
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