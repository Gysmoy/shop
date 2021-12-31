function setStyle(style) {
    
}
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
            console.log(res);
            $('header').css({
                'background-image': `url('api/image/background/${idPage}')`,
                'background-position': 'center center',
                'background-size': 'cover'
            })
            $('#logo').attr({
                'src': `api/image/logo/${idPage}`,
                'title': `Logo de ${res.name}`
            });
            $('title').text(res.name);
            $('#name').text(res.name).attr('title', res.address);
            res.containers.forEach(container => {
                var id = container.id;
                var name = container.name;
                $('#container-select').append(`
                <option value="${id}" label="${name}">${name}</option>
                `);
            });
            $('#container-select').trigger('change');
            $('.socials ul').html(null);
            res.socials.forEach(s => {
                var social = s.social;
                var url = s.url;
                $('.socials ul').append(`
                <li>
                    <a href="${url}" target="_blank"
                        class="social fa fa-${social}">
                    </a>
                </li>
                `);
            });
            setStyle(res.style);
        },
        error: e => {
            console.log(e);
        }
    })
})
