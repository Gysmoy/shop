function userData(user) {
    $('[id="user.username"]').val(user.username);
    $('[id="user.email"]').val(user.email);
}
function personalData(user) {
    $('[id="user.name"]').val(user.name);
    $('[id="user.phone"]').val(user.phone);
    $('[id="user.address"]').val(user.address);
}
function socialData(social_network) {
    $('[id="social_network"]').empty();
    var social_network_json = JSON.parse(localStorage.getItem('social_network'));
    social_network.forEach(sn => {
        var sn_complete;
        social_network_json.forEach(function(social) {
            if (social.id == sn.id) {
                sn_complete = social;
            }
        });
        $('[id="social_network"]').append(`
        <div data="${sn.id}" class="social_network card rounded border mb-2"
            style="background-color: ${sn_complete.background}11;">
            <div class="card-body p-3">
                <div class="media">
                    <i class="mdi mdi-${sn.id} align-self-center me-3" style="color: ${sn_complete.background};"></i>
                    <div class="media-body">
                        <h6 class="mb-1">
                            <a href="${sn_complete.href}${sn.value}" target="_blank"
                                style="color: ${sn_complete.background};">
                                ${sn_complete.descripcion}
                            </a>
                        </h6>
                        <p class="mb-0" style="
                            color: #ffffff99;
                            font-size: small;
                        ">
                            ${sn.value}
                        </p>
                    </div>
                </div>
            </div>
            <button id="sn_edit"
                class="mdi mdi-pencil btn btn-sm btn-rounded btn-warning">
            </button>
            <button id="sn_delete"
                class="mdi mdi-delete-forever btn btn-sm btn-rounded btn-danger">
            </button>
        </div>
        `);
        $(`.social_network[data="${sn.id}"]`).attr('data', JSON.stringify(sn))
    });
}

// Variables globales
var getCanvas;

$(document).ready(function () {
    var data = JSON.parse(localStorage.getItem('session'));
    profile_button(data.profile)
    userData(data.user);
    personalData(data.user);
    socialData(data.social_network);
});