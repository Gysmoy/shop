// UPDATE PROFILE
$(document).on('click', '#profile-update', function () {
    $('#profile-modal').modal('show');
})
// WATCH PROFILE
$(document).on('click', '#profile-watch', function () {
    var session = JSON.parse(localStorage.getItem('session'));
    $('#profile-watcher [session="user_image"]')
        .attr('href', `assets/php/image.php?id=${session.user.id}`)
    $('#profile-watcher').modal('show');
})
// DOWNLOAD PROFILE
$(document).on('click', '#profile-download', function () {
    var session = JSON.parse(localStorage.getItem('session'));
    try {
        const url = `assets/php/image.php?id=${session.user.id}`;
        const a =  document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = `${session.user.name}.png`;
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
    } catch (e) {
        console.log(e);
        alert('Ocurrió un error en la descarga');
    }
})
// UPLOAD PROFILE
$(document).on('click', '#profile-upload', function () {
    $('#profile-modal').modal('show');
    $('#profile-input').click();
})
// DELETE PROFILE
$(document).on('click', '#profile-delete', function () {
    var session = JSON.parse(localStorage.getItem('session'));
    $.ajax({
        url: 'assets/php/account/profile.php',
        type: 'DELETE',
        dataType: 'JSON',
        data: JSON.stringify(session),
    }).done(res => {
        console.log(res);
    })
})
$('#profile-input').on('change', function() {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        var arrayBuffer = reader.result;
        reader.result;
        $('.profile-picture').attr('src', arrayBuffer);
        sessionStorage.setItem('profile', arrayBuffer);
    }
    if (file) {
        reader.readAsDataURL(file);
        $('.profile-btn').prop('disabled', false);
    } else {
        $('.profile-btn').prop('disabled', true);
    }
})
$('.profile-btn').on('click', function() {
    var img = {};
    var data = sessionStorage.getItem('profile');
    var token = localStorage.getItem('x-auth-token');
    data= data.replace('data:', '').replace('base64,', '');
    data = data.split(';');
    img.type = data[0];
    img.source = data[1];
    $.ajax({
        url: '../api/admin/updateProfile',
        dataType: 'JSON',
        type: 'POST',
        headers: {
            'x-auth-token': token
        },
        data: img
    }).done(function (data) {
        console.log('correcto');
    }).fail(function (e) {
        console.log(e);
    })
})