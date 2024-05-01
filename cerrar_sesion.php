<?php 
session_start();
error_reporting(0);
$VARSESION= $_SESSION['nombre'];
if ($VARSESION==NULL||$VARSESION='') {
    echo "USTED NO TIENE AUTORIZACIÓN";
    die();
}
session_destroy();
header("location:index.php");
?>