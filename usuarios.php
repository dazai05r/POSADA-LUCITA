<?php
// Incluir el archivo de conexión
include 'conexion.php';
include 'CRUDS/crudUsuarios.php';
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
                      <div class="col-lg-7">
                          <div class="alert alert-dark text-center p-1">
                              <h5>Usuarios Registrados</h5>
                          </div>
                          <table class="table table-sm table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">USUARIOS</th>
      <th scope="col">Tipo de rol</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = $conexion->query("SELECT u.*, r.nombre_rol FROM usuarios u INNER JOIN roles r ON u.id_roles = r.id_roles");
    while($datos = $sql->fetch_object()) { ?>
      <tr>
        <td><?php echo $datos->id_usuarios; ?></td>
        <td><?php echo $datos->nombre_usuarios; ?></td>
        <td><?php echo $datos->nombre_rol; ?></td>
        <td>
          <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $datos->id_usuarios ?>" class="btn btn-small btn-success m-1">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <a href="usuarios.php?ide=<?= $datos->id_usuarios ?>" onclick="return confirmar()" class="btn btn-small btn-danger">
            <i class="fa-solid fa-trash"></i>
          </a>
        </td>
      </tr>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal<?= $datos->id_usuarios ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header class=modal-dialog d-flex justify-content-center">
              <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR</h1>
            </div>
            <div class="modal-body">
            <div class="mb-1 alert alert-secondary p-1">
              <form id="formularioEdit" action="" method="GET">
                
                  <label for="nombreUsuarios" class="form-label">Nombre del Usuario:</label>
                  <input value="<?=$datos->nombre_usuarios ?>" type="text" name="nombreUsuarios" class="form-control" id="nombre">
                  <input type="hidden" name="idUsuarios" class="form-control" value="<?=$datos->id_usuarios ?>">
                </div>
                <div class="mb-1 alert alert-secondary p-1">
                  <label for="clave" class="form-label p-1">Clave de sesión:</label>
                  <input type="text" name="clave" class="form-control" id="clave" value="<?=$datos->password_usuario ?>">
                </div>
                <div class="mb-1 alert alert-secondary p-1">
                  <label for="claveN" class="form-label p-2">Confirmar clave de sesión:</label>
                  <input type="text" name="claveN" class="form-control" id="claveN" value="<?=$datos->password_usuario ?>">
                </div>
                <div class="mb-1 alert alert-secondary p-1">
                  <label for="correo" class="form-label">Correo electrónico:</label>
                  <input type="text" name="correo" class="form-control" id="correo" placeholder="Ingrese su correo electrónico" value="<?=$datos->email ?>">
                </div>
                <div class="mb-1 alert alert-secondary p-1">
                  <label for="telefono" class="form-label">Teléfono:</label>
                  <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingrese su teléfono" value="<?=$datos->telefono ?>">
                </div>
                <div class="mb-1   alert alert-secondary p-1">
                  <label for="rol" class="form-label">Tipo de rol:</label>
                  <select name="rol" class="form-select" aria-label="Seleccione">
                    <?php
                    $sql2 = $conexion->query("SELECT id_roles, nombre_rol FROM roles");
                    while($datos2 = $sql2->fetch_object()) { ?>
                      <option <?= $datos->id_roles == $datos2->id_roles ? "selected" : "" ?> value="<?=$datos2->id_roles ?>"><?= $datos2->nombre_rol ?></option>
                    <?php } ?>
                  </select>
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
                      <div class="col-lg-5">
                          <div class="alert alert-dark text-center p-1">
                              <h6>Nuevo Usuario</h6>
                          </div>
                          <form method="GET" action="">
                              <div class="mb-2 p-1">
                                <div class="mb-2 alert alert-secondary p-1">
                                  <label for="nombreUsuario" class="form-label" style="font-size: 0.9rem;">Nombre:</label>
                                  <input type="text" name="nombreUsuario" class="form-control form-control-sm" id="nombreUsuario" placeholder="Usuario">
                                </div>
                                <div class="mb-2 alert alert-secondary p-1">
                                  <label for="clave" class="form-label mt-2" style="font-size: 0.9rem;">Contraseña:</label>
                                  <input type="password" name="clave" class="form-control form-control-sm" id="clave" placeholder="Clave">
                                </div>
                                <div class="mb-2 alert alert-secondary p-1">
                                  <label for="claveN" class="form-label mt-2" style="font-size: 0.9rem;">Confirmar:</label>
                                  <input type="password" name="claveN" class="form-control form-control-sm" id="claveN" placeholder="Confirmar clave">
                                </div>
                                <div class="mb-2 alert alert-secondary p-1">
                                  <label for="correo" class="form-label mt-2" style="font-size: 0.9rem;">Correo:</label>
                                  <input type="email" name="correo" class="form-control form-control-sm" id="correo" placeholder="Correo">
                                </div>
                                <div class="mb-2 alert alert-secondary p-1">
                                  <label for="telefono" class="form-label mt-2" style="font-size: 0.9rem;">Teléfono:</label>
                                  <input type="text" name="telefono" class="form-control form-control-sm" id="telefono" placeholder="Teléfono">
                                </div>
                                <div class="mb-2 alert alert-secondary p-1">
                                  <label for="rol" class="form-label mt-2" style="font-size: 0.9rem;">Rol:</label>
                                  <select name="rol" class="form-select form-select-sm" aria-label="Seleccione">
                                    <?php
                                    $sql2 = $conexion->query("SELECT id_roles, nombre_rol FROM roles");
                                    while($datos2=$sql2->fetch_object()){ ?>
                                        <option value="<?php echo $datos2->id_roles;?>"><?php echo $datos2->nombre_rol; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
      
                                <div class="text-center"> 
                                  <button type="submit" class="btn btn-primary btn-sm mt-1 w-100" name="btnregistrar" value="ok">REGISTRAR</button>
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
    </body>
</html>
