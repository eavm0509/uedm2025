<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_asignaturas
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
        
        $dmlsentencia="insert into snp_asig(ASIG_NOMBRE,ASIG_OBSERV) values ('" . $vl_nom ."','". $vl_obs . "')";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _consultartodo($valor){
        
        if($valor=='')
        {
            $dmlsentencia="select * from snp_asig";
        }
        else
        {
            $dmlsentencia="select * from snp_asig where ASIG_NOMBRE like '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor){
        
        $dmlsentencia="SELECT * FROM snp_asig WHERE ASIG_CODIGO = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _eliminar($valor){
        
        $dmlsentencia="DELETE FROM snp_asig WHERE ASIG_CODIGO= " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _actualizar($nombre, $observ, $id)
    { 
     
     $dmlsentencia="UPDATE snp_asig SET ASIG_NOMBRE = '" . $nombre . "', ASIG_OBSERV = '" . $observ ."' WHERE ASIG_CODIGO=".$id;
     $registros = $this->db->query($dmlsentencia);
     return $registros;
 }

}
?>