<?php 
session_start();
error_reporting(0);
$VARSESION= $_SESSION['nombre'];
if ($VARSESION==NULL||$VARSESION='') {
    echo "USTED NO TIENE AUTORIZACIÓN";
    die();
}
include('baseda.php');
$almacenistaid=$_SESSION['nombre'];
$sql="SELECT * FROM almacenista WHERE idalmacenista LIKE '%$almacenistaid%'";
$resultado= mysqli_query($conection, $sql);
$row=mysqli_num_rows($resultado);
$row= $resultado->fetch_array();
$_row['nombrealm']=$row['nombrealm'];

date_default_timezone_set('America/Bogota');
$HORA_ACTUAL=date("H:i");
$HORA_DIA=date("00:00");
$HORA_TARDE=date("12:00");
$HORA_NOCHE=date("18:00");
if ($HORA_ACTUAL > $HORA_DIA && $HORA_ACTUAL < $HORA_TARDE) {
    $saludo="Buenos días";
} else if($HORA_ACTUAL > $HORA_TARDE && $HORA_ACTUAL < $HORA_NOCHE) {
    $saludo="Buenas tardes";
}else {
    $saludo="Buenas noches";
}
$_SALUDAR['saludo']=$saludo;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2? family=Lato:ital,wght@0,100;1,100;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="Estilos/menu.css">
    <title>Menu Formulario</title>
</head>

<body>
    <header class="general">
        <!--ESTE ES EL TITULO DE LA PÁGINA-->
        <div class="titulo">
            <h1>Bellavista Coal S.A.S</h1>
            <h5>Extraccion de hulla (Carbón de piedra), Cúcuta</h5>
        </div>
        <!--ESTE ES EL PERFIL DE LA PÁGINA-->
        <div class="perfil-principal">
            <h4 class="saludo">
                <?php
                echo $_SALUDAR['saludo']?>
            </h4>
            <ul class="perfil">
                <li>  
                        <h3 class="saludo"><?php echo $_row['nombrealm']?></h3>
                    
                    <ul class="subperfil">
                        <li><a href="#">Ver Perfil</a></li>
                        <li><a href="cambiar_password.php">Cambiar contraseña</a></li>
                        <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <!--ESTE ES EL MENÚ O NAVEGACIÓN DE LA PÁGINA-->
    <nav class="navegacion">
        <ul class="menu">
            <li><a href="#">Producto</a>
                <ul class="submenu">
                    <li><a href="Registro Producto.html">Registro de Entrada</a></li>
                    <li><a href="Salida Producto.html">Registro de Salida</a></li>
                </ul>
            </li>
            <li><a href="#">Proveedor</a>
                <ul class="submenu">
                    <li><a href="Registro Proveedor.html">Registrar Proveedor</a></li>
                </ul>
            </li>
            <li><a href="#">Consultar</a>
                <ul class="submenu">
                    <li><a href="Consultar_Proveedor.php">Consultar Proveedor</a></li>
                    <li><a href="Consultar_Producto.php">Consultar Producto</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</body>

</html>