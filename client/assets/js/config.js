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


$.ajax({
  type: "POST",
  url: "../php/getDataClient.php",
  dataType: "json",
}).done(function (data) {
  $('#conf-names').val(data.data.user.names);
  $('#conf-primer-apellido').val(data.data.user.lastname1);
  $('#conf-segundo-apellido').val(data.data.user.lastname1);
  $('#conf-calle').val(data.data.user.ubigeo.calle)

  fn_ubigeo_departamento('cbo-departamento', data.data.user.ubigeo.departamento);
  fn_ubigeo_prov('cbo-provincia', data.data.user.ubigeo.provincia, data.data.user.ubigeo.departamento)
  fn_ubigeo_dist('cbo-distrito', data.data.user.ubigeo.distrito, data.data.user.ubigeo.provincia)
  fn_tipocalle('cbo-tipoCalle', data.data.user.ubigeo.tipoCalle)
  $('#cbo-tipoCalle').val(data.data.user.ubigeo.tipoCalle);
  $('#conf-calle').val(data.data.user.ubigeo.calle);
  
  // pintando redes sociales
  function social_networks() {
    var social = data.data.user.social_networks;
    social.forEach(function(data, res){
      console.log(data);
      type = data.type;
      $.getJSON('../json/tipo_redsocial.json', function (data) {
        data.forEach(function(data, res){
          type_soccial = data.id;
          
          console.log('red soial: '+type+' array social: '+type_soccial);
          /*
          if (type_soccial.indexOf(type) !=-1) {

            $('#social-networks').append(`
            <div>
              <div class="badge cont-icon-social badge-pill ${data[x].background}"><i class="icons-social-icon mdi ${data[x].icon}"></i></div>
            </div>
            `);
          }*/

        })
      
          
    });
    });
    
      
    /*
    template +=`
    <div>
            <div class="badge  badge-pill badge-outline-success">+</div>
          </div>
    `;*/
    /*
    $('#social-networks').append(`
          <div>
            <div class="badge  badge-pill badge-outline-success">+</div>
          </div>
            `)*/
          
   //  $('#social-networks').html(template);
  };
  social_networks();
  /*
  $.getJSON('../json/tipo_redsocial.json', function (data) {
        
    for (var x = 0; x < data.length; x++) {
        $("#" + cboid).append('<option value="' + data[x].id + '">' + data[x].descripcion + '</option>');
    }
    if (opcionxdefecto != null) $('#' + cboid).val(opcionxdefecto);
})


  for (var x = 0; x < data.data.user.social_networks.length; x++) {
    $('#social-networks').append('<div class="col-md-1 "><div class="badge cont-icon-social badge-pill badge-danger" title="Instagram"><i class="icons-social-icon mdi mdi-instagram"></i></div></div>');
}
*/

}).fail(function (data) {
  console.log(data)
  alert('fail')
  location.href = 'login.php';
});