<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    * 
    */

    if(!isset($_SESSION['usuarioDAW204AppLoginLogout'])){
        include $aControladores['login'];
        exit;
    }

    if(isset($_REQUEST['logout'])){
        session_unset();
        session_destroy();
        
        include $aControladores['login'];
    }

    if(isset($_REQUEST['login'])){
        $sSelect = <<<QUERY
            SELECT T01_DescUsuario, T01_NumConexiones, T01_ImagenUsuario FROM T01_Usuario
            WHERE T01_CodUsuario='{$_SESSION['usuarioDAW204AppLoginLogout']}';
        QUERY;
        $oResultado = DBPDO::ejecutarConsulta($sSelect)->fetchObject();

        $iNumConexiones = $oResultado->T01_NumConexiones; 
    }

    $vistaEnCurso = 'inicio';
    include $aVistas['layout'];
?>