<?php
include_once 'Conexion_db.php';
@$Buscar = $_POST['codigo'];

?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="./Estilos/consultar_proveedor.css">

        <title> Consulta de producto </title>

    </head>
    <body>

        <form action="Consultar_Producto.php" method="POST" class="form-register">
            <h4>Consultar Producto</h4>
            <div class="buscador">
                <input class="busqueda" type="text" name="codigo" id="codigo" placeholder="Buscar por Codigo o Nombre:">
                <button class="registrar" type="submit" name="Buscar" value="buscar">Buscar</button>
            </div>
            <div class="botones">
                <button class="registrar" type="submit" name="entradas" value="entradas">Entradas</button>
                <button class="registrar" type="submit" name="salidas" value="salidas">Salidas</button>
                <button class="registrar" type="submit" name="BuscarTodos" value="buscartodos">Buscar Todos</button>
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
                        <H2 class="titulotabla">SALIDAS DE PRODUCTO</H2>                        
                            <th>Codigo</th>
                            <th>Nombre<br>Trabajador</th>
                            <th>Producto</th>
                            <th>Cantidad<br>Entrega</th>
                            <th>Fecha <br>Entrega</th>
                            <th>Hora <br>Entrega</th>
                        </tr>
                        <?php
                        
                            $Consulta = ("SELECT s.idsalida,  CONCAT_WS(' ', t.nombretra, t.apellidotra) AS 'nombre_completo', p.nombrepro, s.cantidadsal, s.fechasal, s.horasal
                                      INNER JOIN trabajador AS t
                                      ON t.idtrabajador = s.trabajador_idtrabajador
                                      INNER JOIN producto AS p
                                      ON p.idproducto = s.producto_id
                                      WHERE nombrepro LIKE '%$Buscar%'");
                            $Sentencia = $Conexion->query($Consulta);
                            while ($Datos = $Sentencia->fetch(PDO::FETCH_OBJ)){
                                
                        ?>
                        <tr>
                            <td><?php echo $Datos['idsalida'];?></td>
                            <td><?php echo $Datos['nombre_completo'];?></td>
                            <td><?php echo $Datos['nombrepro'];?></td>
                            <td><?php echo $Datos['cantidadsal'];?></td>
                            <td><?php echo $Datos['fechasal'];?></td>
                            <td><?php echo $Datos['horasal'];?></td>                               
                        </tr>
                        
                        <?php
                            }
                        ?>
                    </table>
                </div>
                <div class="botones">
                    <a id="imprimir" type="submit" name="imprimir">Imprimir</a>
                    <a id="atras" name="atras" type="submit" href="history.back()">atras</a>
                </div>
            </section>
            
        <?php 
        exit();
        }
          
        ?>        

        <?php 
         /*
         ACA INICIA LA IMPRESION EN PANTALLA DE LA TABLA SALIDAS
         */ 
         include('baseda.php');
         $ID=$_GET['id'];
        
         $sql="SELECT * FROM entrada WHERE identrada='$ID'";
           
         ?>
             <section class="form-tablas" >
             <form action="Actualizar_Producto_Registro_entrada.php" method="POST">
                <div class="tablas">
                    <table>
                        <tr>
                            <H2 class="titulotabla">ENTRADAS DE PRODUCTO</H2>                        
                            <th>Codigo</th>
                            <th>Codigo<br>Almacenista</th>
                            <th>Codigo<br>Producto</th>
                            <th>Cantidad<br>Ingreso</th>
                            <th>Fecha<br>Ingreso</th>
                            <th>Hora<br>Ingreso</th>
                        </tr>
                            <?php
                            $resultado=mysqli_query($conection,$sql);
                            while ($row =mysqli_fetch_assoc($resultado)) {
                                
                            ?>
                        <tr>
                            <input class="tabla2" type="hidden" value="<?php echo $row['identrada'];?>" name="entrada">
                            <td><?php echo $row['identrada'];?></td>
                            <td><input class="tabla2" type="text" value="<?php echo $row['almacenista_idalmacenista'];?>" name="almacenista"></td>
                            <td><input class="tabla2" type="text" value="<?php echo $row['producto_id'];?>"name="producto"></td>
                            <td><input class="tabla2" type="text" value="<?php echo $row['cantidadent'];?>"name="cantidad"></td>
                            <td><?php echo $row['fechaent'];?></td>
                            <td><?php echo $row['horaent'];?></td>                                                   
                        </tr>
                    
                        <?php
                        } mysqli_free_result($resultado);
                        ?>
                    </table>
                </div>
                <div class="buscador">
                    <input class="registrar" type="submit" value="Aceptar">
                    <a class="registrar" name="atras" type="submit" href="javascript:history.back()"
                    >atras</a>
                </div>
                </form>
            </section>
            <?php 
        exit(); 
        ?>  
            
    </body>
</html>