<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    */

    if(!isset($_SESSION['usuarioDAW205AppLoginLogout'])){
        header('location: ./index.php');
        exit;
    }

    if(isset($_REQUEST['logout'])){
        session_destroy();
        include $aControladores['login'];
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['detalle'])){
        $_SESSION['paginaEnCurso'] = $aControladores['detalle'];
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['mtoDep'])){
        $_SESSION['paginaAnterior'] = $aControladores['inicio'];
        $_SESSION['paginaEnCurso'] = $aControladores['WIP'];
        header('location: ./index.php');
        exit;
    }

    $select = <<<QUERY
        SELECT T01_DescUsuario, T01_NumConexiones FROM T01_Usuario
        WHERE T01_CodUsuario='{$_SESSION['usuarioDAW205AppLoginLogout']}';
    QUERY;
    $oResultado = DBPDO::ejecutarConsulta($select)->fetchObject();

    $descUsuario = $oResultado->T01_DescUsuario;
    $numConexiones = $oResultado->T01_NumConexiones; 
    
    $vistaEnCurso='inicio';
    include $aVistas['layout'];
?>