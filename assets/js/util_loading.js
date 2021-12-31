function showLoadingDishes(cant = 2) {
    $('#container').html(null);
    for (let i = 0; i < cant; i++) {
        $('#container').append(`
        <table class="dish loading">
            <tr>
                <td width="100%" height="100%"></td>
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