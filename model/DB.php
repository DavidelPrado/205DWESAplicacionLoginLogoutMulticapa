<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    * Conexion con la base de datos y ejecucion de una consulta
    */

    interface DB{
        public static function ejecutarConsulta($consulta, $parametros=null);
    }
?>