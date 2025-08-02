<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_areas
{   private $db;
    public $vl_id;
    public $vl_nombre;
    public $vl_observ;
    public function __construct()
    {
        $this->vl_id=0;
        $this->vl_nombre="";
        $this->vl_observ="";
        $this->db = (new Conexion())->getConexion();
    }
    public function _insertar($vl_nom, $vl_obs){
        
        $dmlsentencia="insert into snp_areas(ARE_NOMBRE,ARE_OBSERV) values ('" . $vl_nom ."','". $vl_obs . "')";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _consultartodo($valor){
        
        if($valor=='')
        {
            $dmlsentencia="select * from snp_areas";
        }
        else
        {
            $dmlsentencia="select * from snp_areas where ARE_NOMBRE like '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor){
        
        $dmlsentencia="SELECT * FROM snp_areas WHERE ARE_ID = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _eliminar($valor){
        
        $dmlsentencia="DELETE FROM snp_areas WHERE ARE_ID= " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _actualizar($nombre, $observ, $id)
    { 
     
     $dmlsentencia="UPDATE snp_areas SET ARE_NOMBRE = '" . $nombre . "', ARE_OBSERV = '" . $observ ."' WHERE ARE_ID=".$id;
     $registros = $this->db->query($dmlsentencia);
     return $registros;
 }

}
?>