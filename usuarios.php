<?php
// Incluir el archivo de conexión
include 'conexion.php';
include 'crudUsuarios.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Responsive Sidebar</title>
  <link rel="stylesheet" href="css/menu.css">
 
  
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
  <div class="search-container">
    <input type="text" id="search-input" placeholder="Buscar en la tabla...">
    <button class="search-button">
      <i class="fas fa-search"></i> <!-- Icono de búsqueda de Font Awesome -->
    </button>
  </div>
  <main class="container-fluid row">
  <!-- Sección de registro de usuario -->
  <section class="col-4 p-2">
    <div class="alert alert-dark text-center"><h3>Nuevo usuario</h3></div>
    <form method="GET" action="">
      <div class="mb-3 alert alert-warning">
        <label for="nombre" class="form-label">Nombre de usuario:</label>
        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre de usuario">

        <label for="clave" class="form-label p-2">Contraseña:</label>
        <input type="password" name="clave" class="form-control" id="clave" placeholder="Ingrese la clave para el usuario">

        <label for="claveN" class="form-label p-2">Confirme su contraseña:</label>
        <input type="password" name="claveN" class="form-control" id="claveN" placeholder="Confirme la clave">

        <label for="correo" class="form-label">Correo electronico:</label>
        <input type="email" name="correo" class="form-control" id="correo" placeholder="Ingrese su correo electronico">

        <label for="telefono" class="form-label">Telefono:</label>
        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingrese su telefono">
        
        <label for="rol" class="form-label p-2">Tipo de rol:</label>
        <select name="rol" class="form-select" aria-label="Seleccione">
          <option selected>Seleccione</option>
          <?php
          $sql2 = $conexion->query("SELECT id_roles, nombre_rol FROM roles");
          while($datos2=$sql2->fetch_object()){ ?>
            <option value="<?php echo $datos2->id_roles;?>"><?php echo $datos2->nombre_rol; ?></option>
          <?php } ?>
        </select>

        <div class="d-md-flex justify-content-md-end">
          <button type="submit" class="btn btn-primary text-center m-3" name="btnregistrar" value="ok">REGISTRAR</button>
        </div>
      </div>
    </form>
  </section>

  <!-- Sección de usuarios registrados -->
  <section class="col-8 p-4">
    <div class="alert alert-dark text-center p-1"><h2>Usuarios Registrados</h2></div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">USUARIOS</th>
          <th scope="col">Tipo de rol</th>
          <th scope=""></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $sql = $conexion->query("SELECT u.*, r.nombre_rol FROM usuarios u INNER JOIN roles r ON u.id_roles = r.id_roles");
        while($datos=$sql->fetch_object()){ ?>
          <tr>
            <td><?php echo $datos->id_usuarios; ?></td>
            <td><?php echo $datos->nombre_usuarios; ?></td>
            <td><?php echo $datos->nombre_rol; ?></td>
            <td>
              <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $datos->id_usuarios ?>" class="btn btn-small btn-success m-1"><i class="fa-solid fa-pen-to-square"></i></a>
              <a href="usuarios.php?ide=<?= $datos->id_usuarios ?>" onclick="return confirmar()" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
            </td>
          </tr>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal<?= $datos->id_usuarios ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="formularioEdit" action="" method="GET">
                    <div class="mb-3 alert alert-success p-3">
                      <label for="nombre" class="form-label">Nombre del Usuario:</label>
                      <input value="<?=$datos->nombre_usuarios ?>" type="text" name="nombre" class="form-control" id="nombre">
                    </div>
                    <div class="mb-3 alert alert-success">
                      <input type="hidden" name="idUsuarios" class="form-control" value="<?=$datos->id_usuarios ?>">

                      <label for="clave" class="form-label p-2">Clave de sesión:</label>
                      <input type="text" name="clave" class="form-control" id="clave" value="<?=$datos->password_usuario ?>">

                      <label for="claveN" class="form-label p-2">Confirmar clave de sesión:</label>
                      <input type="text" name="claveN" class="form-control" id="claveN" value="<?=$datos->password_usuario ?>">

                      <label for="correo" class="form-label">Correo electronico:</label>
                      <input type="text" name="correo" class="form-control" id="correo" placeholder="Ingrese su correo electronico" value="<?=$datos->email ?>">

                      <label for="telefono" class="form-label">Telefono:</label>
                      <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingrese su telefono" value="<?=$datos->telefono ?>">

                      <select name="rol" class="form-select" aria-label="Seleccione">
                        <?php
                        $sql2 = $conexion->query("select id_roles, nombre_rol from roles");
                        while($datos2=$sql2->fetch_object()){ ?>
                          <option <?= $datos->roles == $datos2->id_roles ? "selected" : ""?> value="<?=$datos2->id_roles ?>"><?= $datos2->nombre_rol ?></option>
                        <?php } ?>
                      </select>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button name="btnModificar" value="ok" type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </tbody>
    </table>
  </section>
</main>

    
<header class="header" id="header">
  
        <nav class="nav container">
        <a href="#" class="nav__logo">USUARIOS</a>
            <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
            <li class="nav__item">
    <a href="#" class="nav__link" id="reservaciones-link">
        <i class="bx bx-calendar"></i> <!-- Icono para Reservaciones -->
        <span class="link_name">Reservaciones</span>
    </a>
</li>

<li class="nav__item">
    <a href="#" class="nav__link" id="registros-link">
        <i class="bx bx-file"></i> <!-- Icono para Registros -->
        <span class="link_name">Registros</span>
    </a>
</li>

<li class="nav__item">
    <a href="#" class="nav__link" id="usuarios-link">
        <i class="bx bx-user"></i> <!-- Icono para Usuarios -->
        <span class="link_name">Usuarios</span>
    </a>
</li>

              <!-- Close button -->
              <div class="nav__close" id="nav-close">
                  <i class="ri-close-line"></i>
              </div>
  <div class="sidebar">
    <div class="logo_details">
      <i class="bx bxl-audible icon"></i>
      <div class="logo_name">OPCIONES</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="#">
          <i class="bx bx-user"></i> <!-- Icono de usuario para CLIENTES -->
          <span class="link_name">CLIENTES</span>
        </a>
      </li>
      
      <li>
        <a href="#">
          <i class="bx bx-clipboard"></i> <!-- Icono para REPORTES -->
          <span class="link_name">REPORTES</span>
          
        </a>
      </li>
      <!-- Más elementos del menú -->
      <li class="profile">
        <div class="profile_details">
          <img src="IMAGEN/images (3).png" alt="profile image">
          <div class="profile_content">
            <div class="name"><?php echo "_".$_SESSION["logueado"]; ?></div>
            <div class="designation">Admin</div>
          </div>
        </div>
        <!-- Boton de cerrar sesion -->
        <button class="log_out" id="log_out">
          <i class="bx bx-log-out"></i>
        </button>
      </li>
    </ul>
  </div>
<footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</footer>
  
  <script src="JS/script.js"></script>
</body>

</html>
