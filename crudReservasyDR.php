<?php
require 'conexion.php'; // Conexión a la base de datos

// Funciones para crear, ver (mostrar), actualizar y eliminar reservas.
function crearReservas($usuario, $clave, $correo, $celular, $idRol) {
    global $conexion;

    $q = "INSERT INTO usuarios (nombre_usuarios, password_usuario, email, telefono, id_roles) VALUES ('$usuario', '$clave', '$correo', 'celular', 'idRol')";
    $resultado = mysqli_query($conexion, $q);

    if ($resultado) {
        return "Usuario creado exitosamente.";
    } else {
        return "Error al crear el usuario: " . mysqli_error($conexion);
    }
}















function obtenerReservas($idUsuarios) {
    global $conexion;

    $q = "SELECT * FROM usuarios WHERE id_usuarios = '$idUsuarios'";
    $resultado = mysqli_query($conexion, $q);

    if ($resultado) {
        return mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    } else {
        return null;
    }
}

function actualizarReservas($idUsuario, $nombre_usuarios, $clave, $correo, $celular, $idRol) {
    global $conexion;

    $q = "UPDATE usuarios SET usuario = '$nuevo_usuario', password = '$nueva_clave', correo = '$nuevo_correo' WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $q);

    if ($resultado) {
        return "Usuario actualizado exitosamente.";
    } else {
        return "Error al actualizar el usuario: " . mysqli_error($conexion);
    }
}

function eliminarReservas($idUsuario) {
    global $conexion;

    $q = "DELETE FROM usuarios WHERE id_usuarios = '$idUsuario'";
    $resultado = mysqli_query($conexion, $q);

    if ($resultado) {
        return "Usuario eliminado exitosamente.";
    } else {
        return "Error al eliminar el usuario: " . mysqli_error($conexion);
    }
}
?>