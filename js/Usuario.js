$(document).ready(function(){
    var funcion = '';
    var id_usuario = $('#id_usuario').val();
    var edit = false;

    buscar_usuario(id_usuario);
    
    function buscar_usuario(dato){
        funcion  = 'buscar_usuario';
        $.post('../../Controller/UsuarioController.php', { dato, funcion }, (response) => {
            try {
                const usuario = JSON.parse(response);
                // Resto del código
            } catch (error) {
                console.error('Error al analizar la respuesta JSON:', error);
            }
        }).fail((jqXHR, textStatus, errorThrown) => {
            console.error('Error en la solicitud:', textStatus, errorThrown);
        });
        
        $.post('../../Controller/UsuarioController.php',{dato,funcion},(response)=>{
            let nombre = '';
            let apellidos = '';
            let dni = '';
            let edad = '';
            let tipo = '';
            let telefono = '';
            let correo = '';
            let residencia = '';
            let sexo = '';
            let adicional = '';
            //analiza el string  para extraer todos los atributos del json
            const usuario = JSON.parse(response);
            // se concadena las varibles 
            nombre+=`${usuario.nombre}`;
            apellidos+=`${usuario.apellidos}`;
            dni+=`${usuario.dni}`;
            edad+=`${usuario.edad}`;
            if (usuario.tipo == 'Root') {
                tipo +=`
                <h1 class="badge badge-danger">${usuario.tipo}</h1>
                `;
            } 
            if (usuario.tipo == 'Técnico') {
                tipo +=`
                <h1 class="badge badge-info">${usuario.tipo}</h1>
                `;
            } 
            if (usuario.tipo == 'Administrador') {
                tipo +=`
                <h1 class="badge badge-warning">${usuario.tipo}</h1>
                `;
            } 
            telefono+=`${usuario.telefono}`;
            correo+=`${usuario.correo}`;
            residencia+=`${usuario.residencia}`;
            sexo+=`${usuario.sexo}`;
            adicional+=`${usuario.adicional}`;

            $('#nombre_us').html(nombre);
            $('#apellido_us').html(apellidos);
            $('#dni_us').html(dni);
            $('#edad_us').html(edad);
            $('#us_tipo').html(tipo);
            $('#telefono_us').html(telefono);
            $('#correo_us').html(correo);
            $('#residencia_us').html(residencia);
            $('#sexo_us').html(sexo);
            $('#adicional_us').html(adicional);
            $('#avatar4').attr('src', usuario.avatar);
            $('#avatar3').attr('src', usuario.avatar);
            $('#avatar2').attr('src', usuario.avatar);
            $('#avatar1').attr('src', usuario.avatar);
        })
    }
    //Evento para capturar los datos del usuario y poder editarlos
    $(document).on('click','.edit',(e)=>{
        funcion='capturar_datos';
        edit=true;
        $.post('../../Controller/UsuarioController.php',{funcion,id_usuario},(response)=>{
            const usuario  = JSON.parse(response);
            $('#telefono').val(usuario.telefono);
            $('#correo').val(usuario.correo);
            $('#residencia').val(usuario.residencia);
            $('#sexo').val(usuario.sexo);
            $('#adicional').val(usuario.adicional);
        })
    });

    $('#form-usuario').submit(e=>{
        if (edit == true) {
            let telefono=$('#telefono').val();
            let residencia=$('#residencia').val();
            let correo =$('#correo').val();
            let sexo=$('#sexo').val();
            let adicional=$('#adicional').val();
            funcion = 'editar_usuario';
            
            $.post('../../Controller/UsuarioController.php',{id_usuario,funcion,telefono,residencia,correo,sexo,adicional},(response)=>{
                if (response='editado') {
                    $('#editado').hide('slow');
                    $('#editado').show('2000');
                    $('#editado').hide('1000');
                    $('#form-usuario').trigger('reset');
                }
                edit == false;
                buscar_usuario(id_usuario);
            })
        } else {
            $('#noeditado').hide('slow');
            $('#noeditado').show('2000');
            $('#noeditado').hide('1000');
            $('#form-usuario').trigger('reset');
        }
        e.preventDefault();
    });

    $('#form-pass').submit(e=>{
        let oldpass=$('#oldpass').val();
        let newpass=$('#newpass').val();
        funcion = 'cambiar_contra';
        $.post('../../Controller/UsuarioController.php',{id_usuario,funcion,oldpass,newpass},(response)=>{
            if (response == 'update') {
                $('#update').hide('slow');
                $('#update').show('2000');
                $('#update').hide('1000');
                $('#form-pass').trigger('reset');
            }else{
                $('#noupdate').hide('slow');
                $('#noupdate').show('2000');
                $('#noupdate').hide('1000');
                $('#form-pass').trigger('reset');
            }
        })
        e.preventDefault();
    });

    $("#form-photo").submit(e=>{
        let formData = new FormData($("#form-photo")[0]);
        $.ajax({
            url:'../../Controller/UsuarioController.php',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false
        }).done(function(response){
            console.log(response);
            const json = JSON.parse(response);

            if (json.alert == 'edit') {
                $('#avatar4').attr('src',json.ruta);
                $('#edit').hide('slow');
                $('#edit').show('2000');
                $('#edit').hide('1000');
                $('#form-photo').trigger('reset');
                buscar_usuario(id_usuario);

            }else{
                $('#noedit').hide('slow');
                $('#noedit').show('2000');
                $('#noedit').hide('1000');
                $('#form-photo').trigger('reset');
            }
        });
        e.preventDefault();
    })
});