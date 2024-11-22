<!-- Instancia de la funcion loginLogicoUsuarios -->
<?php
require 'loginLogicoUsuarios.php'; // Incluye la función del login

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Obtén los datos del formulario
    $usuario = $_GET['usuario'];
    $clave = $_GET['clave'];

    // Llama a la función para procesar el inicio de sesión
    iniciarSesion($usuario, $clave);
}
?>

<!-- CRUD de usuarios -->
