function setStyle(style) {
    var root = `:root {
        --mainColor: ${style.mainColor};
        --contrast: ${style.contrast};
        --header-nameColor: ${style.header.nameColor};
        --header-shadow: ${style.header.shadow};
        --main-price-background: ${style.main.price.background};
        --main-price-color: ${style.main.price.color};
    }`;
    $('#styles').text(root);
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
           // console.log(res);
            $('header').css({
                'background-image': `url('api/image/background/${idPage}')`,
                'background-position': 'center center',
                'background-size': 'cover'
            })
            $('#logo').attr({
                'src': `api/image/logo/${idPage}`,
                'title': `Logo de ${res.name}`,
                'onload': removeLoadingClass($('#logo'))
            });
            $('title').text(res.name);
            $('#name').text(res.name).attr({
                'title': res.address,
                'class': null
            });
            $('#container-select').attr('class', null)
            res.containers.forEach(container => {
                var id = container.id;
                var name = container.name;
                var dishes = container.dishes;
                $('#container-select').append(`
                <option value="${id}" label="${name}" dishes="${dishes}">${name}</option>
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
