<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_personal
{   private $db;
    public $vl_codigo;
    public $vl_cedula;
    public $vl_apenom;
    public $vl_titulo;
    public $vl_siglap;
    public $vl_direcc;
    public $vl_telefo;
    public $vl_correo;
    
    public function __construct()
    {
        $this->vl_codigo=0;
        $this->vl_cedula="";
        $this->vl_apenom="";
        $this->vl_titulo="";
        $this->vl_siglap="";
        $this->vl_direcc="";
        $this->vl_telefo="";
        $this->vl_correo="";
        $this->db = (new Conexion())->getConexion();
    }
    public function _insertar($vl_cedula, $vl_apenom, $vl_titulo, $vl_siglap, $vl_direcc, $vl_telefo, $vl_correo){
        
        $dmlsentencia="insert into snp_pers(PER_CEDULA, PER_APENOM, PER_TITULO,
                                            PER_SIGLAP, PER_DIRECC, PER_TELEFO, 
                                            PER_CORREO) 
                                            values ('" 
                                            . $vl_cedula . "','" 
                                            . $vl_apenom . "','"
                                            . $vl_titulo . "','"
                                            . $vl_siglap . "','"
                                            . $vl_direcc . "','"
                                            . $vl_telefo . "','"
                                            . $vl_correo . "')";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _consultartodo($valor){
        if($valor=='')
        {
            $dmlsentencia="select * from snp_pers ORDER BY PER_APENOM";
        }
        else
        {
            $dmlsentencia="select * from snp_pers where PER_APENOM like '%".$valor."%' OR PER_CEDULA like '%".$valor."%' ORDER BY PER_APENOM" ;
        }
       $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor){
        $dmlsentencia="SELECT * FROM snp_pers WHERE PER_CODIGO = " . $valor . " OR PER_CEDULA = " . $valor ;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _eliminar($valor){
        
        $dmlsentencia="DELETE FROM snp_pers WHERE PER_CODIGO= " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

   
    public function _actualizar($vl_cedula, $vl_apenom, $vl_titulo, $vl_siglap, $vl_direcc, $vl_telefo, $vl_correo, $vl_codigo)
    {
    
     
     $dmlsentencia="update snp_pers SET PER_CEDULA = '" . $vl_cedula . 
                                    "', PER_APENOM = '" . $vl_apenom .
                                    "', PER_TITULO = '" . $vl_titulo .
                                    "', PER_SIGLAP = '" . $vl_siglap .
                                    "', PER_DIRECC = '" . $vl_direcc .
                                    "', PER_TELEFO = '" . $vl_telefo .
                                    "', PER_CORREO = '" . $vl_correo .
                                    "' WHERE PER_CODIGO =".$vl_codigo;
     $registros = $this->db->query($dmlsentencia);
     return $registros;
    }
}

?>