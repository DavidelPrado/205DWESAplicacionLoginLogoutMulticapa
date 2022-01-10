<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    * 
    */

    interface UsuarioDB{
        public static function validarUsuario($codUsuario, $password);
    }
?>