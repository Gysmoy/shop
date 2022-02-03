function alertBTS(message, status) {
    $('#message-shop-cont').show(250);
    $('#message-shop').text(message)
    if (status == 'danger') {
        $('#message-shop-svg').attr('aria-label', 'Dangert:')
        $('#message-shop-use').attr('xlink:href', '#exclamation-triangle-fill')
        $('#message-shop-cont-color').removeClass('alert-success alert-warning').addClass('alert-danger');

    } else if (status == 'warning') {
        $('#message-shop-svg').attr('aria-label', 'Warning:')
        $('#message-shop-use').attr('xlink:href', '#exclamation-triangle-fill')
        $('#message-shop-cont-color').removeClass('alert-success alert-danger').addClass('alert-warning');
    } else {

        $('#message-shop-svg').attr('aria-label', 'Success:')
        $('#message-shop-use').attr('xlink:href', '#check-circle-fill')
        $('#message-shop-cont-color').removeClass('alert-danger alert-warning').addClass('alert-success');
    }
}
function sendEmailVerification(email, code) {
    $.ajax({
        method: 'POST',
        url: `https://formsubmit.co/ajax/${email}`,
        dataType: 'json',
        accepts: 'application/json',
        data: {
            name: 'Correo de verificasion de SHOP... Queresmos estar seguros de que eres tu ;)',
            message: `Tu codigo de verificasion  de tu Gmail es ===  ${code}  ===`
        },
        success: (data) => {
            $('#contVer').show();
            $('#verCod').focus()
            alertBTS('Ingrese el codigo de verificasion enviado a su correo electronico', 'warning')
        },
        error: (err) => console.log(err)
    });
    return true;
}
function fn_tiporedsocial(cboid, opcionxdefecto) {
    $('#' + cboid).empty();
    $("#" + cboid).append('<option></option>');
    $.getJSON('../json/tipo_redsocial.json', function (data) {
        
        for (var x = 0; x < data.length; x++) {
            $("#" + cboid).append('<option value="' + data[x].id + '">' + data[x].descripcion + '</option>');
        }
        if (opcionxdefecto != null) $('#' + cboid).val(opcionxdefecto);
    })
}
function fn_tipocalle(cboid, opcionxdefecto) {
    $('#' + cboid).empty();
    $("#" + cboid).append('<option></option>');
    $.getJSON('../json/tipo_calle.json', function (data) {
        
        for (var x = 0; x < data.length; x++) {
            $("#" + cboid).append('<option value="' + data[x].id + '">' + data[x].descripcion + '</option>');
        }
        if (opcionxdefecto != null) $('#' + cboid).val(opcionxdefecto);
    })
}
function fn_ubigeo_departamento(cboid, opcionxdefecto) {
    const unicos = [];
    $('#' + cboid).empty();
    $.getJSON('../json/ubigeo.json', function (data) {
        $("#" + cboid).append('<option></option>');
        data.forEach(datos => {
            if (!unicos.includes(datos.cod_dpto_gw)) {
                unicos.push(datos.cod_dpto_gw);
                $("#" + cboid).append('<option value="' + datos.cod_dpto_gw + '">' + datos.dpto_gw + '</option>');
            }
        });
        if (opcionxdefecto != null) $('#' + cboid).val(opcionxdefecto);
    })
}
function fn_ubigeo_prov(cboid, opcionxdefecto, coddepartamento) {
    const unicos = [];
    $('#' + cboid).empty();
    $.getJSON('../json/ubigeo.json', function (data) {
        $("#" + cboid).append('<option></option>');
        data.forEach(datos => {
            if (datos.cod_dpto_gw == coddepartamento) {
                if (!unicos.includes(datos.prov_gw)) {
                    unicos.push(datos.prov_gw);
                    $("#" + cboid).append('<option value="' + datos.prov_gw + '">' + datos.prov_gw + '</option>');
                }
            }
        })
        if (opcionxdefecto != null) $('#' + cboid).val(opcionxdefecto);
    })
}
function fn_ubigeo_dist(cboid, opcionxdefecto, codprovincia) {
    const unicos = [];
    $('#' + cboid).empty();
    $.getJSON('../json/ubigeo.json', function (data) {
        $("#" + cboid).append('<option></option>');
        data.forEach(datos => {
            if (datos.prov_gw == codprovincia) {
                if (!unicos.includes(datos.dist_gw)) {
                    unicos.push(datos.dist_gw);
                    $("#" + cboid).append(`<option ubigeo="${datos.ubigeo}" value="${datos.dist_gw}">${datos.dist_gw}</option>`);
                }
            }
        });
        if (opcionxdefecto != null) $('#' + cboid).val(opcionxdefecto);
    })

}

