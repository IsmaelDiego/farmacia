<?php
session_start();
if ($_SESSION['us_tipo'] == 1||$_SESSION['us_tipo'] == 2 ||$_SESSION['us_tipo'] == 3) {

?>
  <?php include_once "../layouts/header.php" ?>

  <title>Admin | Catalogo</title>

  <?php include_once "../layouts/nav.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Datos Personales</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-success card-outline">
              <div class="card-body box-profile">
                <div class="text-center m-1">
                  <img class="profile-user-img img-fluid img-circle" id="avatar2" src="../../img/html.jpeg" alt="User profile picture">
                  <div class="text-center my-1">
                    <button type="button" data-toggle="modal" data-target="#cambiar-avatar" class="btn btn-primary btn-sm">Cambiar Avatar</button>

                   
                  </div>
                </div>
                <input type="hidden" id="id_usuario" value="<?php echo $_SESSION['usuario'] ?>">
                <h3 id="nombre_us" class="profile-username text-center">Nombre</h3>

                <p id="apellido_us" class="text-muted text-center">Apellidos</p>

                <ul class="list-group list-group-unbordered mb-3">

                <li class="list-group-item">
                    <b>DNI:</b> <a class="float-right" id="dni_us">75692933</a>
                  </li>

                  <li class="list-group-item">
                    <b>Edad:</b> <a class="float-right" id="edad_us">75692933</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tipo de Usuario:</b> <a class="float-right">
                      <div class="text-center">
                        <span class="right" id="us_tipo">Admin</span>
                      </div>
                    </a>
                  </li>
                  <button type="button" data-toggle="modal" data-target="#cambiar-pass" class="btn btn-block btn-outline-warning btn-sm"> Cambiar Contraseña</button>

                  <div class="modal fade" id="cambiar-pass">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Cambiar Paaword</h4>
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
                            <div class="alert alert-success text-center" id="update" style="display: none;">
                              <span><i class="fas fa-check"> Se cambio la contraseña</i></span>
                            </div>
                            <div class="alert alert-danger text-center" id="noupdate" style="display: none;">
                              <span><i class="fas fa-times"> La contraseña no es correcta</i></span>
                            </div>
                            <form action="" id="form-pass" >
                              <div class="input-group mb-3 mt-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                </div>
                                <input type="password" id="oldpass" class="form-control" placeholder="Ingrese contraseña actual">
                              </div>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="text" id="newpass" class="form-control" placeholder="Ingrese contraseña nueva">
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


                  <div class="modal fade" id="cambiar-avatar">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Cambiar Avatar</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="text-center">
                            <img id="avatar4" class="profile-user-img img-fluid img-circle" src="../../img/html.jpeg" alt="Avatar">
                            <div class="text-center">
                              <b>
                                <?php
                                echo $_SESSION['nombre_us'];
                                ?>
                              </b>
                            </div>
                            <div class="alert alert-success text-center" id="edit" style="display: none;">
                              <span><i class="fas fa-check"> Se cambio el Avatar</i></span>
                            </div>
                            <div class="alert alert-danger text-center" id="noedit" style="display: none;">
                              <span><i class="fas fa-times"> Formato no soportado</i></span>
                            </div>
                            <form  id="form-photo" enctype="multipart/form-data">
                              <div class="input-group mb-3 mt-2">
                                <input type="file" name="photo" class="input-group">
                                <input type="hidden" name="funcion" value="Cambiar_foto">
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
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Sobre Mi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-phone mr-1"></i> Telefono</strong>
                <p class="text-muted" id="telefono_us">
                  99999999
                </p>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Residencia</strong>
                <p class="text-muted" id="residencia_us">Malibu, California</p>
                <hr>
                <strong><i class="fas fa-at mr-1"></i> Correo</strong>
                <p class="text-muted" id="correo_us">
                  99999999
                </p>
                <hr>
                <strong><i class="fa fa-venus-mars nav-icon mr-1"></i> Sexo</strong>
                <p class="text-muted" id="sexo_us">
                  99999999
                </p>
                <hr>
                <strong><i class="fa fa-pencil-alt nav-icon mr-1"></i> Informacion adicional</strong>
                <p class="text-muted" id="adicional_us">
                  99999999
                </p>
                <hr>
                <button class="edit btn btn-block btn-danger">Editar</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-success">
              <div class="card-header p-2">
                <h3 class="card-title">Editar Datos Personales</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="alert alert-success text-center" id="editado" style="display: none;">
                  <span><i class="fas fa-check">Editado</i></span>
                </div>
                <div class="alert alert-danger text-center" id="noeditado" style="display: none;">
                  <span><i class="fas fa-times">No Editado</i></span>
                </div>
                <form action="" class="form-horizontal" id="form-usuario">
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Telefono</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Residencia</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="residencia">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Correo</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="correo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Sexo</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="sexo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Informacion adicional</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="adicional" cols="30" rows="5"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10 float-right">
                      <button class="btn btn-block btn-outline-success">Guardar</button>
                    </div>
                  </div>
                </form>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              <div class="card-footer text-center">
                <p class="text-muted">Cuidado con ingresar datos erroneos</p>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
  include_once "../layouts/footer.php";
} else {
  header("Location: ../../plantilla/index.php");
}
?>
<script src="../../js/Usuario.js"></script>