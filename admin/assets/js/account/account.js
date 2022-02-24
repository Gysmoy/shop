function updateProfile() {
    $('#profile-modal').modal('show');
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