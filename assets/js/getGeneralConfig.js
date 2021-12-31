$(document).ready(function() {
    // Estableciendo reloj en tiempo real
    moment.locale('es');
    setInterval(() => {
        var time = moment().format('LTS');
        $('#realtime').text(time);
    }, 1000);

    // Obteniendo configuración general
    var idPage = $('body').attr('page');
    $.ajax({
        url: `api/config/${idPage}`,
        type: 'GET',
        dataType: 'JSON',
        success: res => {
            $('title').text(res.name);
            $('#name').text(res.name);
        },
        error: e => {
            console.log(e);
        }
    })
})
