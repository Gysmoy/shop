// COMBOS DE DIRECION

fn_tipocalle('cbo-tipoCalle','-1');
fn_tiporedsocial('cbo-tipoRedSocial','-1');
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
  
  alert(idClient)


// FIN