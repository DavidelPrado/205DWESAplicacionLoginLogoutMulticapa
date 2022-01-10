<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    */

    //Comprobar si se ha pulsado el boton de login
    if(isset($_REQUEST['login'])){    
        if(validacionFormularios::comprobarAlfaNumerico($_REQUEST["usuario"], 255, MIN_TAMANIO, OBLIGATORIO)==null && validacionFormularios::comprobarAlfaNumerico($_REQUEST["contraseña"], 8, MIN_TAMANIO, 1, OBLIGATORIO)==null) {
            $oUsuario = UsuarioPDO::validarUsuario($_REQUEST["usuario"], $_REQUEST["password"]);
            if($oUsuario){
                session_start();
                $_SESSION['usuarioDAW205AppLoginLogout'] = $_REQUEST["usuario"];
                $_SESSION['FechaHoraUltimaConexionAnterior'] = $oUsuario->T01_FechaHoraUltimaConexion;
                
                include $aControladores['inicio'];
            }
        }
    }

    $vistaEnCurso='login';
    include $aVistas['layout'];
?>