$('#container-select').on('change', function () {
    var select = $('#container-select option:selected');
    var container_id = select.val();
    var container_name = select.attr('label');
    var container_dishes = select.attr('dishes');

    $('#container-title').text(container_name);
    showLoadingDishes(container_dishes);
    setContainerBackground(container_id);
    
    $.ajax({
        url: `api/dishes/${container_id}`,
        type: 'GET',
        dataType: 'JSON',
        success: res => {
            for (let i = 0; i < res.length; i++) {
                const dish = res[i];
                var data = JSON.stringify(dish);
                var container = $($('#container .dish')[i]);
                container.attr('data-dish', data);
                container.removeClass('loading');
                container.html(`
                <tr>
                    <td width="100%" height="100%" class="loading">
                        <img class="image" src="api/image/mini/${dish.id}"
                            onload="removeLoadingClass($(this).parent())"
                            onerror="loadNotFoundImage(this)"
                        >
                    </td>
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
                `);
            }
            /*res.forEach(dish => {
                console.log(dish)
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
            });*/
        }
    });
})