<?php
    /*
    * @author: David del Prado Losada
    * @version: v1.0
    * Created on: 02/01/2022
    */

    class UsuarioPDO implements UsuarioDB{
        public static function validarUsuario($codUsuario, $password){
             $consulta = <<<PDO
                SELECT * FROM T01_Usuario
                WHERE T01_CodUsuario='{$codUsuario}' AND
                T01_Password=SHA2("{$codUsuario}{$password}", 256);
            PDO;
            
            $oResultado = DBPDO::ejecutarConsulta($consulta);
            $oUsuario=$oResultado->fetchObject();
            
            if($oUsuario){
                return new Usuario($oUsuario->T01_CodUsuario, $oUsuario->T01_Password, $oUsuario->T01_DescUsuario, $oUsuario->T01_NumConexiones, $oUsuario->T01_FechaHoraUltimaConexion, null, $oUsuario->T01_Perfil);
            }else{
                return false;
            }
        }
        
        public static function altaUsuario(){
            
        }
        
        public static function modificarUsuario(){
            
        }
        
        public static function borrarUsuario(){
            
        }
        
        public static function registrarUltimaConexion($oUsuario){
            //Guardo la hora actual
            $oDateTime = new DateTime();
            
            $consulta = <<<PDO
                UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1,
                T01_FechaHoraUltimaConexion = '{$oDateTime->format("y-m-d h:i:s")}'
                WHERE T01_CodUsuario='{$oUsuario->getCodUsuario()}';
            PDO;

            DBPDO::ejecutarConsulta($consulta);
            
            $oUsuario->setFechaHoraUltimaConexionAnterior($oUsuario->getFechaHoraUltimaConexion());
            $oUsuario->setFechaHoraUltimaConexion($oDateTime->format("y-m-d h:i:s"));
            $oUsuario->setNumConexiones($oUsuario->getNumConexiones()+1);
            
            return $oUsuario;
        }
    }
?>