<?php
require_once("../.yy./../conexion/conexion.php");
class clase_asistenciac
{   private $db;
    public $vl_codigo;
    public $vl_fecing;
    public $vl_fechar;
    public $vl_codmat;
    public $vl_descri;
    public $vl_observ;

    public function __construct()
    {
        $this->$vl_codigo=0;
        $this->$vl_fecing="";
        $this->$vl_fechar="";
        $this->$vl_codmat=0;
        $this->$vl_descri="";
        $this->$vl_observ="";
        $this->db = (new Conexion())->getConexion();
    }

    public function _insertar($vl_fecing,$vl_fechar,$vl_codmat,$vl_descri,$vl_observ){
        $dmlsentencia="insert into snp_asiste_cabece (CAB_FECING, CAB_FECHAR, CAB_CODMAT, CAB_DESCRI, CAB_OBSER)
                                   VALUES ('". $vl_fecing . "','"
                                             . $vl_fechar . "',"
                                             . $vl_codmat . ",'"
                                             . $vl_descri . "','"
                                             . $vl_observ. "')";
        
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultartodo($valor){
        if($valor=='')
        {
            $dmlsentencia="select * from snp_asiste_cabece";
        }
        else
        {
            $dmlsentencia="select * from snp_asiste_cabece where CAB_DESCRI like '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
   
    
}
?>
