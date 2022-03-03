// COMBOS DE DIRECION
fn_tipocalle('cbo-tipoCalle', '-1');
fn_tiporedsocial('cbo-tipoRedSocial', '-1');
fn_ubigeo_departamento('cbo-departamento', null);
fn_ubigeo_prov('cbo-provincia', null, null);
fn_ubigeo_dist('cbo-distrito', null, null);

// LLENADO UBIGEO
$('#cbo-departamento').on('change', function () {
  let departamento = $('#cbo-departamento option:selected').val();
  $('#cbo-provincia').empty();
  fn_ubigeo_prov('cbo-provincia', null, departamento);
});
$('#cbo-provincia').on('change', function () {
  let provincia = $('#cbo-provincia option:selected').val();
  fn_ubigeo_dist('cbo-distrito', null, provincia);
});

// EVENTOS
$('#submit-data-user').click(function (e) {
  e.preventDefault();
  sedingDataClient();
});



// TRAENDO Y PINTANDO DATOS
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
    social_networks(data);
  }).fail(function (data) {
    console.log(data)
    alert('fail')
    location.href = 'login.php';
  });
}

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
  request.type = 'data_client'
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


// pintando redes sociales 
function get_networks(data) {
  var social = data.data.user.social_networks;
  var i = 0;
  var f = 0;
  social.forEach(function (data, index, array) {
    i++;
    $.getJSON('../json/tipo_redsocial.json', function (data_r) {
      f++;
      data_r.forEach(function (data_u) {
        if (data.type == data_u.id) {
          $('#social-networks').prepend(`
            <div id="social-${data.type}">

              <div class="badge cont-icon-social badge-pill ${data_u.background}" data-bs-toggle="modal" data-bs-target="#s${data.type}"><i class="icons-social-icon mdi ${data_u.icon}"></i></div>
           
              <div class="modal fade" id="s${data.type}" tabindex="-1"
                aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" >ADMINISTRAR ${data_u.id.toUpperCase()}</h5>
                      <button type="button" id="btn-exit-modal${data.type}" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Tipo de red social:</label>
                          <select type="text" class="form-control" id="type-social-${data.type}"></select>
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">RED SOCIAL </label>
                          <input type="text" class="form-control" placeholder="Descripcion" id="text-social-${data.type}">
                        </div>
                      </form>
                    </div>
                    
                    <div class="modal-footer">
                    <button type="button" id="eliminar-R${data.type}" class="btn btn-danger">Eliminar</button>
                    <button type="button" id="actualizar-R${data.type}" class="btn btn-success">Actualizar</button>
                      <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">Canselar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          `);


          // rrelenado datos al modal
          fn_tiporedsocial(`type-social-${data.type}`, data_u.id)
          $(`#text-social-${data.type}`).val(`${data.description}`)

          // eliminado datos del modal

          $(`#eliminar-R${data.type}`).click(function () {
            array.splice(index, 1);
            $(`#s${data.type}`).modal('hide');
            $(`#social-${data.type}`).hide();
            console.log(array)
            console.log(index)
          });

        }
      })
    });

  });



  function delete_social_network(data, name) {
    data.forEach(function (val, index, arr) {
      if (data[index].type == name) {
        data.splice(index, 1);
        $(`#s${index}`).modal('hide');
      }
    });
    return data;
  }


  function add_social_network(data) {


    $('#social-networks').append(`
    <div>
      <div id="add-social-network" class="badge  badge-pill badge-outline-success" data-bs-toggle="modal" data-bs-target="#modal-add-social-network">+</div>

      <div class="modal fade" id="modal-add-social-network" tabindex="-1"
        aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel">AGREGAR NUEBA RED SOCIAL</h5>
              <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Tipo de red social:</label>
                  <select type="text" class="form-control" id="add-type-red-social"></select>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">RED SOCIAL </label>
                  <input type="text" class="form-control" placeholder="Descripcion" id="text-add-social">
                </div>
              </form>
            </div>
            
            <div class="modal-footer">
            <button type="button" class="btn btn-success">Aseptar</button>
              <button type="button" class="btn btn-light"
                data-bs-dismiss="modal">Canselar</button>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>`);
  }
  /*
    social.forEach(function (val, index, arr) {
      $(`#eliminar-R${index}`).click(function () {
        array.splice(index, 1);
        $(`#s${index}`).modal('hide');
        $(`#social-${index}`).hide();
        console.log(array)
        console.log(index)
  
      });
    });
  */


  // ELIMINAR RED SOCIAL

  $(`#eliminar-R${f}`).click(function () {
    function delete_social_network(data, name) {
      h++;
      data.forEach(function (val, index, arr) {

        if (data[index].type == name) {

          data.splice(index, 1);
          console.log(h)
          $(`#s${h}`).modal('hide');

        }
      });
      return data;
    }
    res = delete_social_network(social, data.type);
    console.log(res);

  });

  console.log(social)

};

// loica para red social



$(document).ready(function () {
  getDataClient();

  fn_tiporedsocial('add-type-red-social', -1)
});
