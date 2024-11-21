<?php
$host = "localhost";
$usuario = "root";
$clave = "12345678";
$bd = "posada";


$conexion = mysqli_connect($host,$usuario,$clave,$bd);
if($conexion){

}else{

    echo "No se conecto, verifique credenciales.";
}
?>