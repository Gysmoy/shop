function validatePassword() {
    var pass1 = $('[id="user.password"][pass="1"]').val();
    var pass2 = $('[id="user.password"][pass="2"]').val();
    if (
        pass1 != '' &&
        pass2 != '' &&
        pass1 == pass2
    ) {
        $('#user-pass button[type="submit"]').attr('disabled', false).fadeIn();
        return true;
    } else {
        $('#user-pass button[type="submit"]').attr('disabled', true).fadeOut();
        $.notify('Las contraseñas no coinciden', 'error');
        return false;
    }
}

// On change value in password
$(document).on('change', '[id="user.password"]', validatePassword);
$(document).on('keyup','[id="user.password"][pass="2"]',() => {
    var pass1 = $('[id="user.password"][pass="1"]').val();
    var pass2 = $('[id="user.password"][pass="2"]').val();
    if (pass1.length == pass2.length) {
        validatePassword();
    }
});

$(document).on('submit', '#user-pass form', e => {
    e.preventDefault();
    if (validatePassword()) {
        var pass = {};
        var password = $('[id="user.password"]').val();
        pass.password = password;
        pass.length = password.length;
        $('#password-confirm').attr('onclick', 'submit_password()');
        $('#password-modal')
            .attr('data', JSON.stringify(pass))
            .modal('show');
    }
})

function submit_password() {
    loading('#password-confirm', true);
    var data = JSON.parse($('#password-modal').attr('data'));
    data.confirmation = $('#password-confirmation').val();
    $('#password-confirmation').val(null);
    $.ajax({
        url: '../api/admin/password',
        type: 'PATCH',
        dataType: 'JSON',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        data: JSON.stringify(data)
    }).done(res => {
        
        $.notify(res.message, 'success');
        setTimeout(() => {
            location.reload();
        }, 1500);
        location.reload();
    }).fail(e => {
        $.notify(e.responseJSON.message, 'error');
    }).always(() => {
        $('#password-modal').modal('hide');
        loading('#password-confirm', 'Confirmar');
    });
}