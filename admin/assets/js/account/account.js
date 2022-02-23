function updateProfile() {
    $('#profile-modal').modal('show');
}
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
$(document).on('click', '#sn_btn', function() {
    $('#social_network_modal').modal('show');
    fn_socialNetwork(null);
})
function getSocialNetworks() {
    var ids = $('[s_n="id"]');
    var values = $('[s_n="value"]');
    var sns = [];
    var i = 0;
    ids.each(function() {
        var id = $(this);
        var value = $(values[i]);
        var sn = {};
        sn.id = id.val();
        sn.value = value.val();
        i++;
        sns.push(sn);
    })
    return sns;
}