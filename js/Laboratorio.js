$(document).ready(function(){
    buscar_lab();

    $('#form-crear-laboratorio').submit(e=>{
        let nombre_laboratorio = $('#nombre_laboratorio').val();
        funcion  = 'crear';
        $.post('../../Controller/LaboratorioController.php',{nombre_laboratorio,funcion},(response)=>{
            if (response == 'add-laboratorio') {
                $('#add-laboratorio').hide('slow');
                $('#add-laboratorio').show('2000');
                $('#add-laboratorio').hide('1000');
                $('#form-crear-laboratorio').trigger('reset');
                buscar_lab();

            } else {
                $('#noadd-laboratorio').hide('slow');
                $('#noadd-laboratorio').show('2000');
                $('#noadd-laboratorio').hide('1000');
                $('#form-crear-laboratorio').trigger('reset');
            }
        })
        e.preventDefault();

    });
    function buscar_lab(consulta){
        funcion = 'buscar';
        $.post('../../Controller/LaboratorioController.php',{consulta,funcion},(response)=> {
            const laboratorio = JSON.parse(response);
            let template =``;

            laboratorio.forEach(laboratorio => {
                template+=`${laboratorio.nombre}`;
            });
            $('#laboratorio').html(response);
        })
    }

    $(document).on('keyup','#buscar_laboratorio',function(){
        let valor = $(this).val();
        if (valor != '') {
            buscar_lab(valor);
        } else {
            buscar_lab();
        }
    });
});