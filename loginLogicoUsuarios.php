<!-- creacion de la funcion para iniciar sesion -->
<?php
require 'conexion.php'; // Incluye la conexión a la base de datos

function iniciarSesion($usuario, $clave) {
    global $conexion; // Usa la conexión global a la base de datos

    $q = "SELECT COUNT(*) as contar FROM usuarios WHERE nombre_usuarios = '$usuario' AND password_usuario = '$clave'";
    $consulta = mysqli_query($conexion, $q);
    $array = mysqli_fetch_array($consulta);

    if ($array['contar'] > 0) {
        session_start(); // Inicia la sesión
        $_SESSION['logueado'] = $usuario; // Guarda el usuario en la sesión
        echo('olaola');
        header("Location: principal.php"); // Redirige al panel principal
    } else {
        // Redirige de vuelta al inicio
        header("Location: loginUsuarios.php");
    }
}
?>

<?php
require 'conexion.php';

function logueado(){
session_start();
if(isset($_SESSION["logueado"])){}

else{  header("location: principal.php");}

}
?>
