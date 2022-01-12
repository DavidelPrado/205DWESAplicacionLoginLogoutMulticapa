<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 12/01/2022
    */
    
    //Comprobar si se ha pulsado el boton de volver
    if(isset($_REQUEST['volver'])){  
        $_SESSION['paginaEnCurso'] = $aControladores['inicio'];
        header('location: ./index.php');
        exit;
    }

    $vistaEnCurso='detalle';
    include $aVistas['layout'];
?>