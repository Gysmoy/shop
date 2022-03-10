function validatePersonaData() {
    var session = JSON.parse(localStorage.session);
    var name = $('[id="user.name"]').val();
    var phone = $('[id="user.phone"]').val();
    var address = $('[id="user.address"]').val();
    if (
        name != session.user.name ||
        phone != session.user.phone ||
        address != session.user.address
    ) {
        $('#personal-data button[type="submit"]')
            .attr('disabled', false)
            .fadeIn();
        return true;
    } else {
        $('#personal-data button[type="submit"]')
            .attr('disabled', true)
            .fadeOut();
        return false;
    }
}

$(document).on('keyup', '#personal-data input', validatePersonaData);
$(document).on('change', '#personal-data input', validatePersonaData);

$(document).on('submit', '#personal-data form', e => {
    e.preventDefault();
    if (validatePersonaData()) {
        var user = {};
        user.name = $('[id="user.name"]').val();
        user.phone = $('[id="user.phone"]').val();
        user.address = $('[id="user.address"]').val();
        $('#password-confirm').attr('onclick', 'submitPersonalData()');
        $('#password-modal')
            .attr('data', JSON.stringify(user))
            .modal('show');
        $('#password-confirmation').val(null);
    }
})
function submitPersonalData() {
    loading('#password-confirm', true);
    var data = JSON.parse($('#password-modal').attr('data'));
    data.confirmation = $('#password-confirmation').val();
    $('#password-confirmation').val(null);
    $.ajax({
        url: '../api/admin/personalData',
        type: 'PATCH',
        dataType: 'JSON',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        data: JSON.stringify(data)
    }).done(res => {
        $.notify(res.message, 'success');
        var session = JSON.parse(localStorage.session);
        session.user.name = data.name;
        session.user.phone = data.phone;
        session.user.address = data.address;
        localStorage.session = JSON.stringify(session);
    }).fail(e => {
        $.notify(e.responseJSON.message, 'error');
    }).always(() => {
        validatePersonaData();
        $('#password-modal').modal('hide');
        loading('#password-confirm', 'Confirmar');
    });
}