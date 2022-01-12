<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    */
?>
<div class="vInicio">
    <h1>Inicio</h1>
    <?php
        echo 'Bienvenido '.$aVInicio['descUsuario'].' es la '.$aVInicio['numConexiones'].' vez que se conecta y su ultima conexion fue '.$_SESSION['FechaHoraUltimaConexionAnterior'].'';
    ?>
    <br><br>
    <form>
        <input type='submit' name='mtoDep' value='Mantenimiento Departamentos'/>
        <input type='submit' name='detalle' value='Detalle'/>
        <input type='submit' name='logout' value='Cerrar sesión'/>
    </form>
</div>