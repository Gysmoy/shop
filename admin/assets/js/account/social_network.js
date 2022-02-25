function fn_socialNetwork(value) {
    var social_network = localStorage.getItem('social_network');
    if (social_network) {
        social_network = JSON.parse(social_network);
    } else {
        $.ajax({
            async: false,
            url: '../assets/json/social_network.json',
            dataType: 'JSON',
            success: res => {
                social_network = res;
                localStorage.setItem('social_network', JSON.stringify(res));
            }
        })
    }
    var select = $('#sn_id');
    select.empty();
    social_network.forEach(sn => {
        select.append(`
        <option value="${sn.id? sn.id: ''}">${sn.descripcion}</option>
        `);
    })
    select.val(value);
}

$(document).on('click', '#sn_add', function() {
    var title = $('#social_network_modal .modal-title');
    title.text('Agrega una red social de contacto')
    fn_socialNetwork(null);
    $('#sn_value').val(null);
    $('#social_network_modal').modal('show');
})

$(document).on('click', '#sn_edit', function() {
    var title = $('#social_network_modal .modal-title');
    title.text('Edita tu red social de contacto')
    var data = JSON.parse($(this).parents('.social_network').attr('data'));
    fn_socialNetwork(data.id);
    $('#sn_value').val(data.value);
    $('#social_network_modal').modal('show');
})