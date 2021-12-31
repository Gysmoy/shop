$('#container-select').on('change', function () {
    var select = $('#container-select option:selected');
    var idCont = $(this).val();
    var nameCont = select.attr('label');
    $('#container-title').text(nameCont);
    $('main').css({
        'background': `linear-gradient(
            to bottom,
            rgba(255, 255, 255, .25) 40%,
            rgba(255, 255, 255, .25)
        ), url('api/image/container/${idCont}')`,
        'background-size': 'cover',
        'background-position': 'center center'
    })
    var template = '';
    /*$.ajax({
        url: `api/dishes/${idCont}`,
        type: 'GET',
        dataType: 'JSON',
        success: res => {
            setTimeout(() => {
                $('.dish').removeClass('loading');
            }, 2800);
            res.forEach(dish => {
                var data = JSON.stringify(dish)
                template += `
                <table class="dish loading" data-dish='${data}'>
                    <tr>
                        <td width="100%" height="100%" style="
                            background-image: url('api/image/mini/${dish.id}');
                            background-position: center center;
                            background-size: cover;
                            "></td>
                        <td>
                            <i class="icon fa fa-cart-plus"></i>
                            <fieldset class="price">
                                <legend class="type">Menú</legend>
                                ${dish.price}
                            </fieldset>
                            <fieldset class="price">
                                <legend class="type">Carta</legend>
                                ${dish.price}
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="name">${dish.name}</p>
                        </td>
                    </tr>
                </table>
                `;
            });
            $('#container').html(template);
        }
    });
    $('#container').children('.dish').removeClass('loading');*/
})