<?php 
include_once 'Conexion.php';
class Laboratorio
{
    var $objetos;
    var $acceso;

    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function Crear($nombre,$avatar)
    {
        $sql = "SELECT id_laboratorio FROM laboratorio WHERE nombre = :nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos = $query->fetchall();
        if (!empty($this->objetos)) {
            echo 'noadd-laboratorio';
        }else{
            $sql = "INSERT INTO laboratorio(nombre,avatar_lab) VALUES (:nombre,:avatar)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':avatar'=>$avatar));
            echo 'add-laboratorio';
        }
    }

    function Buscar()
    {
        if (!empty($_POST['consulta'])) {
            $consulta = $_POST['consulta'];
            $sql = "SELECT * FROM laboratorio  WHERE nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        } else {
            $sql = "SELECT * FROM laboratorio  WHERE nombre NOT LIKE '' ORDER BY id_laboratorio LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
        
    }
}
?>