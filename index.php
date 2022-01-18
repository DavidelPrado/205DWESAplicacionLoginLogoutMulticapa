<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Controlador de la aplicación
    */

    //Constantes de la aplicación.
    include './config/configApp.php';
   
    //Se inicia o recupera la sesión
    session_start();

    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = 'inicioPublica';
    }
    include $aControladores[$_SESSION['paginaEnCurso']];
?>