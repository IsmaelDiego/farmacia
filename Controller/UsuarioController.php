<?php
include_once '../Model/Usuario.php';
$usuario = new Usuario();
session_start();
$id_usuario = $_SESSION['usuario'];

if ($_POST['funcion']=='buscar_usuario') {
    $json=array();
    $fechaActual = new DateTime();
    $usuario->Obtener_datos($_POST['dato']);
    //con el foreach buscara todas las conicidencias 
    foreach($usuario->objetos as $objeto){
        //dentro del json se almacenaran en un array los datos encontrados del usuario segun su id_usuario
        $nacimineto =new DateTime($objeto->edad_us);
        $edad = $nacimineto->diff($fechaActual);
        $edad_years  = $edad->y;
        $json[]=array(
            
            'nombre'=>$objeto->nombre_us,
            'apellidos'=>$objeto->apellido_us,
            'dni'=>$objeto->dni_us,
            'edad'=>$edad_years,
            'tipo'=>$objeto->nombre_tipo,
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us,
            'avatar'=>'../../img/'.$objeto->avatar_us
        );
    }
    //convertir los datos obtenidos del json a string
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

if ($_POST['funcion']=='capturar_datos') {
    $json=array();
    $id_usuario=$_POST['id_usuario'];
    $usuario->Obtener_datos($id_usuario);
    foreach($usuario->objetos as $objeto){
        $json[]=array(
            
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

if ($_POST['funcion']=='editar_usuario') {
    $id_usuario=$_POST['id_usuario'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $residencia= $_POST['residencia'];
    $sexo = $_POST['sexo'];
    $adicional = $_POST['adicional'];
    $usuario->Editar($id_usuario,$telefono,$correo,$residencia,$sexo,$adicional);
    echo 'editado';    
}

if ($_POST['funcion']=='cambiar_contra') {
    $id_usuario=$_POST['id_usuario'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $usuario->Cambiar_contra($id_usuario,$oldpass,$newpass);
}

if ($_POST['funcion']=='Cambiar_foto') {
    if (($_FILES['photo']['type'] == 'image/jpeg')|| ($_FILES['photo']['type'] == 'image/png')||($_FILES['photo']['type'] == 'image/gif')) {
    $nombre= uniqid().'-'.$_FILES['photo']['name'];
    $ruta  = './../img/'.$nombre;
    $ruta1  = '../../img/'.$nombre;
    move_uploaded_file($_FILES['photo']['tmp_name'],$ruta);
    $usuario->Cambiar_foto($id_usuario,$nombre);
    foreach ($usuario->objetos as $objeto){
        unlink('./../img/'.$objeto->avatar_us);
    }
    $json = array();
    $json[]=array(
        'ruta' =>$ruta1,
        'alert' =>'edit'
    );
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
    }else{
        $json = array();
        $json[]=array(
            'alert' =>'noedit'
        );
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
} 

if ($_POST['funcion']=='buscar_usuarios_adm') {
    $json=array();
    $fechaActual = new DateTime();
    $usuario->Buscar();
    foreach($usuario->objetos as $objeto){
        $nacimiento =new DateTime($objeto->edad_us);
        $edad = $nacimiento->diff($fechaActual);
        $edad_years  = $edad->y;
        $json[]=array(
            'id'=>$objeto->id_usuario,
            'nombre'=>$objeto->nombre_us,
            'apellidos'=>$objeto->apellido_us,
            'dni'=>$objeto->dni_us,
            'edad'=>$edad_years,
            'tipo'=>$objeto->nombre_tipo,
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us,
            'avatar'=>'../../img/'.$objeto->avatar_us,
            'tipo_usuario'=>$objeto->us_tipo
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion']=='crear_usuario') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $dni = $_POST['dni'];
    $pass = $_POST['pass'];
    $tipo = 2;
    $avatar = 'default.png';
    $usuario->Crear($nombre,$apellido,$edad,$dni,$pass,$tipo,$avatar);
}

if ($_POST['funcion']=='ascender') {
    $pass = $_POST['pass'];
    $id_ascendido = $_POST['id_usuario'];
    $usuario->Ascender($pass,$id_ascendido,$id_usuario);
}

if ($_POST['funcion']=='descender') {
    $pass = $_POST['pass'];
    $id_descendido = $_POST['id_usuario'];
    $usuario->Descender($pass,$id_descendido,$id_usuario);
}

if ($_POST['funcion']=='borrar_usuario') {
    $pass = $_POST['pass'];
    $id_borrado = $_POST['id_usuario'];
    $usuario->Borrar($pass,$id_borrado,$id_usuario);
}
?>