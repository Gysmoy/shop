function userData(data) {
    $('[id="user.username"]').val(data.user.username);
    $('[id="user.email"]').val(data.user.email);
}
function personalData(data) {
    $('[id="user.name"]').val(data.user.name);
    $('[id="user.phone"]').val(data.user.phone);
    $('[id="user.address"]').val(data.user.address);
}
function socialData(data) {
    $('[id="social_network"]').empty();
    var social_network = JSON.parse(localStorage.getItem('social_network'));
    data.social_network.forEach(sn => {
        var sn_complete;
        social_network.forEach(function(social) {
            if (social.id == sn.id) {
                sn_complete = social;
            }
        });
        console.log(sn_complete);
        $('[id="social_network"]').append(`
        <div data="${sn.id}" class="social_network card rounded border mb-2"
            style="background-color: ${sn_complete.background}11;">
            <div class="card-body p-3">
                <div class="media">
                    <i class="mdi mdi-${sn.id} align-self-center me-3" style="color: ${sn_complete.background};"></i>
                    <div class="media-body">
                        <h6 class="mb-1">
                            <a href="${sn.value}" target="_blank"
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
$(document).ready(function () {
    var data = JSON.parse(localStorage.getItem('session'));
    userData(data);
    personalData(data);
    socialData(data);
});