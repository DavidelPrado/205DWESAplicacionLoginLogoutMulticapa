<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    */

    if(!isset($_SESSION['usuarioDAW205AppLoginLogout'])){
        $_SESSION['paginaEnCurso'] = $aControladores['login'];
        header('location: ./index.php');
        exit;
    }

    if(isset($_REQUEST['logout'])){
        session_unset();
        session_destroy();

        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['detalle'])){
        $_SESSION['paginaAnterior'] = 'inicio';
        $_SESSION['paginaEnCurso'] = 'detalle';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['mtoDep'])){
        $_SESSION['paginaAnterior'] = 'inicio';
        $_SESSION['paginaEnCurso'] = 'WIP';
        header('location: ./index.php');
        exit;
    }

    
    $select = <<<QUERY
        SELECT T01_DescUsuario, T01_NumConexiones FROM T01_Usuario
        WHERE T01_CodUsuario='{$_SESSION['usuarioDAW205AppLoginLogout']->getCodUsuario()}';
    QUERY;
    $oResultado = DBPDO::ejecutarConsulta($select)->fetchObject();

    $aVInicio = [
        'descUsuario' => $oResultado->T01_DescUsuario,
        'numConexiones' => $oResultado->T01_NumConexiones 
    ];
    
    include $aVistas['layout'];
?>