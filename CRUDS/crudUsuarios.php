<?php 
include 'conexion.php';


if(isset($_GET['btnregistrar'])){
    if(!empty($_GET['nombreUsuario']) and !empty($_GET['correo']) and !empty($_GET['telefono']) and !empty($_GET['clave']) and !empty($_GET['claveN']) and !empty($_GET['rol']) ){
        $usuario = $_GET['nombreUsuario'];
        $correo = $_GET['correo'];
        $telefono = $_GET['telefono'];
        $clave = $_GET['clave'];
        $claveNueva = $_GET['claveN'];
        $idRol = (int)$_GET['rol'];
        
        if( $claveNueva == $clave){
        $sql = $conexion->query("INSERT INTO usuarios(nombre_usuarios, password_usuario, email, telefono, id_roles) VALUES ('$usuario','$clave', '$correo', '$telefono', '$idRol')");
        
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


<!-- ACTUALIZAR USUARIOS -->
<?php

if(isset($_GET["editar"])){
    $ID = $_GET['idUsuarios'];
    $usuario = $_GET['nombreUsuarios'];
    $clave = $_GET['clave'];
    $claveN = $_GET['claveN'];
    $correo = $_GET['email'];
    $telefono = $_GET['telefono'];
    $idRol = (int)$_GET['rol'];

$modificar = $conexion->query("UPDATE usuarios SET nombre_usuarios = '$usuario', password_usuario = '$clave', email = '$correo', telefono = '$telefono', id_roles = '$idRol' WHERE id_usuarios = '$ID'");


if($modificar == true){

} else{

}
?>


<script>
    window.history.replaceState(null,null,window.location.pathname);
</script>

<?php
}
?>


<script> 
    // Evita reenvíos al refrescar la página
    window.history.replaceState(null, null, window.location.pathname); 
</script>


<!-- Eliminar usuarios -->
<?php

if(isset($_GET["ide"])){
    $ID =$_GET["ide"];

    $eliminar = $conexion->query("DELETE FROM usuarios WHERE id_usuarios = '$ID'");
    if($eliminar == true){
        
    }else{
        
}

?>

<script> window.history.replaceState(null,null,window.location.pathname); </script>

<?php
}
?>