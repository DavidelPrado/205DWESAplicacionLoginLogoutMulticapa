<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    */
    
    //Comprobar si se ha pulsado el boton de login
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>