$(document).ready(function() {
    // Estableciendo reloj en tiempo real
    moment.locale('es');
    setInterval(() => {
        var time = moment().format('LTS');
        $('#realtime').text(time);
    }, 1000);

    // Obteniendo configuración general
    var idPage = $('body').attr('page');
    console.log(idPage);
    $.ajax({
        url: 'api/config/' + idPage,
        type: 'GET',
        dataType: 'JSON',
        headers: {

        },
        success: res => {
            console.log(res);
        },
        error: e => {
            console.log(e);
        }
    })
})
