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
    data.social_network.forEach(sn => {
        $('[id="social_network"]').append(`
        <div data="${sn.id}" class="social_network card rounded border mb-2">
            <div class="card-body p-3">
                <div class="media">
                    <i class="mdi mdi-${sn.id} align-self-center me-3"></i>
                    <div class="media-body">
                        <h6 class="mb-1">
                            ${sn.id.toUpperCase()}
                        </h6>
                        <p class="mb-0 text-muted">
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