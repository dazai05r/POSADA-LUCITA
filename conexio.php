<?php
$host = "localhost";
$usuario = "root";
$clave = "12345678";
$bd = "posada";


$conexion = mysqli_connect($host,$usuario,$clave,$bd);
if($conexion){

//echo "conectado correctamente";
}else{

    echo "nose pudo conectar";
}
?>