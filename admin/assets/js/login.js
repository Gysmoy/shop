$('#showHidePassword').on('click', function(){
    var btn = $(this);
    var input = $('#password');
    if (btn.hasClass('fa-eye')) {
        input.attr('type', 'password');
        btn.attr('class', 'fa fa-eye-slash');
    } else {
        input.attr('type', 'text');
        btn.attr('class', 'fa fa-eye');
    }
})
$('#login').submit(function(form){
    form.preventDefault();
    $('#btn-icon').attr('class', 'fa fa-spin fa-spinner');
    var username = $('#username').val().trim() == '' ? undefined: $('#username').val().trim();
    var password = $('#password').val().trim() == '' ? undefined: $('#password').val().trim();
    var request = {};
    request.username = username;
    request.password = password;
    $.ajax({
        url: this.action,
        type: this.method,
        dataType: 'JSON',
        data: request,
    }).done(function(res) {
        $('#btn-icon').attr('class', 'fa fa-check');
        $('blockquote')
            .attr('class', 'success')
            .text(res.message);
        $.ajax({
            async: false,
            url: '../assets/json/social_network.json'
        }).done(social_network => {
            localStorage.setItem('social_network', JSON.stringify(social_network));
        })
        const urlParams = new URLSearchParams(window.location.search);
        const urltogo = urlParams.get('p');
        if (urltogo == null) {
            location.reload();
        } else {
            location.href = urltogo;
        }
    }).fail(function(e){
        $('#btn-icon').attr('class', 'fa fa-exclamation');
        if (e.responseJSON) {
            $('blockquote')
                .attr('class', 'danger')
                .text(e.responseJSON.message);
        } else {
            $('blockquote')
                .attr('class', 'danger')
                .text(`Error ${e.status}: ${e.statusText}`);
        }
    }).always(function() {
        setTimeout(() => {
            $('#btn-icon').attr('class', 'fa fa-user');
            $('blockquote')
                .attr('class', '')
                .text('Ingrese sus credenciales para iniciar sesión');
        }, 2500);
    })
})