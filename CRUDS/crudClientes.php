<?php
require 'conexion.php'; // Conexión a la base de datos

if(isset($_GET['btnregistrar'])){
    if(!empty($_GET['nombreCliente']) and !empty($_GET['primerApellido']) and !empty($_GET['segundoApellido']) and !empty($_GET['clave']) and !empty($_GET['claveN']) and !empty($_GET['correo']) and !empty($_GET['telefono'])){
        $cliente = $_GET['nombreCliente'];
        $primerApellido = $_GET['primerApellido'];
        $segundoApellido = $_GET['segundoApellido'];
        $clave = $_GET['clave'];
        $claveNueva = $_GET['claveN'];
        $correo = $_GET['correo'];
        $telefono = $_GET['telefono'];
        
        if( $claveNueva == $clave){
            $sql = $conexion->query("INSERT INTO cliente(nombre_cliente, primer_apellido, segundo_apellido, password_clientes, email, telefono) VALUES ('$cliente', '$primerApellido', '$segundoApellido', '$clave', '$correo', '$telefono')");
            if($sql == 1){ 

            } else {

            }
                        
        }else{

        }

    }
    else {
    
    }
?>

<script> window.history.replaceState(null,null,window.location.pathname); </script>

<?php
}

?>


<!-- Actualizar clientes -->
<?php

if(isset($_GET["editar"])){
    $ID = $_GET['idCliente'];
    $cliente = $_GET['nombreCliente'];
    $primerApellido = $_GET['primerApellido'];
    $segundoApellido = $_GET['segundoApellido'];
    $clave = $_GET['clave'];
    $correo = $_GET['correo'];
    $telefono = $_GET['telefono'];

$modificar = $conexion->query("UPDATE cliente SET nombre_cliente = '$cliente', primer_apellido = '$primerApellido', segundo_apellido = '$segundoApellido', password_clientes = '$clave', email = '$correo', telefono = '$telefono' WHERE id_cliente = '$ID'");

if($modificar == true){
    
} else{
    
}

?>

<script> window.history.replaceState(null,null,window.location.pathname); </script>

<?php
}
?>

<!-- Eliminar clientes -->
<?php

if(isset($_GET["ide"])){
    $ID =$_GET["ide"];

    $eliminar = $conexion->query("DELETE FROM cliente WHERE id_cliente = '$ID'");
    if($eliminar == true){
        
    }else{
        
}

?>

<script> window.history.replaceState(null,null,window.location.pathname); </script>

<?php
}
?>