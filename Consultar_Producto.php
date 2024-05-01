<?php
session_start();
error_reporting(0);
$VARSESION= $_SESSION['nombre'];
if ($VARSESION==NULL||$VARSESION='') {
    echo "USTED NO TIENE AUTORIZACIÓN";
    die();
}
include_once 'Conexion_db.php';
@$Buscar = $_POST['codigo'];
@$ELECCION=$_POST['eleccion'];

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
                <div class="seleccion">
                            <select name="eleccion" id="" selected="">
                            <option name= "Entradas" value="Entradas" >Entradas</option>
                            <option name= "Salidas" value="Salidas" >Salidas</option>
                            </select>
                </div>
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
        else if($ELECCION == "Salidas"){
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
                            <th class="accion">Acción</th>
                        </tr>
                        <?php
                        
                        $Consulta = ("SELECT s.idsalida,  CONCAT_WS(' ', t.nombretra, t.apellidotra) AS 'nombre_completo', p.nombrepro, s.cantidadsal, s.fechasal, s.horasal
                                      FROM salida AS s
                                      INNER JOIN trabajador AS t
                                      ON t.idtrabajador = s.trabajador_idtrabajador
                                      INNER JOIN producto AS p
                                      ON p.idproducto = s.producto_id
                                      WHERE s.idsalida LIKE '%$Buscar%'OR t.nombretra LIKE '%$Buscar%' OR t.apellidotra LIKE '%$Buscar%'");
                        $Sentencia = $Conexion->query($Consulta);
                        while ($Datos = $Sentencia->fetch(PDO::FETCH_OBJ)){
                                
                            ?>
                        <tr>
                            <td><?php echo $Datos->idsalida;?></td>
                            <td><?php echo $Datos->nombre_completo;?></td>
                            <td><?php echo $Datos->nombrepro;?></td>
                            <td><?php echo $Datos->cantidadsal;?></td>
                            <td><?php echo $Datos->fechasal;?></td>
                            <td><?php echo $Datos->horasal;?></td>
                            <td class="accion">
                            <div class="botones">
                            <a  id="editar" href="Actualizar_Producto.php?id=<?php echo $Datos->idsalida;?>" class="table__item__link" >Editar</a>
                            <a id="editar" href="Eliminar_Producto.php?id=<?php echo $Datos->idsalida;?>" class="table__item__link" >Borrar</a>
                            </div>
                            </td>                                 
                        </tr>
                        
                            <?php
                            }
                             ?>
                    </table>
                </div>
                <div class="botones">
                    <a id="imprimir" type="submit" name="imprimir">Imprimir</a>
                    <a id="atras" name="atras" type="reset" href="Consultar_Producto.php">atras</a>
                </div>
            </section>
            
        <?php 
        return;
        }
          
        else if($ELECCION == "Entradas"){
            ?>
            <section class="form-tablas" >
                <div class="tablas">

                    <table>
                        <tr>
                        <H2 class="titulotabla">ENTRADAS DE PRODUCTO</H2>                        
                            <th>Codigo</th>
                            <th>Nombre<br>Almacenista</th>
                            <th>Producto</th>
                            <th>Cantidad<br>Entrega</th>
                            <th>Fecha <br>Entrega</th>
                            <th>Hora <br>Entrega</th>
                            <th class="accion">Acción</th>
                        </tr>
                        <?php
                        
                        $Consulta = ("SELECT e.identrada,  CONCAT_WS(' ', a.nombrealm, a.apellidoalm) AS 'nombre_completo', p.nombrepro, e.cantidadent, e.fechaent, e.horaent
                                      FROM entrada AS e
                                      INNER JOIN almacenista AS a
                                      ON a.idalmacenista = e.almacenista_idalmacenista
                                      INNER JOIN producto AS p
                                      ON p.idproducto = e.producto_id
                                      WHERE e.identrada LIKE '%$Buscar%'OR a.nombrealm LIKE '%$Buscar%' OR a.apellidoalm LIKE '%$Buscar%'");
                        $Sentencia = $Conexion->query($Consulta);
                        while ($Datos = $Sentencia->fetch(PDO::FETCH_OBJ)){
                                
                            ?>
                        <tr>
                            <td><?php echo $Datos->identrada;?></td>
                            <td><?php echo $Datos->nombre_completo;?></td>
                            <td><?php echo $Datos->nombrepro;?></td>
                            <td><?php echo $Datos->cantidadent;?></td>
                            <td><?php echo $Datos->fechaent;?></td>
                            <td><?php echo $Datos->horaent;?></td>
                            <td class="accion">
                            <div class="botones">
                            <a  id="editar" href="Actualizar_Producto_entrada.php?id=<?php echo $Datos->identrada;?>" class="table__item__link" >Editar</a>
                            <a id="editar" href="Eliminar_Producto_entrada.php?id=<?php echo $Datos->identrada;?>" class="table__item__link" >Borrar</a>
                            </div>
                            </td>                               
                        </tr>
                        
                            <?php
                            }
                             ?>
                    </table>
                </div>
                <div class="botones">
                    <a id="imprimir" type="submit" name="imprimir">Imprimir</a>
                    <a id="atras" name="atras" type="reset" href="Consultar_Producto.php">atras</a>
                </div>
            </section>
            
        <?php 
        }
          
        ?>
         <?php 
         /*
         ACA INICIA LA IMPRESION EN PANTALLA DE LA TABLA SALIDAS
         */ 
         include('baseda.php');
         
         if (isset($_POST['salidas'])) {
           
         ?>
             <section class="form-tablas" >
                <div class="tablas">

                    <table>
                        <tr>
                            <H2 class="titulotabla">SALIDAS DE PRODUCTO</H2>                        
                            <th>Codigo</th>
                            <th>Nombre quien<br>Entrega</th>
                            <th>Nombre quien<br>Recibe</th>
                            <th>Producto</th>
                            <th>Cantidad<br>Entrega</th>
                            <th>Fecha <br>Entrega</th>
                            <th>Hora <br>Entrega</th>
                            <th class="accion">Acción</th>
                        </tr>
                            <?php
                             $sql=$conection->query("SELECT s.idsalida, CONCAT_WS(' ', a.nombrealm, a.apellidoalm) AS 'nombrealm_completo', CONCAT_WS(' ', t.nombretra, t.apellidotra) AS 'nombre_completo', p.nombrepro, s.cantidadsal, s.fechasal, s.horasal
                                                     FROM salida AS s
                                                     INNER JOIN almacenista AS a
                                                     ON a.idalmacenista = s.almacenista_idalmacenista
                                                     INNER JOIN trabajador AS t
                                                     ON t.idtrabajador = s.trabajador_idtrabajador
                                                     INNER JOIN producto AS p
                                                     ON p.idproducto = s.producto_id;");
                             while ($row = $sql->fetch_array()) {
                                
                            ?>
                        <tr>
                            <td><?php echo $row['idsalida'];?></td>
                            <td><?php echo $row['nombrealm_completo'];?></td>
                            <td><?php echo $row['nombre_completo'];?></td>
                            <td><?php echo $row['nombrepro'];?></td>
                            <td><?php echo $row['cantidadsal'];?></td>
                            <td><?php echo $row['fechasal'];?></td>
                            <td><?php echo $row['horasal'];?></td>                              
                            <td class="accion">
                            <div class="botones">
                            <a  id="editar" href="Actualizar_Producto.php?id=<?php echo $row ["idsalida"];?>" class="table__item__link" >Editar</a>
                            <a id="editar" href="Eliminar_Producto.php?id=<?php echo $row ["idsalida"];?>" class="table__item__link" >Borrar</a>
                            </div>
                            </td>                       
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="botones">
                    <a id="imprimir" type="submit" name="imprimir">Imprimir</a>
                    <a id="atras" name="atras" type="reset" href="Consultar_Producto.php">atras</a>
                </div>
            </section>
            <?php 
        exit();
        } 
         /*
         ACA INICIA LA IMPRESION EN PANTALLA DE LA TABLA ENTRADAS
         */ 
         include('baseda.php');
         
         if (isset($_POST['entradas'])) {
           
         ?>
             <section class="form-tablas" >
                <div class="tablas">

                    <table>
                        <tr>
                            <H2 class="titulotabla">ENTRADAS DE PRODUCTO</H2>                        
                            <th>Codigo</th>
                            <th>Nombre<br>Almacenista</th>
                            <th>Nombre<br>Producto</th>
                            <th>Cantidad<br>Ingreso</th>
                            <th>Precio<br>Unidad</th>
                            <th>Fecha<br>Ingreso</th>
                            <th>Hora<br>Ingreso</th>
                            <th class="accion">Acción</th>
                        </tr>
                            <?php
                             $sql=$conection->query("SELECT e.identrada, concat_ws(' ', a.nombrealm, a.apellidoalm) AS 'nombre_completoalm', p.nombrepro, e.cantidadent, e.precioent, e.fechaent, e.horaent
                                                     FROM entrada AS e
                                                     INNER JOIN almacenista AS a
                                                     ON a.idalmacenista = e.almacenista_idalmacenista
                                                     INNER JOIN producto AS p
                                                     ON p.idproducto = e.producto_id;");
                             while ($row = $sql->fetch_array()) {
                                
                             ?>
                        <tr>
                            <td><?php echo $row['identrada'];?></td>
                            <td><?php echo $row['nombre_completoalm'];?></td>
                            <td><?php echo $row['nombrepro'];?></td>
                            <td><?php echo $row['cantidadent'];?></td>
                            <td><?php echo $row['precioent'];?></td>
                            <td><?php echo $row['fechaent'];?></td>
                            <td><?php echo $row['horaent'];?></td>
                            <td class="accion">
                            <div class="botones">
                            <a  id="editar" href="Actualizar_Producto_entrada.php?id=<?php echo $row ["identrada"];?>" class="table__item__link" >Editar</a>
                            <a id="editar" href="Eliminar_Producto_entrada.php?id=<?php echo $row ["identrada"];?>" class="table__item__link" >Borrar</a>
                            </div>
                            </td>                              
                        </tr>
                        <?php
                        }?>
                    </table>
                </div>
                <div class="botones">
                    <a id="imprimir" type="submit" name="imprimir">Imprimir</a>
                    <a id="atras" name="atras" type="reset" href="Consultar_Producto.php">atras</a>
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
         if (isset($_POST['BuscarTodos'])) {
         ?>
        <section class="form-tablas" >
           <div class="tablas">

               <table>
                   <tr>
                        <H2 class="titulotabla">INVENTARIO TOTAL DE PRODUCTOS</H2>  
                        <th>Codigo</th>
                        <th>Codigo Tipo</th>
                        <th>Nombre Producto</th>
                        <th>Existencias <br> Inicales</th>
                        <th>Precio</th>
                        <!--<th>Stock</th>
                        <th>Nombre Almacenista</th>-->
                   </tr>
                   <?php
                        $Consulta="SELECT p.idproducto, ti.descripcion, p.nombrepro, ex.exisinicial, p.preciopro
                        FROM producto AS p
                        INNER JOIN tipoproducto AS ti
                        ON ti.id=p.tipoproducto_id 
                        INNER JOIN existencia AS ex
                        ON p.idproducto = ex.idexistencia
                        ORDER BY p.idproducto";
                        $Sentencia = $Conexion->query($Consulta);
                        while ($Datos = $Sentencia->fetch(PDO::FETCH_OBJ)){
                        ?>
                   <tr>
                       <td><?php echo $Datos->idproducto;?></td>
                       <td><?php echo $Datos->descripcion;?></td>
                       <td><?php echo $Datos->nombrepro;?></td>
                       <td><?php echo $Datos->exisinicial;?></td>
                       <td><?php echo $Datos->preciopro;?></td>
                            
                    </tr>
                        <?php
                        }?>
                    </table>
                </div>
                <div class="botones">
                    <a id="imprimir" type="submit" name="imprimir">Imprimir</a>
                    <a id="atras" name="atras" type="reset" href="Consultar_Producto.php">atras</a>
                </div>
            </section>
            <?php 
        exit();
        } 
        ?>  
        <script src="confirmacion.js"></script>     
    </body>
</html>