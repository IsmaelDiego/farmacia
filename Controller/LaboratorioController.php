<?php
include_once '../Model/Laboratorio.php';
$laboratorio = new Laboratorio();

if ($_POST['funcion'] == 'crear') {
    $nombre = $_POST['nombre_laboratorio'];
    $avatar = 'lab-default.png';
    $laboratorio->Crear($nombre,$avatar);
}

if ($_POST['funcion'] == 'buscar') {
    $laboratorio->Buscar();
    $json=array();
    foreach($laboratorio->objetos as $objeto){
        $json[]=array(
            'id'=>$objeto->id_laboratorio,
            'nombre'=>$objeto->nombre,
            'avatar'=>'../../img/'.$objeto->avatar_lab
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}