<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 12/01/2022
    * 
    */

    if(isset($_REQUEST['iniciar'])){
        $_SESSION['paginaEnCurso'] = $aControladores['login'];
        header('location: ./index.php');
        exit;
    }
    
    $vistaEnCurso='inicioPublica';
    include $aVistas['layout'];
?>