<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Ventana de bienvenida al usuario autenticado
    */
?>
<div class="vInicio">
    <h1>Inicio</h1>
    <?php
        echo 'Bienvenido '.$aVInicio['descUsuario'].' es la '.$aVInicio['numConexiones'].' vez que se conecta y su última conexión fue '.$_SESSION['usuarioDAW205AppLoginLogout']->getFechaHoraUltimaConexionAnterior().'';
    ?>
    <br><br>
    <form>
        <input type='submit' name='mtoDep' value='Mantenimiento Departamentos'/>
        <input type='submit' name='detalle' value='Detalle'/>
        <input type='submit' name='error' value='Provocar error'/>
        <input type='submit' name='logout' value='Cerrar sesión'/>
    </form>
</div>