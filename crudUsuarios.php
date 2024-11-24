<?php
require 'conexion.php'; // Conexión a la base de datos

if(isset($_GET['btnregistrar'])){
    if(!empty($_GET['nombre']) and !empty($_GET['correo']) and !empty($_GET['telefono']) and !empty($_GET['clave']) and !empty($_GET['claveN']) and !empty($_GET['rol']) ){
        $usuario = $_GET['nombre'];
        $correo = $_GET['correo'];
        $telefono = $_GET['telefono'];
        $clave = $_GET['clave'];
        $claveNueva = $_GET['claveN'];
        $idRol = (int)$_GET['rol'];
        
        if( $claveNueva == $clave){
        $sql = $conexion->query("INSERT INTO usuarios(nombre_usuarios, password_usuario, email, telefono, id_roles) VALUES ('$usuario','$clave', '$correo', '$telefono', '$idRol')");
        
            if($sql == 1){ 
                echo "<div class='mb-3 alert alert-info p-3 text-center ' >Usuario registrado correctamente !!</div>";} 
            else{
                echo "<div class='mb-3 alert alert-warning p-3 text-center'> Usuario no registrado, Verifique su Informacion !!</div>";
            }
                        
        }else{
            echo "<div class='mb-3 alert alert-warning p-3 text-center'> La clave no coincide con la confirmacion de la misma, Verifique su Informacion !!</div>";
        }

    }
    else {
    echo "<div class='mb-3 alert alert-danger p-3 text-center'> Alguno Campos vacios, verifique porfavor !!</div>";
    }
?>

<script> window.history.replaceState(null,null,window.location.pathname); </script>

<?php
}

?>


<!-- ACTUALIZAR USUARIOS -->
<?php

if(isset($_GET["btnModificar"])){
    $ID = $_GET['idUsuarios'];
    $usuario = $_GET['nombre'];
    $correo = $_GET['correo'];
    $telefono = $_GET['telefono'];
    $clave = $_GET['clave'];
    $claveNueva = $_GET['claveN'];
    $idRol = (int)$_GET['rol'];

$modificar = $conexion->query("UPDATE usuarios SET nombre_usuarios = '$usuario', password_usuario = '$clave', email = '$correo', telefono = '$telefono', id_roles ='$idRol' WHERE id_usuarios = '$ID'");


if($modificar == true){
    echo "<div class='alert alert-info text-center'>Los datos del usuario se modificaron exitosamente!!</div>";
} else{
    echo "<div class='alert alert-danger'>Error al modificar</div>";
}

?>

<script> window.history.replaceState(null,null,window.location.pathname); </script>

<?php
}
?>

<!-- Eliminar usuarios -->
<?php

if(isset($_GET["ide"])){
    $ID =$_GET["ide"];

    $eliminar = $conexion->query("DELETE FROM usuarios WHERE id_usuarios = '$ID'");
    if($eliminar == true){
        echo "<div class='alert alert-danger text-center'>El Registro fue eliminado correctamente!!</div>";
    }else{
        echo "<div class='alert alert-warning text-center'>ocurrio un error!!</div>";
}

?>

<script> window.history.replaceState(null,null,window.location.pathname); </script>

<?php
}
?>