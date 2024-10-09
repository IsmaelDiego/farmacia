<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2 || $_SESSION['us_tipo'] == 3) {

?>
    <?php include_once "../layouts/header.php" ?>

    <title>Admin | Catalogo</title>

    <?php include_once "../layouts/nav.php" ?>

    <div class="modal fade " id="crear-laboratorio">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Crear Laboratorio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success text-center" id="add-laboratorio" style="display: none;">
                        <span><i class="fas fa-check"> Se agrego nuevo laboratorio</i></span>
                    </div>
                    <div class="alert alert-danger text-center" id="noadd-laboratorio" style="display: none;">
                        <span><i class="fas fa-times"> EL laboratorio ya existe </i></span>
                    </div>
                    <form id="form-crear-laboratorio">
                        <div class="form-group">
                            <label for="nombre_laboratorio">Nombres</label>
                            <input id="nombre_laboratorio" type="text" class="form-control" placeholder="Ingrese nombre" required>
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

    <div class="modal fade " id="crear-tipo">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Crear Tipo</h4>
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
                    <form id="form-crear-tipo">
                        <div class="form-group">
                            <label for="nombre_tipo">Nombres</label>
                            <input id="nombre_tipo" type="text" class="form-control" placeholder="Ingrese nombre" required>
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

    <div class="modal fade " id="crear-presentacion">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Crear Presentacion</h4>
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
                    <form id="form-crear-presentacion">
                        <div class="form-group">
                            <label for="nombre_presentacion">Nombres</label>
                            <input id="nombre_presentacion" type="text" class="form-control" placeholder="Ingrese nombre" required>
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
                        <h1>Gestion Atributos</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gestion Atributos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- ./row -->
                <div class="row">
                    <div class="col-12">
                        <h4>Nav Tabs inside Card Header <small>card-tabs / card-outline-tabs</small></h4>
                    </div>
                </div>
                <!-- ./row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tab">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#laboratorio">Laboratorio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#tipo">Tipo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="custom-tabs-five-normal-tab" data-toggle="pill" href="#presentacion">Presentacion</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content " id="custom-tabs-five-tabContent">
                                    <div class="tab-pane fade active show" id="laboratorio" role="tabpanel" aria-labelledby="">
                                        <div class="overlay-wrapper">

                                            <div class="container-fluid">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title m-2">Buscar Laboratorio <button id="button-crear" type="button" data-toggle="modal" data-target="#crear-laboratorio" class="btn bg-primary btn-sm m-2">Crear Laboratorio</button></h3>
                                                        <div class="input-group">
                                                            <input id="buscar_laboratorio" placeholder="Ingrese el nombre del usuario" type="text" class="form-control float-left">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-default">
                                                                    <i class="fas fa-search"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Laboratorio</th>
                        <th>avatar</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody class="table-active" id="laboratorio">
                      <tr>
                        <td>Trident</td>
                        <td>Internet Explorer 4.0</td>
                        <td>Win 95+</td>
                        <td>4</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet Explorer 5.0</td>
                        <td>Win 95+</td>
                        <td>5</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet Explorer 5.5</td>
                        <td>Win 95+</td>
                        <td>5.5</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet Explorer 6</td>
                        <td>Win 98+</td>
                        <td>6</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet Explorer 7</td>
                        <td>Win XP SP2+</td>
                        <td>7</td>
                      </tr>
                      
                    </tbody>
                    <tfoot>
                      <tr>
                      <th>#</th>
                        <th>Laboratorio</th>
                        <th>avatar</th>
                        <th>Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
                                                    </div>
                                                    <div class="card-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tipo" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                                        <div class="overlay-wrapper">

                                            <div class="container-fluid">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title m-2">Buscar Tipo <button id="button-crear" type="button" data-toggle="modal" data-target="#crear-tipo" class="btn bg-primary btn-sm m-2">Crear Tipo</button></h3>
                                                        <div class="input-group">
                                                            <input id="buscar_tipo" placeholder="Ingrese el nombre del usuario" type="text" class="form-control float-left">
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
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="presentacion" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab">
                                        <div class="container-fluid">
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h3 class="card-title m-2">Buscar Presentacion <button id="button-crear" type="button" data-toggle="modal" data-target="#crear-presentacion" class="btn bg-primary btn-sm m-2">Crear Presentacion</button></h3>
                                                    <div class="input-group">
                                                        <input id="buscar_presentacion" placeholder="Ingrese el nombre del usuario" type="text" class="form-control float-left">
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
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php
    include_once "../layouts/footer.php";
} else {
    header("Location: ../../index.php");
}
?>
<script src="../../js/Laboratorio.js"></script>