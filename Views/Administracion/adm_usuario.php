<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2 || $_SESSION['us_tipo'] == 3) {

?>
  <?php include_once "../layouts/header.php" ?>

  <title>Admin | Catalogo</title>

  <?php include_once "../layouts/nav.php" ?>

<div class="modal fade" id="confirmar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmar Accion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="avatar3" class="profile-user-img img-fluid img-circle" src="../../img/html.jpeg" alt="Avatar">
          <div class="text-center">
            <b>
              <?php
              echo $_SESSION['nombre_us'];
              ?>
            </b>
          </div>
          <span>Necesitamos su password para continuar</span>
          <div class="alert alert-success text-center" id="confirmado" style="display: none;">
            <span><i class="fas fa-check"> Se modifico al usuario</i></span>
          </div>
          <div class="alert alert-danger text-center" id="rechazado" style="display: none;">
            <span><i class="fas fa-times"> La contraseña no es correcta</i></span>
          </div>
          <form action="" id="form-confirmar" >
            <div class="input-group mb-3 mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
              </div>
              <input type="password" id="oldpass" class="form-control" placeholder="Ingrese contraseña actual">
              <input type="hidden" id="id_user" class="form-control">
              <input type="hidden" id="funcion" class="form-control">
            </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>GESTION USUARIOS
              <button id="button-crear" type="button" data-toggle="modal" data-target="#crear-usuario" class="btn bg-primary ml-2">Crear Usuario</button>
            </h1>
            <input type="hidden" id="tipo_usuario" value="<?php echo $_SESSION['us_tipo'] ?>">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gestion Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <div class="modal fade " id="crear-usuario">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Agregar Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="alert alert-success text-center" id="add" style="display: none;">
                <span><i class="fas fa-check"> Se agrego nuevo usuario</i></span>
              </div>
              <div class="alert alert-danger text-center" id="noadd" style="display: none;">
                <span><i class="fas fa-times"> EL dni ya existe en otro usuario </i></span>
              </div>
              <form id="form-crear">
                <div class="form-group">
                  <label for="nombre">Nombres</label>
                  <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required>
                </div>
                <div class="form-group">
                  <label for="apellido">Apellidos</label>
                  <input id="apellido" type="text" class="form-control" placeholder="Ingrese apellido" required>
                </div>
                <div class="form-group">
                  <label for="edad">Nacimiento</label>
                  <input id="edad" type="date" class="form-control" placeholder="Ingrese nacimiento" required>
                </div>
                <div class="form-group">
                  <label for="dni">DNI</label>
                  <input id="dni" type="text" class="form-control" placeholder="Ingrese DNI" required>
                </div>
                <div class="form-group">
                  <label for="pass">Password</label>
                  <input id="pass" type="password" class="form-control" placeholder="Ingrese contraseña" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </section>
    
    <div class="container-fluid">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Buscar Usuarios</h3>
          <div class="input-group">
            <input id="buscar" placeholder="Ingrese el nombre del usuario" type="text" class="form-control float-left">
            <div class="input-group-append">
              <button class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="usuarios" class="row">

          </div>
        </div>
        <div class="card-footer">

        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">



          </div>
        </div>
      </div>
    </section>
  </div>
<?php
  include_once "../layouts/footer.php";
} else {
  header("Location: ../../plantilla/index.php");
}
?>
<script src="../../js/GestionUsuario.js"></script>