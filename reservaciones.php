<?php
// Incluir el archivo de conexión
include 'conexion.php';
include 'CRUDS/crudReservaciones.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sidenav Light - SB Admin</title>
        <link href="css/menu.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
    <?php
  include("navar.php");
  ?>
                  
                    <!-- Tabla de Usuarios -->
                    <div class="col-lg-8">
                        <div class="alert alert-dark text-center p-1">
                            <h5>Usuarios Registrados</h5>
                        </div>
                        <table class="table table-sm table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre del cliente</th>
      <th scope="col">Tipo de habitacion</th>
      <th scope="col">Cantidad disponible</th>
      <th scope="col">Cantidad reservada</th>
      <th scope="col">Fecha de reservacion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = $conexion->query("SELECT dh.id_detalle_habitaciones AS idDH, c.nombre_cliente AS nC, th.nombre_tipo AS nT, ch.cantidad_disponible AS cD, r.cantidad_reservadas AS cR, dh.fecha AS f FROM detalle_habitaciones dh INNER JOIN reservas r ON dh.id_reservas = r.id_reservas INNER JOIN cliente c ON r.id_cliente = c.id_cliente INNER JOIN tipo_habitaciones th ON dh.id_tipo_habitaciones = th.id_tipo_habitaciones INNER JOIN cantidad_habitaciones ch ON dh.id_cantidad_habitaciones = ch.id_cantidad_habitaciones");
    while($datos = $sql->fetch_object()) { ?>
      <tr>
        <td><?php echo $datos->idDH; ?></td>
        <td><?php echo $datos->nC; ?></td>
        <td><?php echo $datos->nT; ?></td>
        <td><?php echo $datos->cD; ?></td>
        <td><?php echo $datos->cR; ?></td>
        <td><?php echo $datos->f; ?></td>
        <td>
          <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $datos->idDH ?>" class="btn btn-small btn-success m-1">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <a href="usuarios.php?ide=<?= $datos->idDH ?>" onclick="return confirmar()" class="btn btn-small btn-danger">
            <i class="fa-solid fa-trash"></i>
          </a>
        </td>
      </tr>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal<?= $datos->idDH ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header class=modal-dialog d-flex justify-content-center">
              <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR</h1>
            </div>
            <div class="modal-body">
              <form id="formularioEdit" action="" method="GET">
              <div class="mb-1 alert alert-secondary p-1">
                    <label for="nombreCliente" class="form-label p-1">Cliente de reservacion:</label>
                    <select name="nombreCliente" class="form-select" aria-label="Seleccione">
                        <?php
                        $sql2 = $conexion->query("SELECT id_roles, nombre_rol FROM roles");
                        while($datos2 = $sql2->fetch_object()) { ?>
                            <option <?= $datos->id_roles == $datos2->id_roles ? "selected" : "" ?> value="<?=$datos2->id_roles ?>"><?= $datos2->nombre_rol ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-1 alert alert-secondary p-1">
                    <input type="hidden" name="idUsuarios" class="form-control" value="<?=$datos->idDH ?>">

                <label for="tipoHabitacion" class="form-label p-1">Tipo de habitacion:</label>
                    <select name="tipoHabitacion" class="form-select" aria-label="Seleccione">
                        <?php
                        $sql2 = $conexion->query("SELECT dh.id_detalle_habitaciones AS idDH, th.nombre_tipo AS nT FROM detalle_habitaciones dh INNER JOIN reservas r ON dh.id_reservas = r.id_reservas INNER JOIN cliente c ON r.id_cliente = c.id_cliente INNER JOIN tipo_habitaciones th ON dh.id_tipo_habitaciones = th.id_tipo_habitaciones INNER JOIN cantidad_habitaciones ch ON dh.id_cantidad_habitaciones = ch.id_cantidad_habitaciones");
                        while($datos2 = $sql2->fetch_object()) { ?>
                            <option <?= $datos->idDH == $datos2->idDhH ? "selected" : "" ?> value="<?=$datos2->idDH ?>"><?= $datos2->nT ?></option>
                        <?php } ?>
                    </select>
                </div>

                  <div class="mb-1 alert alert-secondary p-1">

                  <label for="cantidadDisponible" class="form-label">Cantidad disponible:</label>
                  <input type="text" name="cantidadDisponible" class="form-control" id="cD" value="<?=$datos->cD ?>">
                  </div>

                  <div class="mb-1 alert alert-secondary p-1">
                  <label for="cantidadReservar" class="form-label">Total a reservar:</label>
                  <input type="text" name="cantidadReservar" class="form-control" id="cD" value="<?=$datos->cR ?>">
                  </div>
                  <div class="mb-1 alert alert-secondary p-1">
                  <label for="fecha" class="form-label">Fecha de reservacion:</label>
                  <input type="text" name="fecha" class="form-control" id="fecha" value="<?=$datos->f ?>">
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button name="editar" value="ok" type="submit" class="btn btn-success">Guardar Cambios</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </tbody>
</table>
                    </div>
    
                    <!-- Formulario Nuevo Usuario -->
                    <div class="col-lg-4">
                        <div class="alert alert-dark text-center p-2">
                            <h6>Nuevo Reservacion</h6>
                        </div>
                        <form method="GET" action="">

                        <div class="mb-2 alert alert-secondary p-1">
                            <label for="clienteReservacion" class="form-label mt-2" style="font-size: 0.9rem;">Cliente de reservacion:</label>
                                <select name="clienteReservacion" class="form-select form-select-sm" aria-label="Seleccione">
                                    <option selected>Seleccione</option>
                                        <?php
                                        $sql2 = $conexion->query("SELECT id_cliente, nombre_cliente FROM cliente");
                                        while($datos2=$sql2->fetch_object()){ ?>
                                            <option value="<?php echo $datos2->id_cliente;?>"><?php echo $datos2->nombre_cliente; ?></option>
                                        <?php } ?>
                                </select>
                                </div>
                            <div class="mb-3 alert alert-secondary p-2">
    
                                <label for="tipoHabitacion" class="form-label mt-2" style="font-size: 0.9rem;">Tipo de habitacion:</label>
                                <select name="tipoHabitacion" class="form-select form-select-sm" aria-label="Seleccione">
                                    <option selected>Seleccione</option>
                                        <?php
                                            $sql2 = $conexion->query("SELECT id_tipo_habitaciones, nombre_tipo FROM tipo_habitaciones");
                                            while($datos2=$sql2->fetch_object()){ ?>
                                                <option value="<?php echo $datos2->id_tipo_habitaciones;?>"><?php echo $datos2->nombre_tipo; ?></option>
                                        <?php } ?>
                                </select>
                                </div>

                                <div class="mb-3 alert alert-secondary p-2">
                                    <label for="fecha" class="form-label" style="font-size: 0.9rem;">Fecha De Reservacion:</label>
                                    <input type="date" name="fecha" class="form-control form-control-sm" id="fecha">
                                </div>

                                <div class="mb-1 alert alert-secondary p-1">

                                <label for="cantidadReservar" class="form-label" style="font-size: 0.9rem;">Cantidad a reservar:</label>
                                <input type="text" name="cantidadReservar" class="form-control form-control-sm" id="nombre" placeholder="">
                                </div>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary btn-sm mt-3 w-100" name="btnregistrar" value="ok">REGISTRAR</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
      <footer>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="js/scripts.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="assets/demo/chart-area-demo.js"></script>
      <script src="assets/demo/chart-bar-demo.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
      <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>