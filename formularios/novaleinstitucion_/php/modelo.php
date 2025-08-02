<?php
require_once("../../../conexion/conexion.php");
class clase_institucion
{   
    private $db;
    public $vl_titul1;
    public $vl_titul2;
    public $vl_titul3;
    
    public function __construct()
    {
        $this->vl_titul1="";
        $this->vl_titul2="";
        $this->vl_titul3="";
        $this->db = (new Conexion())->getConexion();
    }
  
    public function _consultartodo(){
        
        $dmlsentencia="select * from snp_cont";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    
    public function _actualizar($vl_titul1, $vl_titul2,$vl_titul3){
        
        $dmlsentencia="UPDATE snp_cont SET con_titul1 = '" . $vl_titul1 . "',
                                           con_titul2 = '" . $vl_titul2 . "',
                                           con_titul3 = '" . $vl_titul3 . "'";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _borrar_registros($valor){
        
        //Eliminar registros tabla snp_mate y pone en 1
        $dmlsentencia="DELETE * FROM snp_mate";
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia="ALTER TABLE tu_tabla_va_aqui AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);


        return $registros;
    }
}
?>