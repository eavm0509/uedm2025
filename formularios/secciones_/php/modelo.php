<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_seccion
{   private $db;
    public $vl_id;
    public $vl_nombre;
    public $vl_observacion;
    public function __construct()
    {
        $this->vl_id="";
        $this->vl_nombre="";
        $this->vl_observacion="";
        $this->db = (new Conexion())->getConexion();
    }
    public function _insertar($vl_nombre, $vl_observacion){
        
          $dmlsentencia="insert into snp_secc(SEC_NOMBRE, SEC_OBSERV) values ('" . $vl_nombre . "','" . $vl_observacion . "')";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _consultartodo($valor){
        if($valor=='')
        {
            $dmlsentencia="select * from snp_secc";
        }
        else
        {
            $dmlsentencia="select * from snp_secc where SEC_NOMBRE like '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

   public function _consultarcodigo($valor){
        
        $dmlsentencia="SELECT * FROM snp_secc WHERE SEC_CODIGO = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _eliminar($valor){
        
        $dmlsentencia="DELETE FROM snp_secc WHERE SEC_CODIGO= " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _actualizar($nombre, $observ, $id)
    { 
     
     $dmlsentencia="update snp_secc SET SEC_NOMBRE = '" . $nombre . "', SEC_OBSERV = '" . $observ ."' WHERE SEC_CODIGO=".$id;
     $registros = $this->db->query($dmlsentencia);
     return $registros;
 }

}
?>