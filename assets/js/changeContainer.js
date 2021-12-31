$('#container-select').on('change', function () {
    var select = $('#container-select option:selected');
    var idCont = $(this).val();
    var nameCont = select.attr('label');
    $('#container-title').text(nameCont)

    var template = ''
    $.ajax({
        url: `api/dishes/${idCont}`,
        type: 'GET',
        dataType: 'JSON',
        success: res => {
            //console.log(res)
            res.forEach(dish => {
                console.log(dish)
                var data = JSON.stringify(dish)
                template += `
            
                <table class="dish" data-dish='${data}'>
                <tr>
                    <td width="100%" height="100%"></td>
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
                `
            });
            $('#container').html(template)
        }

    });

})
