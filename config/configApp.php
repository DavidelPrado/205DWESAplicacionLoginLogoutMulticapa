<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    * Controlador de la aplicación
    */

    include 'core/210322ValidacionFormularios.php';

    //Definir constantes
    define("OBLIGATORIO", 1);
    define("OPCIONAL", 0);
    define("MIN_TAMANIO", 0);

    //Conexion con la base de datos.
    include 'config/confDB.php';

    //Array de los controladores
    $aControladores = [
        'login' => 'controller/cLogin.php',
        'inicio' => 'controller/cInicio.php'
    ];

    //Array de las vistas
    $aVistas = [
        'layout' => 'view/Layout.php',
        'login' => 'view/vLogin.php',
        'inicio' => 'view/vInicio.php'
    ];
?>