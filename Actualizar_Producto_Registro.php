<?php 
include('baseda.php');
$ID=$_POST['salida'];
$NOMBRETRA=$_POST['trabajador'];
$NOMBREPRO=$_POST['producto'];
$CANTIDADSAL=$_POST['cantidad'];


$registrar= "UPDATE `salida` SET `trabajador_idtrabajador`='$NOMBRETRA',`producto_id`='$NOMBREPRO',`cantidadsal`='$CANTIDADSAL' WHERE `idsalida`='$ID'";
$resultado= mysqli_query($conection, $registrar);


if(!$resultado){
    echo'
        <script>
        alert("ERROR AL ACTUALIZAR");
        window.location="../LOGIN-REGISTER/Actualizar_Producto.php";
        </script>';
}else{
    echo'
        <script>
        alert("PRODUCTO ACTUALIZADO CORRECTAMENTE");
        window.location="javascript:history.back()";
        </script>';
        
    
}
mysqli_close($conection);

?>