<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_representantes
{   private $db;
    public $vl_codigo;
    public $vl_cedula;
    public $vl_apenom;
    public $vl_fecnac;
    public $vl_sexo;
    public $vl_estciv;
    public $vl_domici;
    public $vl_teldom;
    public $vl_trabaj;
    public $vl_dirtra;
    public $vl_teltra;
    public $vl_profes;
    public $vl_fecing;
    public $vl_nacion;
    public $vl_correo;
    public $vl_movilw;
    public $vl_contac;
    public $vl_telcon;
    public $vl_suspen;
    public $vl_observ;
    public function __construct()
    {
        $this->vl_codigo=0;
        $this->vl_cedula="";
        $this->vl_apenom="";
        $this->vl_fecnac="";
        $this->vl_sexo=0;
        $this->vl_estciv=0;
        $this->vl_domici="";
        $this->vl_teldom="";
        $this->vl_trabaj="";
        $this->vl_dirtra="";
        $this->vl_teltra="";
        $this->vl_profes="";
        $this->vl_fecing="";
        $this->vl_nacion="";
        $this->vl_correo="";
        $this->vl_movilw="";
        $this->vl_contac="";
        $this->vl_telcon="";
        $this->vl_suspen='';
        $this->vl_observ="";
        $this->db = (new Conexion())->getConexion();
    }
    public function _insertar($vl_cedula, $vl_apenom, $vl_correo, $vl_suspen){
        
        $dmlsentencia="insert into snp_repr(REP_CEDULA, REP_APENOM, REP_CORREO, REP_CLAVE, REP_SUSPEN) 
        values ('" . $vl_cedula . "','" . $vl_apenom . "','" . $vl_correo . "','" . $vl_cedula . 
        "'," . $vl_suspen  .")";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _consultartodo($valor){
        
        if($valor=='')
        {
            $dmlsentencia="select * from snp_repr order by REP_APENOM";
        }
        else
        {
            $dmlsentencia="select * from snp_repr where REP_APENOM like '%".$valor."%' OR REP_CEDULA like '%".$valor."%' ORDER BY REP_APENOM" ;
        }
       $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor){
        $dmlsentencia="SELECT * FROM snp_repr WHERE REP_CODIGO = " . $valor . " OR REP_CEDULA = '" . $valor . "' OR REP_CORREO = '" . $valor . "' ORDER BY REP_APENOM";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _consultarcorreo($correo, $codigo){
        $dmlsentencia="SELECT COUNT(*) as _contador FROM snp_repr WHERE REP_CODIGO != " . $codigo . " AND REP_CORREO = '" . $correo . "' ORDER BY REP_CORREO";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    
    public function _eliminar($valor){
        $dmlsentencia="DELETE FROM snp_repr WHERE REP_CODIGO= " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _actualizar($cedula, $apno, $correo, $suspen, $id)
    { 
     
     $dmlsentencia="update snp_repr SET REP_CEDULA = '" . $cedula . "', 
                       REP_APENOM = '" . $apno . "', 
                       REP_CORREO = '" . $correo . "',
                       REP_SUSPEN = " . $suspen . "  
                       WHERE REP_CODIGO = " . $id ;
     $registros = $this->db->query($dmlsentencia);
     return $registros;
    }

    public function _actualizar_ppff($vl_cedula, $vl_apenom, $vl_fecnac, $vl_sexo, $vl_estciv, $vl_domici, $vl_teldom,
                                     $vl_trabaj, $vl_dirtra, $vl_teltra, $vl_profes, $vl_fecing, $vl_nacion, $vl_correo,
                                     $vl_movilw, $vl_contac, $vl_telcon, $vl_observ, $codigo)
    { 
                 $dmlsentencia="update snp_repr SET REP_CEDULA = '" . $vl_cedula . "', 
                                                    REP_APENOM = '" . $vl_apenom ."', 
                                                    REP_FECNAC = '" . $vl_fecnac ."',
                                                    REP_SEXO   =  " . $vl_sexo   . ",
                                                    REP_ESTCIV =  " . $vl_estciv . ",
                                                    REP_DOMICI = '" . $vl_domici ."',
                                                    REP_TELDOM = '" . $vl_teldom ."',
                                                    REP_TRABAJ = '" . $vl_trabaj ."',
                                                    REP_DIRTRA = '" . $vl_dirtra ."',
                                                    REP_TELTRA = '" . $vl_teltra ."',
                                                    REP_PROFES = '" . $vl_profes ."',
                                                    REP_FECING = '" . $vl_fecing ."',
                                                    REP_NACION = '" . $vl_nacion ."',
                                                    REP_CORREO = '" . $vl_correo ."',
                                                    REP_MOVILW = '" . $vl_movilw ."',
                                                    REP_CONTAC = '" . $vl_contac ."',
                                                    REP_TELCON = '" . $vl_telcon ."',
                                                    REP_OBSERV = '" . $vl_observ ."' 
                                                    WHERE REP_CODIGO=" . $codigo;
                                                    $registros = $this->db->query($dmlsentencia);
                                                    return $registros;
    }
        

}
?>