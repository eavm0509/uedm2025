<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_institucion
{   
    private $db;
    public $vl_titul1;
    public $vl_titul2;
    public $vl_titul3;
    public $vl_titul4;
    public $vl_titul5;
    public $vl_ruc;
    public $vl_desano;
    public $vl_ordina;
    public $vl_fecini;
    public $vl_provin;
    public $vl_fecgra;
    public $vl_sigrec;
    public $vl_rector;
    public $vl_sigvr;
    public $vl_vicere;
    public $vl_sigpv;
    public $vl_privoc;
    public $vl_sigsv;
    public $vl_segvoc;
    public $vl_sigtv;
    public $vl_tervoc;
    public $vl_sigsec;
    public $vl_secret;
    public $vl_sigins;
    public $vl_inspec;
    public $vl_sigcol;
    public $vl_colec;
    
    public function __construct()
    {
        $this->vl_titul1="";
        $this->vl_titul2="";
        $this->vl_titul3="";
        $this->vl_titul4 = "";
        $this->vl_titul5 = "";
        $this->vl_ruc = "";
        $this->vl_desano = "";
        $this->vl_ordina = "";
        $this->vl_fecini = "";
        $this->vl_provin = "";
        $this->vl_fecgra = "";
        $this->vl_sigrec = "";
        $this->vl_rector = "";
        $this->vl_sigvr = "";
        $this->vl_vicere = "";
        $this->vl_sigpv = "";
        $this->vl_privoc = "";
        $this->vl_sigsv = "";
        $this->vl_segvoc = "";
        $this->vl_sigtv = "";
        $this->vl_tervoc = "";
        $this->vl_sigsec = "";
        $this->vl_secret = "";
        $this->vl_sigins = "";
        $this->vl_inspec = "";
        $this->vl_sigcol = "";
        $this->vl_colec = "";
        $this->db = (new Conexion())->getConexion();
    }
  
    public function _consultartodo(){
        
        $dmlsentencia="select * from snp_cont";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    
   public function _actualizar($vl_titul1, $vl_titul2, $vl_titul3, $vl_titul4, $vl_titul5,
                             $vl_ruc, $vl_desano, $vl_ordina, $vl_fecini, $vl_provin, $vl_fecgra,
                             $vl_sigrec, $vl_rector, $vl_sigvr, $vl_vicere, $vl_sigpv, $vl_privoc,
                             $vl_sigsv, $vl_segvoc, $vl_sigtv, $vl_tervoc, $vl_sigsec, $vl_secret,
                             $vl_sigins, $vl_inspec, $vl_sigcol, $vl_colec) {

    $dmlsentencia = "UPDATE snp_cont SET 
        con_titul1 = '$vl_titul1',
        con_titul2 = '$vl_titul2',
        con_titul3 = '$vl_titul3',
        con_titul4 = '$vl_titul4',
        con_titul5 = '$vl_titul5',
        con_ruc = '$vl_ruc',
        con_desano = '$vl_desano',
        con_ordina = '$vl_ordina',
        con_fecini = '$vl_fecini',
        con_provin = '$vl_provin',
        con_fecgra = '$vl_fecgra',
        con_sigrec = '$vl_sigrec',
        con_rector = '$vl_rector',
        con_sigvr = '$vl_sigvr',
        con_vicere = '$vl_vicere',
        con_sigpv = '$vl_sigpv',
        con_privoc = '$vl_privoc',
        con_sigsv = '$vl_sigsv',
        con_segvoc = '$vl_segvoc',
        con_sigtv = '$vl_sigtv',
        con_tervoc = '$vl_tervoc',
        con_sigsec = '$vl_sigsec',
        con_secret = '$vl_secret',
        con_sigins = '$vl_sigins',
        con_inspec = '$vl_inspec',
        con_sigcol = '$vl_sigcol',
        con_colec = '$vl_colec'";

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