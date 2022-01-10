<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    */

    class UsuarioPDO implements UsuarioDB{
        public static function validarUsuario($codUsuario, $password){
            $consulta = <<<PDO
                SELECT T01_FechaHoraUltimaConexion FROM T01_Usuario
                WHERE T01_CodUsuario='{$codUsuario}' AND
                T01_Password=SHA2("{$codUsuario}{$password}", 256);
            PDO;
            
            $oResultado = DBPDO::ejecutarConsulta($sSelect);
            $oUsuario = $oResultado->fetchObject();

            if(!$oUsuario){
                return false;
            }else{
                $consulta = <<<PDO
                    UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1,
                    T01_FechaHoraUltimaConexion = '{$oDateTime->format("y-m-d h:i:s")}'
                    WHERE T01_CodUsuario='{$codUsuario}';
                PDO;
                
                DBPDO::ejecutarConsulta($consulta);
                
                return $oUsuario;
            }
        }
    }
?>