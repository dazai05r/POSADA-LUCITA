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
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
          <div id="layoutSidenav_nav">
              <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                  <div class="sb-sidenav-menu">
                      <div class="nav">
                          <div class="sb-sidenav-menu-heading">Core</div>
                          <a class="nav-link" href="index.html">
                              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Dashboard
                          </a>
                      </div>
                  </div>
              </nav>
          </div>
          <div id="layoutSidenav_content">
              <div class="container-fluid p-3">
                  <div class="row">
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
              <form id="formularioEdit" action="" method="GET">
                <div class="mb-1 alert alert-success p-1 bg-info text-white">
                  <label for="nombreUsuarios" class="form-label">Nombre del Usuario:</label>
                  <input value="<?=$datos->nombre_usuarios ?>" type="text" name="nombreUsuarios" class="form-control" id="nombre">
                </div>
                <div class="mb-1 alert alert-success bg-info text-white">

                  <input type="hidden" name="idUsuarios" class="form-control" value="<?=$datos->id_usuarios ?>">

                  <label for="clave" class="form-label p-1">Clave de sesión:</label>
                  <input type="text" name="clave" class="form-control" id="clave" value="<?=$datos->password_usuario ?>">

                  <label for="claveN" class="form-label p-2">Confirmar clave de sesión:</label>
                  <input type="text" name="claveN" class="form-control" id="claveN" value="<?=$datos->password_usuario ?>">

                  <label for="correo" class="form-label">Correo electrónico:</label>
                  <input type="text" name="correo" class="form-control" id="correo" placeholder="Ingrese su correo electrónico" value="<?=$datos->email ?>">

                  <label for="telefono" class="form-label">Teléfono:</label>
                  <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingrese su teléfono" value="<?=$datos->telefono ?>">

                  <label for="rol" class="form-label">Tipo de rol:</label>
                  <select name="rol" class="form-select" aria-label="Seleccione">
                    <?php
                    $sql2 = $conexion->query("SELECT id_roles, nombre_rol FROM roles");
                    while($datos2 = $sql2->fetch_object()) { ?>
                      <option <?= $datos->id_roles == $datos2->id_roles ? "selected" : "" ?> value="<?=$datos2->id_roles ?>"><?= $datos2->nombre_rol ?></option>
                    <?php } ?>
                  </select>
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
                              <h6>Nuevo Usuario</h6>
                          </div>
                          <form method="GET" action="">
                              <div class="mb-3 alert alert-secondary p-2">
                                  <label for="nombreUsuario" class="form-label" style="font-size: 0.9rem;">Nombre:</label>
                                  <input type="text" name="nombreUsuario" class="form-control form-control-sm" id="nombreUsuario" placeholder="Usuario">
      
                                  <label for="clave" class="form-label mt-2" style="font-size: 0.9rem;">Contraseña:</label>
                                  <input type="password" name="clave" class="form-control form-control-sm" id="clave" placeholder="Clave">
      
                                  <label for="claveN" class="form-label mt-2" style="font-size: 0.9rem;">Confirmar:</label>
                                  <input type="password" name="claveN" class="form-control form-control-sm" id="claveN" placeholder="Confirmar clave">
      
                                  <label for="correo" class="form-label mt-2" style="font-size: 0.9rem;">Correo:</label>
                                  <input type="email" name="correo" class="form-control form-control-sm" id="correo" placeholder="Correo">
      
                                  <label for="telefono" class="form-label mt-2" style="font-size: 0.9rem;">Teléfono:</label>
                                  <input type="text" name="telefono" class="form-control form-control-sm" id="telefono" placeholder="Teléfono">
      
                                  <label for="rol" class="form-label mt-2" style="font-size: 0.9rem;">Rol:</label>
                                  <select name="rol" class="form-select form-select-sm" aria-label="Seleccione">
                                    <?php
                                    $sql2 = $conexion->query("SELECT id_roles, nombre_rol FROM roles");
                                    while($datos2=$sql2->fetch_object()){ ?>
                                        <option value="<?php echo $datos2->id_roles;?>"><?php echo $datos2->nombre_rol; ?></option>
                                    <?php } ?>
                                  </select>
      
                                  <div class="text-center">
                                      <button type="submit" class="btn btn-primary btn-sm mt-3" name="btnregistrar" value="ok">REGISTRAR</button>
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
