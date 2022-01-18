<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    */

    if(isset($_REQUEST['cancelar'])){
        session_destroy();
        include $aControladores['inicioPublica'];
        header('location: ./index.php');
        exit;
    }
    
    //Comprobar si se ha pulsado el boton de login
    if(isset($_REQUEST['login'])){    
        if(validacionFormularios::comprobarAlfaNumerico($_REQUEST["usuario"], 255, MIN_TAMANIO, OBLIGATORIO)==null && validacionFormularios::comprobarAlfaNumerico($_REQUEST["password"], 8, MIN_TAMANIO, 1, OBLIGATORIO)==null){
            $oUsuario = UsuarioPDO::validarUsuario($_REQUEST["usuario"], $_REQUEST["password"]);
            if($oUsuario){
                $oUsuario=UsuarioPDO::registrarUltimaConexion($oUsuario);
                $_SESSION['usuarioDAW205AppLoginLogout'] = $oUsuario;
                
                $_SESSION['paginaEnCurso'] = $aControladores['inicio'];
                header('location: ./index.php');
                exit;
            }
        }
    }

    $vistaEnCurso='login';
    include $aVistas['layout'];
?>