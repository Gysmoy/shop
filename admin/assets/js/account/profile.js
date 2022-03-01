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
        $.notify('La imagen ha sido descargada', 'success');
    } catch (e) {
        console.log(e);
        $.notify('Ocurrió un error en la descarga', 'error');
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
        url: '../api/admin/profile',
        type: 'DELETE',
        dataType: 'JSON',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        data: JSON.stringify(session),
    }).done(res => {
        var session = JSON.parse(localStorage.getItem('session'));
        session.profile = false;
        localStorage.setItem('session', JSON.stringify(session));
        profile_button(session.profile);
        $.notify(res.message, 'success');
    }).fail(e => {
        $.notify(e.responseJSON.message, 'error');
    })
})
// PROFILE ERROR MANAGEMENT
function profile_button(status) {
    $('#profile-watch').attr('disabled', !status);
    $('#profile-download').attr('disabled', !status);
    $('#profile-delete').attr('disabled', !status);
    if (status) {
        $('#profile-watch').removeClass('disabled');
        $('#profile-download').removeClass('disabled');
        $('#profile-delete').removeClass('disabled');
    } else {
        $('#profile-watch').addClass('disabled');
        $('#profile-download').addClass('disabled');
        $('#profile-delete').addClass('disabled');
    }
}
function setCanvas() {
    console.log('Canvas ha sido seteado')
    $('#profile-picture').addClass('to-upload');
    setTimeout(() => {
        html2canvas($('#profile-canvas'), {
            onrendered: function (canvas) {
                getCanvas = canvas;
                $('#profile-picture').removeClass('to-upload');
            }
        });
    }, 250);
}
$('#profile-input').on('change', function() {
    var files = ['image/png','image/jpeg','image/jpg','image/svg+xml'];
    var file = this.files[0];
    console.log(file);
    var reader = new FileReader();
    reader.onloadend = function () {
        var arrayBuffer = reader.result;
        reader.result;
        $('#profile-picture').attr('src', arrayBuffer);
    }
    console.log(files.includes(file));
    if (
        file &&
        files.includes(file.type)
    ) {
        reader.readAsDataURL(file);
        $('#profile-save').prop('disabled', false);
        $.notify('La imagen se cargó correctamente', 'info');
    } else {
        $('#profile-picture').attr('src', `assets/php/image.php?id=undefined`);
        $('#profile-save').prop('disabled', true);
        $.notify('Ocurrió un error al intentar cargar la imagen', 'warn')
    }
})
$('#profile-save').on('click', function() {
    var img = {};
    $('#profile-picture').addClass('to-upload');
    var data = getCanvas.toDataURL('image/jpeg');
    $('#profile-picture').removeClass('to-upload');
    var token = localStorage.getItem('x-auth-token');
    data= data.replace('data:', '').replace('base64,', '');
    data = data.split(';');
    img.type = data[0];
    img.source = data[1];
    $.ajax({
        url: '../api/admin/profile',
        dataType: 'JSON',
        type: 'PATCH',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'x-auth-token': token
        },
        data: JSON.stringify(img)
    }).done(res => {
        var session = JSON.parse(localStorage.getItem('session'));
        $('[session="user_image"]').attr('src', `assets/php/image.php?id=${session.user.id}`);
        session.profile = true;
        localStorage.setItem('session', JSON.stringify(session));
        $('#profile-modal').modal('hide');
        $.notify(res.message, 'success');
    }).fail(e => {
        $.notify(e.responseJSON.message, 'error')
    }).always(() => {
        var session = JSON.parse(localStorage.getItem('session'));
        profile_button(session.profile);
    })
})