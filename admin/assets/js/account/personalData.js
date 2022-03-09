$(document).on('keyup', '#personal-data input', function () {
    var session = JSON.parse(localStorage.getItem('session'));
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
    } else {
        $('#personal-data button[type="submit"]')
            .attr('disabled', true)
            .fadeOut();
    }
})