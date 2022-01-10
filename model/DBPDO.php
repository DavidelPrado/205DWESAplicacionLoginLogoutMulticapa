<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    * Conexion con la base de datos y ejecucion de la consulta utilizando PDO
    */

    class DBPDO implements DB{
        public static function ejecutarConsulta($consulta, $parametros=null){
            try{
                //Conectar a la base de datos
                $DB = new PDO(HOST, USER, PASSWORD);
                //Configurar las excepciones
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Preparación y ejecución de la consulta con sus parámetros.
                $oResultado = $DB->prepare($consulta);
                $oResultado->execute($parametros);

                return $oResultado;
            }catch(PDOException $exception){
                echo '<p>Ha ocurrido un error</p>';
            }finally{
                unset($DB);
            }
        }
    }
?>