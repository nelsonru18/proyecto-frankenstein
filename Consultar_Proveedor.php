
<?php
include_once 'Conexion_db.php';
@$Buscar = $_POST['codigoprov'];

?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="./Estilos/consultar_proveedor.css">

        <title> Consulta de proveedor </title>

    </head>
    <body>

        <form action="Consultar_Proveedor.php" method="POST" class="form-register">
            <h4>Consultar Proveedor</h4>
            <input class="controls" type="text" name="codigoprov" id="codigo" placeholder="Buscar por Codigo o Nombre:">
            <div class="botones">
                <button id="registrar" type="submit" name="Buscar" value="buscar">Buscar</button>
                <button id="Todos" type="submit" name="BuscarTodos" value="buscartodos">Buscar Todos</button>
                <a id="menu" name="menu" href="Menu inicio de sesion.php">Menu Principal</a>
            </div>
        </form>

        <?php if($Buscar == null){ 
            echo "";
        }
        else {
            ?>
            <section class="form-tablas" >
                <div class="tablas">

                    <table>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombres</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                        </tr>
                        <?php
                             $Consulta = "SELECT * FROM proveedor WHERE idproveedor LIKE '%$Buscar%' OR nombre LIKE '%$Buscar%' ";
                             $Sentencia = $Conexion->query($Consulta);
                             while ($Datos = $Sentencia->fetch(PDO::FETCH_OBJ)){
                             ?>
                        <tr>
                            <td><?php echo $Datos->idproveedor;?></td>
                            <td><?php echo $Datos->nombre;?></td>
                            <td><?php echo $Datos->direccion;?></td>
                            <td><?php echo $Datos->telefono;?></td>
                        </tr>
                        <?php
                        } 
                        ?>
                    </table>
                </div>
                <div class="botones">
                    <a id="imprimir" type="submit" name="imprimir">Imprimir</a>
                    <a id="atras" name="atras" type="reset" href="Consultar_Proveedor.php">atras</a>
                </div>
            </section>
            
        <?php 
        exit();
        }
            
        ?>
         <?php 
         include('baseda.php');
         
         if (isset($_POST['BuscarTodos'])) {
           
         ?>
             <section class="form-tablas" >
                <div class="tablas">

                    <table>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombres</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                        </tr>
                        <?php
                             $Consulta = "SELECT * FROM proveedor";
                             $Sentencia = $Conexion->query($Consulta);
                             while ($Datos = $Sentencia->fetch(PDO::FETCH_OBJ)){
                             ?>
                        <tr>
                            <td><?php echo $Datos->idproveedor;?></td>
                            <td><?php echo $Datos->nombre;?></td>
                            <td><?php echo $Datos->direccion;?></td>
                            <td><?php echo $Datos->telefono;?></td>
                        </tr>
                        <?php
                        } 
                        ?>
                    </table>
                </div>
                <div class="botones">
                    <a id="imprimir" type="submit" name="imprimir">Imprimir</a>
                    <a id="atras" name="atras" type="reset" href="Consultar_Proveedor.php">atras</a>
                </div>
            </section>
            <?php 
        exit();
        } 
        ?>       
    </body>
</html>
