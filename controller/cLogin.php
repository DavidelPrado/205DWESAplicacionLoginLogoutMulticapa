<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Controlador de la vista de login
    */

    if(isset($_REQUEST['cancelar'])){
        session_destroy();
        include $aControladores['inicioPublica'];
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['login'])){  
        //Validar si el nombre del usuario y la contraseña  se han introducido correctamente
        if(validacionFormularios::comprobarAlfaNumerico($_REQUEST["usuario"], 255, MIN_TAMANIO, OBLIGATORIO)==null && validacionFormularios::comprobarAlfaNumerico($_REQUEST["password"], 8, MIN_TAMANIO, 1, OBLIGATORIO)==null){
            //Si los datos son correctos se comprueba que el usuario existe en la base de datos 
            $oUsuario = UsuarioPDO::validarUsuario($_REQUEST["usuario"], $_REQUEST["password"]);
            if($oUsuario){
                //Se registra la conexión del usuario en la base de datos
                $oUsuario=UsuarioPDO::registrarUltimaConexion($oUsuario);
                $_SESSION['usuarioDAW205AppLoginLogout'] = $oUsuario;
                
                $_SESSION['paginaEnCurso'] = 'inicio';
                header('location: ./index.php');
                exit;
            }
        }
    }

    include $aVistas['layout'];
?>