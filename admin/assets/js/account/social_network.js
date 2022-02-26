function fn_socialNetwork(value) {
    var date = new Date();
    var social_network = localStorage.getItem('social_network');
    if (social_network) {
        social_network = JSON.parse(social_network);
    } else {
        $.ajax({
            async: false,
            url: `../assets/json/social_network.json?v=${date.getTime()}`,
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
    return social_network;
}
function getSocialNetworks() {
    var sns = [];
    $('.social_network').each(function() {
        var data = JSON.parse($(this).attr('data'));
        sns.push(data);
    })
    return sns;
}
function sn_verify() {
    var session = JSON.parse(localStorage.getItem('session'));
    var local_sn = session.social_network;
    var front_sn = getSocialNetworks();
    if (local_sn.length == front_sn.length) {
        var diff = false;
        for (let i = 0; i < local_sn.length; i++) {
            const local = local_sn[i];
            const front = front_sn[i];
            if (local.id == front.id) {
                diff = false;
            } else {
                diff = true;
            }
        }
        if (diff) {
            $('#sn_save').fadeIn();
        } else {
            $('#sn_save').fadeOut();
        }
    } else {
        $('#sn_save').fadeIn();
    }
}


$(document).on('click', '#sn_add', function() {
    var title = $('#social_network_modal .modal-title');
    title.text('Agrega una red social de contacto')
    fn_socialNetwork(null);
    $('#sn_id').prop('disabled', false);
    $('#sn_value').val(null);
    $('#social_network_modal').modal('show');
})

$(document).on('click', '#sn_edit', function() {
    var title = $('#social_network_modal .modal-title');
    title.text('Edita tu red social de contacto')
    var data = JSON.parse($(this).parents('.social_network').attr('data'));
    fn_socialNetwork(data.id);
    $('#sn_id').prop('disabled', true);
    $('#sn_value').val(data.value);
    $('#social_network_modal').modal('show');
})

$(document).on('click', '#sn_new')