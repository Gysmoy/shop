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
            if (
                local.id == front.id &&
                local.value == front.value
            ) {
                diff = false;
            } else {
                diff = true;
                break;
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
    $('#sn_position').val(null);
    $('#sn_id').prop('disabled', false);
    $('#sn_value').val(null);
    $('#social_network_modal').modal('show');
})

$(document).on('click', '#sn_edit', function() {
    $('#social_network_modal .modal-title')
        .text('Edita tu red social de contacto')
    var data = JSON.parse($(this).parents('.social_network').attr('data'));
    var social_network = getSocialNetworks();
    var position;
    for (let i = 0; i < social_network.length; i++) {
        const sn = social_network[i];
        if (
            sn.id == data.id &&
            sn.value == data.value
        ) {
            position = i;
            break;
        }
    }
    fn_socialNetwork(data.id);
    $('#sn_position').val(position);
    $('#sn_id').prop('disabled', true);
    $('#sn_value').val(data.value);
    $('#social_network_modal').modal('show');
})

$(document).on('click', '#sn_new', function() {
    var position = $('#sn_position').val();
    var id = $('#sn_id').val();
    var value = $('#sn_value').val();
    var social_network = getSocialNetworks();
    if(position) {
        social_network[position] = {'id': id, 'value': value};
    } else {
        social_network.push({'id': id, 'value': value});
    }
    socialData(social_network);
    sn_verify();
    $('#social_network_modal').modal('hide');
})
$(document).on('click', '#sn_delete', function() {
    $(this).parents('.social_network').remove();
    sn_verify();
})
$(document).on('click', '#sn_save', function () {
    var social_network = getSocialNetworks();
    var session = JSON.parse(localStorage.getItem('session'));
    session.social_network = social_network;
    $.ajax({
        url: '../api/admin/social_network',
        type: 'PATCH',
        dataType: 'JSON',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        data: JSON.stringify(session)
    }).done(res => {
        localStorage.setItem('session', JSON.stringify(session));
        socialData(session.social_network);
        sn_verify();
        $.notify(res.message, 'success');
    }).fail(e => {
        $.notify(e.responseJSON.message, 'error');
    })
})