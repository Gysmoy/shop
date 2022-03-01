// UPDATE PROFILE
$(document).on('click', '#profile-update', function () {
    $('#profile-modal').modal('show');
})
// WATCH PROFILE
$(document).on('click', '#profile-watch', function () {
    var session = JSON.parse(localStorage.getItem('session'));
    $('#profile-watcher [session="user_image"]')
        .attr('href', `../api/admin/image/full/${session.user.id}`)
    $('#profile-watcher').modal('show');
})
// DOWNLOAD PROFILE
$(document).on('click', '#profile-download', function () {
    var session = JSON.parse(localStorage.getItem('session'));
    try {
        const url = `../api/admin/image/full/${session.user.id}`;
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
        $('[session="user_image"]').attr('src', `../api/admin/image/mini/undefined`);
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
    var reader = new FileReader();
    reader.onloadend = function () {
        var arrayBuffer = reader.result;
        reader.result;
        $('#profile-picture').attr('src', arrayBuffer);
    }
    if (
        file &&
        files.includes(file.type)
    ) {
        reader.readAsDataURL(file);
        $('#profile-save').prop('disabled', false);
        $.notify('La imagen se cargó correctamente', 'info');
    } else {
        $('#profile-picture').attr('src', `../api/admin/image/mini/undefined`);
        $('#profile-save').prop('disabled', true);
        $.notify('Ocurrió un error al intentar cargar la imagen', 'warn')
    }
})
$('#profile-save').on('click', function() {
    var img = {};
    $('#profile-picture').addClass('to-upload');
    var data = getCanvas.toDataURL('image/jpeg');
    $('#profile-picture').removeClass('to-upload');
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
            'Content-Type': 'application/json'
        },
        data: JSON.stringify(img)
    }).done(res => {
        var session = JSON.parse(localStorage.getItem('session'));
        $('[session="user_image"]').attr('src', `../api/admin/image/mini/${session.user.id}`);
        $('[session="user_image_full"]').attr('src', `../api/admin/image/full/${session.user.id}`);
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