function showLoadingDishes(cant = 2) {
    $('#container').html(null);
    for (let i = 0; i < cant; i++) {
        $('#container').append(`
        <table class="dish loading">
            <tr>
                <td width="100%" height="100%" class="loading"></td>
                <td>
                    <i></i>
                    <fieldset class="price">
                        <legend class="type"> </legend>
                          
                    </fieldset>
                    <fieldset class="price">
                        <legend class="type"> </legend>
                          
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="name">               </p>
                </td>
            </tr>
        </table>
        `);
    }
}
function setContainerBackground(container_id) {
    $('main').css({
        'background': `linear-gradient(
            to bottom,
            rgba(255, 255, 255, .25) 40%,
            rgba(255, 255, 255, .25)
        ), url('api/image/container/${container_id}')`,
        'background-size': 'cover',
        'background-position': 'center center'
    })
}
showLoadingDishes();