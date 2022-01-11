<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    * Controlador de la aplicación
    */

    //Constantes de la aplicación.
    include './config/configApp.php';
   
    //Se inicia o recupera la sesión
    session_start();

    //Para mostrar la ventana del login, llama al controlador del mismo.
    if(isset($_SESSION["paginaEnCurso"])){
        include $_SESSION["paginaEnCurso"];
    }else{
        include $aControladores["login"];
    }
?>