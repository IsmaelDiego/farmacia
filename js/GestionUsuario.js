$(document).ready(function () {
  var tipo_usuario = $("#tipo_usuario").val();

  if (tipo_usuario == 2) {
    $("#button-crear").hide();
  }

  buscar_datos();

  var funcion;

  function buscar_datos(consulta) {
    funcion = "buscar_usuarios_adm";
    $.post(
      "../../Controller/UsuarioController.php",
      { consulta, funcion },
      (response) => {
        const usuarios = JSON.parse(response);
        let template = "";
        usuarios.forEach((usuario) => {
          template += `
    <div usuarioID="${usuario.id}" class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">`;
                if (usuario.tipo_usuario == 3) {
                    template +=`
                    <h1 class="badge badge-danger">${usuario.tipo}</h1>
                    `;
                } 
                if (usuario.tipo_usuario == 2) {
                    template +=`
                    <h1 class="badge badge-info">${usuario.tipo}</h1>
                    `;
                } 
                if (usuario.tipo_usuario == 1) {
                    template +=`
                    <h1 class="badge badge-warning">${usuario.tipo}</h1>
                    `;
                } 

            template += `</div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b> <strong>${usuario.nombre} ${usuario.apellidos}</strong> </b></h2>
                        <p class="text-muted text-sm"><b>Sobre mi: </b> ${usuario.adicional} </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span> DNI: ${usuario.dni}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-id-birthday-cake"></i></span> Edad: ${usuario.edad}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Residencia: ${usuario.residencia}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono: ${usuario.telefono}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span> Correo: ${usuario.correo}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-venus-mars"></i></span> Sexo: ${usuario.sexo}</li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img src="${usuario.avatar}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">`;

          if (tipo_usuario == 3) {
            // If logged-in user is root
            if (usuario.tipo_usuario == 1) {
              template += `
              <button type="button" data-toggle="modal" data-target="#confirmar" class="borrar_usuario btn btn-sm btn-danger">
              <i class="fas fa-window-close"></i> Eliminar
          </button>
        
            <button type="button" data-toggle="modal" data-target="#confirmar" class="descender btn btn-sm btn-secondary">
        <i class="fas fa-sort-amount-down"></i> Descender
    </button>
           `;
            
            }
            if (usuario.tipo_usuario == 2) {
              template += `
              <button type="button" data-toggle="modal" data-target="#confirmar" class="borrar_usuario btn btn-sm btn-danger">
              <i class="fas fa-window-close"></i> Eliminar
          </button> 
            <button type="button" data-toggle="modal" data-target="#confirmar" class="ascender btn btn-sm btn-primary">
        <i class="fas fa-sort-amount-up"></i> Ascender
    </button>
            `;
            }
          }
          if (tipo_usuario == 1) {
            // If logged-in user is admin
            if (usuario.tipo_usuario == 2) {
              template += `
              <button type="button" data-toggle="modal" data-target="#confirmar" class="borrar_usuario btn btn-sm btn-danger">
              <i class="fas fa-window-close"></i> Eliminar
          </button>
            `;
            }
          }
          if (tipo_usuario == 2) {
            if (usuario.tipo_usuario == 2) {
              template += `
              <button type="button" data-toggle="modal" data-target="#confirmar" class="ascender btn btn-sm btn-primary">
              <i class="fas fa-sort-amount-up"></i> Ascender
          </button>
            `;
            }
          }

          template += `
                </div>
            </div>
        </div>
    </div>
`;
        });
        $("#usuarios").html(template);
      }
    );
  }
  $(document).on("keyup", "#buscar", function () {
    let valor = $(this).val();
    if (valor != "") {
      buscar_datos(valor);
    } else {
      buscar_datos();
    }
  });
  $('#form-crear').submit(e=>{
    let nombre = $('#nombre').val();
    let apellido = $('#apellido').val();
    let edad = $('#edad').val();
    let dni = $('#dni').val();
    let pass = $('#pass').val();

    funcion = 'crear_usuario';
    $.post('../../Controller/UsuarioController.php',{nombre,apellido,edad,dni,pass,funcion},(response)=>{
        if (response == 'add') {
            $('#add').hide('slow');
            $('#add').show('2000');
            $('#add').hide('1000');
            $('#form-crear').trigger('reset');
             buscar_datos();
            
        }else{
            $('#noadd').hide('slow');
            $('#noadd').show('2000');
            $('#noadd').hide('1000');
            $('#form-crear').trigger('reset');
        }
    });
        e.preventDefault();

  });
  $(document).on('click','.ascender',(e)=>{
    const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
    const id = $(elemento).attr('usuarioId');
    funcion = 'ascender';
    $('#id_user').val(id);
    $('#funcion').val(funcion);

  });
  $(document).on('click','.descender',(e)=>{
    const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
    const id = $(elemento).attr('usuarioId');
    funcion = 'descender';
    $('#id_user').val(id);
    $('#funcion').val(funcion);
    
  });
  $(document).on('click','.borrar_usuario',(e)=>{
    const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
    const id = $(elemento).attr('usuarioId');
    funcion = 'borrar_usuario';
    $('#id_user').val(id);
    $('#funcion').val(funcion);
    
  });
  $('#form-confirmar').submit(e=>{
    let pass = $('#oldpass').val();
    let id_usuario = $('#id_user').val();
    funcion = $('#funcion').val();
    $.post('../../Controller/UsuarioController.php',{pass,id_usuario,funcion},(response)=>{
        if (response=='ascendido' || response == 'descendido' || response == 'borrado') {
            $('#confirmado').hide('slow');
            $('#confirmado').show('2000');
            $('#confirmado').hide('1000');
            $('#form-confirmar').trigger('reset');
        } else {
            $('#rechazado').hide('slow');
            $('#rechazado').show('2000');
            $('#rechazado').hide('1000');
            $('#form-confirmar').trigger('reset');
        }
        buscar_datos();

    })
    e.preventDefault();
});
});
