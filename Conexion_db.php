<?php
$servidor_db ="localhost";
$puerto_de_mysql ="3306";
$usuario = "root";
$password = "";
$nombre_db ="bellavista2";

$Conexion ="";

try{
    $Conexion = new PDO("mysql:host=$servidor_db;dbname=$nombre_db",$usuario,$password);

    echo "conexion correcta";
}
catch(Exception $e){
    echo"ocurrio un error en la conexion";
}
?>