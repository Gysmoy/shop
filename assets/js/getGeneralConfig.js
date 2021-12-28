$(document).ready(function() {
    moment.locale('es');
    setInterval(() => {
        var time = moment().format('LTS');
        $('#realtime').text(time);
    }, 1000);
    var idPage = $('body').attr('page');
    console.log(idPage);
})