// COMBOS DE DIRECION
fn_tipocalle('cbo-tipoCalle', '-1');
fn_tiporedsocial('cbo-tipoRedSocial', '-1');
fn_ubigeo_departamento('cbo-departamento', null);
fn_ubigeo_prov('cbo-provincia', null, null);
fn_ubigeo_dist('cbo-distrito', null, null);

$('#cbo-departamento').on('change', function () {
  let departamento = $('#cbo-departamento option:selected').val();
  $('#cbo-provincia').empty();
  fn_ubigeo_prov('cbo-provincia', null, departamento);
});
$('#cbo-provincia').on('change', function () {
  let provincia = $('#cbo-provincia option:selected').val();
  fn_ubigeo_dist('cbo-distrito', null, provincia);
});

$('#submit-data-user').click(function (e) {
  e.preventDefault();
  sedingDataClient();
});


// traendo datos
function getDataClient() {
  $.ajax({
    type: "POST",
    url: "../php/getDataClient.php",
    dataType: "json",
  }).done(function (data) {
    $('#conf-names').val(data.data.user.names);
    $('#conf-primer-apellido').val(data.data.user.apellidoPaterno);
    $('#conf-segundo-apellido').val(data.data.user.apellidoMaterno);
    $('#conf-calle').val(data.data.user.ubigeo.calle)

    fn_ubigeo_departamento('cbo-departamento', data.data.user.ubigeo.departamento);
    fn_ubigeo_prov('cbo-provincia', data.data.user.ubigeo.provincia, data.data.user.ubigeo.departamento)
    fn_ubigeo_dist('cbo-distrito', data.data.user.ubigeo.distrito, data.data.user.ubigeo.provincia)
    fn_tipocalle('cbo-tipoCalle', data.data.user.ubigeo.tipoCalle)
    $('#cbo-tipoCalle').val(data.data.user.ubigeo.tipoCalle);
    $('#conf-calle').val(data.data.user.ubigeo.calle);

    // pintando redes sociales
    social_networks(data);

  }).fail(function (data) {
    console.log(data)
    alert('fail')
    location.href = 'login.php';
  });
}

// pintando redes sociales 
function social_networks(data) {
  var social = data.data.user.social_networks;
  social.forEach(function (data) {
    $.getJSON('../json/tipo_redsocial.json', function (data_r) {
      data_r.forEach(function (data_u) {
        if (data.type == data_u.id) {
          $('#social-networks').prepend(`
            <div>
              <div class="badge cont-icon-social badge-pill ${data_u.background}"><i class="icons-social-icon mdi ${data_u.icon}"></i></div>
            </div>
          `);
        }
      })
    });
  });
};


// subiendo cambios 
function sedingDataClient() {
  var request = {};
  var ubigeo = {};
  request.names = $('#conf-names').val();
  request.apellidoPaterno = $('#conf-primer-apellido').val();
  request.apellidoMaterno = $('#conf-segundo-apellido').val();

  ubigeo.departamento = $('#cbo-departamento').val();
  ubigeo.provincia = $('#cbo-provincia').val();
  ubigeo.distrito = $('#cbo-distrito').val();
  ubigeo.tipoCalle = $('#cbo-tipoCalle').val();
  ubigeo.calle = $('#conf-calle').val();

  request.ubigeo = ubigeo;

  $.ajax({
    type: "POST",
    url: "../php/dateUpdate.php",
    dataType: "json",
    //contentType: "application/json",
    data: request
  }).done(function (data) {
    alert(data.message);
    getDataClient()
  }).fail(function (data) {
 
    console.log(data.message);
    alert('Error en la operacion')
  });
}

$(document).ready(function(){
  getDataClient();

});