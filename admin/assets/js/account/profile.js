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