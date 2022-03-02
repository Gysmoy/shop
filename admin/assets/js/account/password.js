$(document).on('change', '[id="user.password"]', function () {
    var pass1 = $('[id="user.password"][pass="1"]').val();
    var pass2 = $('[id="user.password"][pass="2"]').val();
    if (
        pass1 != '' &&
        pass2 != '' &&
        pass1 == pass2
    ) {
        $('#user-pass button[type="submit"]').attr('disabled', false).fadeIn();
    } else {
        $('#user-pass button[type="submit"]').attr('disabled', true).fadeOut();
        $.notify('Las contraseñas no coinciden', 'error');
    }
})