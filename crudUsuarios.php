<?php
require 'conexion.php'; // Conexión a la base de datos


// Funciones para crear, ver (mostrar), actualizar y eliminar usuarios.
function crearUsuario($idUsuarios, $nombreUsuarios, $clave, $correo, $celular, $idRol) {
    global $conexion;

    $q = "INSERT INTO usuarios (id_usuarios, nombre_usuarios, password_usuario, email, telefono, id_roles) VALUES ('$idUsuarios', '$nombreUsuarios', '$clave', '$correo', 'celular', 'idRol')";
    $resultado = mysqli_query($conexion, $q);

    if ($resultado) {
        return "Usuario creado exitosamente.";
    } else {
        return "Error al crear el usuario: " . mysqli_error($conexion);
    }
}

function obtenerUsuario($idUsuarios) {
    global $conexion;

    $q = "SELECT * FROM usuarios WHERE id_usuarios = '$idUsuarios'";
    $resultado = mysqli_query($conexion, $q);

    if ($resultado) {
        return mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    } else {
        return null;
    }
}

function actualizarUsuario($idUsuario, $nombreUsuarios, $clave, $correo, $celular, $idRol) {
    global $conexion;

    $q = "UPDATE usuarios SET nombre_usuarios = '$nombreUsuarios', password_usuario = '$clave', email = '$correo', telefono = '$celular', id_roles = 'idRol' WHERE id_usuarios = '$idUsuario'";
    $resultado = mysqli_query($conexion, $q);

    if ($resultado) {
        return "Usuario actualizado exitosamente.";
    } else {
        return "Error al actualizar el usuario: " . mysqli_error($conexion);
    }
}

function eliminarUsuario($idUsuario) {
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
