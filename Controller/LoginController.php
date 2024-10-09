<?php
include_once '../Model/Usuario.php';

session_start();
$user  = $_POST['user'];
$pass  = $_POST['pass'];
$usuario = new Usuario();

if (!empty($_SESSION['us_tipo'])) {

    switch ($_SESSION['us_tipo']) {
        case 1: //administrador
            header("Location: ../Views/Administracion/adm_catalogo.php");
            break;
        case 2:
            header("Location: ../Views/Tecnico/tec_catalogo.php");
            break;
        case 3:
            header("Location: ../Views/Administracion/adm_catalogo.php");
            break;
    }
} else {
    $usuario->Loguearse($user, $pass);

    foreach ($usuario->objetos as $objetos) {
        print_r($objetos);
    }
    if (!empty($usuario->objetos)) {
        foreach ($usuario->objetos as $objetos) {
            $_SESSION['usuario'] = $objetos->id_usuario;
            $_SESSION['us_tipo'] = $objetos->us_tipo;
            $_SESSION['nombre_us'] = $objetos->nombre_us;
        }
        switch ($_SESSION['us_tipo']) {
            case 1: //administrador
                header("Location: ../Views/Administracion/adm_catalogo.php");
                break;
            case 2:
                header("Location: ../Views/Tecnico/tec_catalogo.php");
            case 3:
                header("Location: ../Views/Administracion/adm_catalogo.php");
                break;
        }
    } else {
        header("Location: ../index.php");
    }
}
