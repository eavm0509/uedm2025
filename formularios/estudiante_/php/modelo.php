<?php
require_once("../../../conexion/conexion.php");
class clase_estudiantes
{   
    private $db;
    public $vl_fecing;
    public $vl_fmatri;
    public $vl_matric;
    public $vl_nfolio;
    public $vl_fnacer;
    public $vl_curso;
    public $vl_estciv;
    public $vl_sexo;
    public $vl_tipo;
    public $vl_ordina;
    public $vl_nuevo;
    public $vl_repite;
    public $vl_retira;
    public $vl_fecret;
    public $vl_fotogr;
    public $vl_cedula;
    public $vl_nacio;
    public $vl_nombre;
    public $vl_lnacer;
    public $vl_diredo;
    public $vl_teledo;
    public $vl_telest;
    public $vl_emaest;
    public $vl_discap;
    public $vl_ncadis;
    public $vl_enferm;
    public $vl_defetn;
    public $vl_colevi;
    public $vl_dicovi;
    public $vl_anoant;
    public $vl_curant;
    public $vl_notdis;
    public $vl_notapr;
    public $vl_cedmdr;
    public $vl_nacmdr;
    public $vl_nommdr;
    public $vl_fnmdr;
    public $vl_ecimdr;
    public $vl_dirmdr;
    public $vl_parmdr;
    public $vl_prvmdr;
    public $vl_canmdr;
    public $vl_ca1mdr;
    public $vl_ca2mdr;
    public $vl_ncamdr;
    public $vl_barmdr;
    public $vl_telmdr;
    public $vl_emamdr;
    public $vl_promdr;
    public $vl_nedmdr;
    public $vl_tramdr;
    public $vl_lutmdr;
    public $vl_cedpdr;
    public $vl_nacpdr;
    public $vl_nompdr;
    public $vl_fnpdr;
    public $vl_ecipdr;
    public $vl_dirpdr;
    public $vl_parpdr;
    public $vl_prvpdr;
    public $vl_canpdr;
    public $vl_ca1pdr;
    public $vl_ca2pdr;
    public $vl_ncapdr;
    public $vl_barpdr;
    public $vl_telpdr;
    public $vl_emapdr;
    public $vl_propdr;
    public $vl_nedpdr;
    public $vl_trapdr;
    public $vl_lutpdr;
    public $vl_codrpr;
    public $vl_relrpr;
    public $vl_observ;

    public function __construct(){   
        $this->vl_fecing="";
        $this->vl_fmatri="";
        $this->vl_matric=0;
        $this->vl_nfolio="";
        $this->vl_fnacer="";
        $this->vl_curso=0;
        $this->vl_estciv=0;
        $this->vl_sexo=0;
        $this->vl_tipo=0;
        $this->vl_ordina=0;
        $this->vl_nuevo=0;
        $this->vl_repite=0;
        $this->vl_retira=0;
        $this->vl_fecret="";
        $this->vl_fotogr="";
        $this->vl_cedula="";
        $this->vl_nacio="";
        $this->vl_nombre="";
        $this->vl_lnacer="";
        $this->vl_diredo="";
        $this->vl_teledo="";
        $this->vl_telest="";
        $this->vl_emaest="";
        $this->vl_discap="";
        $this->vl_ncadis="";
        $this->vl_enferm="";
        $this->vl_defetn="";
        $this->vl_colevi="";
        $this->vl_dicovi="";
        $this->vl_anoant="";
        $this->vl_curant="";
        $this->vl_notdis="";
        $this->vl_notapr="";
        $this->vl_cedmdr="";
        $this->vl_nacmdr="";
        $this->vl_nommdr="";
        $this->vl_fnmdr="";
        $this->vl_ecimdr="";
        $this->vl_dirmdr="";
        $this->vl_parmdr="";
        $this->vl_prvmdr="";
        $this->vl_canmdr="";
        $this->vl_ca1mdr="";
        $this->vl_ca2mdr="";
        $this->vl_ncamdr="";
        $this->vl_barmdr="";
        $this->vl_telmdr="";
        $this->vl_emamdr="";
        $this->vl_promdr="";
        $this->vl_nedmdr="";
        $this->vl_tramdr="";
        $this->vl_lutmdr="";
        $this->vl_cedpdr="";
        $this->vl_nacpdr="";
        $this->vl_nompdr="";
        $this->vl_fnpdr="";
        $this->vl_ecipdr="";
        $this->vl_dirpdr="";
        $this->vl_parpdr="";
        $this->vl_prvpdr="";
        $this->vl_canpdr="";
        $this->vl_ca1pdr="";
        $this->vl_ca2pdr="";
        $this->vl_ncapdr="";
        $this->vl_barpdr="";
        $this->vl_telpdr="";
        $this->vl_emapdr="";
        $this->vl_propdr="";
        $this->vl_nedpdr="";
        $this->vl_trapdr="";
        $this->vl_lutpdr="";
        $this->vl_codrpr=0;
        $this->vl_relrpr="";
        $this->vl_observ="";
        $this->db = (new Conexion())->getConexion();
    }

 public function _insertar(
            $vl_fecing,
            $vl_fmatri,
            $vl_matric,
            $vl_nfolio,
            $vl_fnacer,
            $vl_curso,
            $vl_estciv,
            $vl_sexo,
            $vl_tipo,
            $vl_ordina,
            $vl_nuevo,
            $vl_repite,
            $vl_retira,
            $vl_fecret,
            $vl_fotogr,
            $vl_cedula,
            $vl_nacio,
            $vl_nombre,
            $vl_lnacer,
            $vl_diredo,
            $vl_teledo,
            $vl_telest,
            $vl_emaest,
            $vl_discap,
            $vl_ncadis,
            $vl_enferm,
            $vl_defetn,
            $vl_colevi,
            $vl_dicovi,
            $vl_anoant,
            $vl_curant,
            $vl_notdis,
            $vl_notapr,
            $vl_cedmdr,
            $vl_nacmdr,
            $vl_nommdr,
            $vl_fnmdr,
            $vl_ecimdr,
            $vl_dirmdr,
            $vl_parmdr,
            $vl_prvmdr,
            $vl_canmdr,
            $vl_ca1mdr,
            $vl_ca2mdr,
            $vl_ncamdr,
            $vl_barmdr,
            $vl_telmdr,
            $vl_emamdr,
            $vl_promdr,
            $vl_nedmdr,
            $vl_tramdr,
            $vl_lutmdr,
            $vl_cedpdr,
            $vl_nacpdr,
            $vl_nompdr,
            $vl_fnpdr,
            $vl_ecipdr,
            $vl_dirpdr,
            $vl_parpdr,
            $vl_prvpdr,
            $vl_canpdr,
            $vl_ca1pdr,
            $vl_ca2pdr,
            $vl_ncapdr,
            $vl_barpdr,
            $vl_telpdr,
            $vl_emapdr,
            $vl_propdr,
            $vl_nedpdr,
            $vl_trapdr,
            $vl_lutpdr,
            $vl_codrpr,
            $vl_relrpr,
            $vl_observ) 
        {        
        $dmlsentencia="insert into snp_alum(
            ALU_FECING,
            ALU_FMATRI,
            ALU_MATRIC,
            ALU_NFOLIO,
            ALU_FNACER,
            ALU_CODCUR,
            ALU_ESTCIV,
            ALU_SEXO,
            ALU_TIPO,
            ALU_ORDINA,
            ALU_NUEVO,
            ALU_REPITE,
            ALU_RETIRADO,
            ALU_FECRET,
            ALU_FOTOGR,
            ALU_CEDULA,
            ALU_NACION,
            ALU_NOMBRE,
            ALU_LNACER,
            ALU_DIREDO,
            ALU_TELEDO,
            ALU_TELEST,
            ALU_EMAEST,
            ALU_DISCAP,
            ALU_NCADIS,
            ALU_ENFERM,
            ALU_DEFETN,
            ALU_COLEVI,
            ALU_DICOVI,
            ALU_ANOANT,
            ALU_CURANT,
            ALU_NOTDIS,
            ALU_NOTAPR,
            ALU_CEDMDR,
            ALU_NACMDR,
            ALU_NOMMDR,
            ALU_FNMDR,
            ALU_ECIMDR,
            ALU_DIRMDR,
            ALU_PARMDR,
            ALU_PRVMDR,
            ALU_CANMDR,
            ALU_CA1MDR,
            ALU_CA2MDR,
            ALU_NCAMDR,
            ALU_BARMDR,
            ALU_TELMDR,
            ALU_EMAMDR,
            ALU_PROMDR,
            ALU_NEDMDR,
            ALU_TRAMDR,
            ALU_LUTMDR,
            ALU_CEDPDR,
            ALU_NACPDR,
            ALU_NOMPDR,
            ALU_FNPDR,
            ALU_ECIPDR,
            ALU_DIRPDR,
            ALU_PARPDR,
            ALU_PRVPDR,
            ALU_CANPDR,
            ALU_CA1PDR,
            ALU_CA2PDR,
            ALU_NCAPDR,
            ALU_BARPDR,
            ALU_TELPDR,
            ALU_EMAPDR,
            ALU_PROPDR,
            ALU_NEDPDR,
            ALU_TRAPDR,
            ALU_LUTPDR,
            ALU_CODRPR,
            ALU_RELRPR,
            ALU_OBSERV)
        values 
        ('" . $vl_fecing . "','" 
            . $vl_fmatri . "','" 
            . $vl_matric . "','" 
            . $vl_nfolio . "','" 
            . $vl_fnacer . "'," 
            . $vl_curso . ",'" 
            . $vl_estciv . "'," 
            . $vl_sexo . "," 
            . $vl_tipo . ",'" 
            . $vl_ordina . "','" 
            . $vl_nuevo . "','" 
            . $vl_repite . "','" 
            . $vl_retira . "','" 
            . $vl_fecret . "','" 
            . $vl_fotogr . "','" 
            . $vl_cedula . "','" 
            . $vl_nacio . "','" 
            . $vl_nombre . "','" 
            . $vl_lnacer . "','" 
            . $vl_diredo . "','" 
            . $vl_teledo . "','" 
            . $vl_telest . "','" 
            . $vl_emaest . "','"
            . $vl_discap . "','"
            . $vl_ncadis . "','"
            . $vl_enferm . "','"
            . $vl_defetn . "','"
            . $vl_colevi . "','"
            . $vl_dicovi . "','"
            . $vl_anoant . "','"
            . $vl_curant . "','"
            . $vl_notdis . "','"
            . $vl_notapr . "','"
            . $vl_cedmdr . "','"
            . $vl_nacmdr . "','"
            . $vl_nommdr . "','"
            . $vl_fnmdr . "','"
            . $vl_ecimdr . "','"
            . $vl_dirmdr . "','"
            . $vl_parmdr . "','"
            . $vl_prvmdr . "','"
            . $vl_canmdr . "','"
            . $vl_ca1mdr . "','"
            . $vl_ca2mdr . "','"
            . $vl_ncamdr . "','"
            . $vl_barmdr . "','"
            . $vl_telmdr . "','"
            . $vl_emamdr . "','"
            . $vl_promdr . "','"
            . $vl_nedmdr . "','"
            . $vl_tramdr . "','"
            . $vl_lutmdr . "','"
            . $vl_cedpdr . "','"
            . $vl_nacpdr . "','"
            . $vl_nompdr . "','"
            . $vl_fnpdr . "','"
            . $vl_ecipdr . "','"
            . $vl_dirpdr . "','"
            . $vl_parpdr . "','"
            . $vl_prvpdr . "','"
            . $vl_canpdr . "','"
            . $vl_ca1pdr . "','"
            . $vl_ca2pdr . "','"
            . $vl_ncapdr . "','"
            . $vl_barpdr . "','"
            . $vl_telpdr . "','"
            . $vl_emapdr . "','"
            . $vl_propdr . "','"
            . $vl_nedpdr . "','"
            . $vl_trapdr . "','"
            . $vl_lutpdr . "',"
            . $vl_codrpr . ",'"
            . $vl_relrpr . "','"
            . $vl_observ ."')";
             
          $registros = $this->db->query($dmlsentencia);
        return $registros;
    }   
    
    
    public function _consultartodo($valor) {
    if ($valor == '') {
        $dmlsentencia = "SELECT * FROM snp_alum";
    } else {
        $dmlsentencia = "SELECT * FROM snp_alum 
                         WHERE ALU_NOMBRE LIKE '$valor' 
                            OR ALU_CEDULA LIKE '$valor'"; 
                            
    }

    $registros = $this->db->query($dmlsentencia);
    return $registros;
}

    public function _consultartodovista($valor){
        if($valor=='')
        {
            $dmlsentencia="select * from vis_estudiantes1";
        }
        else
        {
            $dmlsentencia="select * from vis_estudiantes1 where ALU_NOMBRE like '%".$valor.
                                                                "%' or ALU_CEDULA like '%".$valor.
                                                                "%' or FCU_DESCRI like '%".$valor.
                                                                "%' ORDER BY ALU_NOMBRE";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

public function _consultarcodigo($valor){
        $dmlsentencia="SELECT * FROM snp_alum WHERE ALU_NMATRI = " .$valor . " OR ALU_CEDULA = '". $valor . "'";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
public function _consultarxcurso($valor){
        $dmlsentencia="SELECT * FROM snp_alum WHERE ALU_CODCUR = " . $valor ;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _eliminar($valor){
        $dmlsentencia="DELETE FROM snp_alum WHERE ALU_NMATRI= " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _actualizar(
            $vl_fecing,
            $vl_fmatri,
            $vl_matric,
            $vl_nfolio,
            $vl_fnacer,
            $vl_curso,
            $vl_estciv,
            $vl_sexo,
            $vl_tipo,
            $vl_ordina,
            $vl_nuevo,
            $vl_repite,
            $vl_retira,
            $vl_fecret,
            $vl_fotogr,
            $vl_cedula,
            $vl_nacio,
            $vl_nombre,
            $vl_lnacer,
            $vl_diredo,
            $vl_teledo,
            $vl_telest,
            $vl_emaest,
            $vl_discap,
            $vl_ncadis,
            $vl_enferm,
            $vl_defetn,
            $vl_colevi,
            $vl_dicovi,
            $vl_anoant,
            $vl_curant,
            $vl_notdis,
            $vl_notapr,
            $vl_cedmdr,
            $vl_nacmdr,
            $vl_nommdr,
            $vl_fnmdr,
            $vl_ecimdr,
            $vl_dirmdr,
            $vl_parmdr,
            $vl_prvmdr,
            $vl_canmdr,
            $vl_ca1mdr,
            $vl_ca2mdr,
            $vl_ncamdr,
            $vl_barmdr,
            $vl_telmdr,
            $vl_emamdr,
            $vl_promdr,
            $vl_nedmdr,
            $vl_tramdr,
            $vl_lutmdr,
            $vl_cedpdr,
            $vl_nacpdr,
            $vl_nompdr,
            $vl_fnpdr,
            $vl_ecipdr,
            $vl_dirpdr,
            $vl_parpdr,
            $vl_prvpdr,
            $vl_canpdr,
            $vl_ca1pdr,
            $vl_ca2pdr,
            $vl_ncapdr,
            $vl_barpdr,
            $vl_telpdr,
            $vl_emapdr,
            $vl_propdr,
            $vl_nedpdr,
            $vl_trapdr,
            $vl_lutpdr,
            $vl_codrpr,
            $vl_relrpr,
            $vl_observ, $id)
    { 
    
     $dmlsentencia="update snp_alum SET 
            ALU_FMATRI = '" . $vl_fmatri . "',
            ALU_MATRIC = '" . $vl_matric . "',
            aLU_NFOLIO = '" . $vl_nfolio . "',
            ALU_FNACER = '" . $vl_fnacer . "',
            ALU_CODCUR = " . $vl_curso . ",
            ALU_ESTCIV = " . $vl_estciv . ",
            ALU_SEXO = " . $vl_sexo . ",
            ALU_TIPO = '" . $vl_tipo . "',
            ALU_ORDINA = " . $vl_ordina . ",
            ALU_NUEVO = " . $vl_nuevo . ",
            ALU_REPITE = " . $vl_repite . ",
            ALU_RETIRADO = " . $vl_retira . ",
            ALU_FECRET = '" . $vl_fecret . "',
            ALU_FOTOGR = '" . $vl_fotogr . "',
            ALU_CEDULA = '" . $vl_cedula . "',
            ALU_NACION = '" . $vl_nacio  . "',
            ALU_NOMBRE = '" . $vl_nombre . "',
            ALU_LNACER = '" . $vl_lnacer . "',
            ALU_DIREDO = '" . $vl_diredo . "',
            ALU_TELEDO = '" . $vl_teledo . "',
            ALU_TELEST = '" . $vl_telest . "',
            ALU_EMAEST = '" . $vl_emaest . "',
            ALU_DISCAP = '" . $vl_discap . "',
            ALU_NCADIS = '" . $vl_ncadis . "',
            ALU_ENFERM = '" . $vl_enferm . "',
            ALU_DEFETN = '" . $vl_defetn . "',
            ALU_COLEVI = '" . $vl_colevi . "',
            ALU_DICOVI = '" . $vl_dicovi . "',
            ALU_ANOANT = '" . $vl_anoant . "',
            ALU_CURANT = '" . $vl_curant . "',
            ALU_NOTDIS = '" . $vl_notdis . "',
            ALU_NOTAPR = '" . $vl_notapr . "',
            ALU_CEDMDR = '" . $vl_cedmdr . "',
            ALU_NACMDR = '" . $vl_nacmdr . "',
            ALU_NOMMDR = '" . $vl_nommdr . "',
            ALU_FNMDR =  '" . $vl_fnmdr  . "',
            ALU_ECIMDR = '" . $vl_ecimdr . "',
            ALU_DIRMDR = '" . $vl_dirmdr . "',
            ALU_PARMDR = '" . $vl_parmdr . "',
            ALU_PRVMDR = '" . $vl_prvmdr . "',
            ALU_CANMDR = '" . $vl_canmdr . "',
            ALU_CA1MDR = '" . $vl_ca1mdr . "',
            ALU_CA2MDR = '" . $vl_ca2mdr . "',
            ALU_NCAMDR = '" . $vl_ncamdr . "',
            ALU_BARMDR = '" . $vl_barmdr . "',
            ALU_TELMDR = '" . $vl_telmdr . "',
            ALU_EMAMDR = '" . $vl_emamdr . "',
            ALU_PROMDR = '" . $vl_promdr . "',
            ALU_NEDMDR = '" . $vl_nedmdr . "',
            ALU_TRAMDR = '" . $vl_tramdr . "',
            ALU_LUTMDR = '" . $vl_lutmdr . "',
            ALU_CEDPDR = '" . $vl_cedpdr . "',
            ALU_NACPDR = '" . $vl_nacpdr . "',
            ALU_NOMPDR = '" . $vl_nompdr . "',
            ALU_FNPDR =  '" . $vl_fnpdr  . "',
            ALU_ECIPDR = '" . $vl_ecipdr . "',
            ALU_DIRPDR = '" . $vl_dirpdr . "',
            ALU_PARPDR = '" . $vl_parpdr . "',
            ALU_PRVPDR = '" . $vl_prvpdr . "',
            ALU_CANPDR = '" . $vl_canpdr . "',
            ALU_CA1PDR = '" . $vl_ca1pdr . "',
            ALU_CA2PDR = '" . $vl_ca2pdr . "',
            ALU_NCAPDR = '" . $vl_ncapdr . "',
            ALU_BARPDR = '" . $vl_barpdr . "',
            ALU_TELPDR = '" . $vl_telpdr . "',
            ALU_EMAPDR = '" . $vl_emapdr . "',
            ALU_PROPDR = '" . $vl_propdr . "',
            ALU_NEDPDR = '" . $vl_nedpdr . "',
            ALU_TRAPDR = '" . $vl_trapdr . "',
            ALU_LUTPDR = '" . $vl_lutpdr . "',
            ALU_CODRPR = "  . $vl_codrpr . ",
            ALU_RELRPR = '" . $vl_relrpr . "',
            ALU_OBSERV = '" . $vl_observ . "' 
            WHERE ALU_NMATRI = " .$id ;

     $registros = $this->db->query($dmlsentencia);
     return $registros;
    }

    public function _insertar2($vl_cedula, $vl_nombre, $vl_curso, $vl_emaest, $vl_sexo){
        $fecha_actual = date("Y-m-d");
        $dmlsentencia="insert into snp_alum
        (ALU_CEDULA,ALU_NOMBRE, ALU_CODCUR, ALU_EMAEST, ALU_SEXO, ALU_ESTCIV, ALU_FECING)
        values 
        ('" . $vl_cedula . "','". 
              $vl_nombre . "'," . 
              $vl_curso .  ",'" . 
              $vl_emaest . "'," .
              $vl_sexo .   "," .
              "2 , '" .
              $fecha_actual . "')";
             
          $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function obtenerNominaConRepresentantes($paralelo = '') {
    $sql = "SELECT 
                CONCAT(a.ALU_APELLI, ' ', a.ALU_NOMBRE) AS estudiante,
                r.REP_APENOM AS representante,
                r.REP_CEDULA
            FROM snp_alum a
            JOIN snp_repr r ON a.ALU_RELRPR = r.REP_CEDULA
            JOIN snp_fcur f ON a.ALU_MATRIC = f.FCU_COD";

    if ($paralelo !== '') {
        $sql .= " WHERE f.FCU_DESCRI = :paralelo";
    }
    
    $sql .= " ORDER BY estudiante";
    
    $stmt = $this->db->prepare($sql);

    if ($paralelo !== '') {
        $stmt->bindParam(':paralelo', $paralelo, PDO::PARAM_STR);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



public function obtenerCertificadoMatriculaPorCedula($cedula) {
    $cedula = trim($cedula);

    $sql = "SELECT 
                a.ALU_NOMBRE,
                a.ALU_APELLI,
                a.ALU_FMATRI,
                f.FCU_DESCRI,
                c.CIC_NOMB AS FCU_COD,
                s.SEC_NOMBRE AS FCUR_SEC
            FROM snp_alum a
            LEFT JOIN snp_fcur f ON a.ALU_MATRIC = f.FCU_COD
            LEFT JOIN snp_cicl c ON f.FCU_COD = c.CIC_CODI
            LEFT JOIN snp_secc s ON f.FCUR_SEC = s.SEC_CODIGO
            WHERE TRIM(a.ALU_CEDULA) = :cedula";

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function obtenerFichaMatriculaPorCedula($cedula) {
    $cedula = trim($cedula);

    $sql = "SELECT 
                a.ALU_NOMBRE,
                a.ALU_APELLI,
                a.ALU_CEDULA,
                a.ALU_FNACER,
                a.ALU_LNACER,
                a.ALU_ESTCIV,
                a.ALU_DIREDO,
                a.ALU_TELEDO,
                a.ALU_SEXO,
                a.ALU_FMATRI,
                a.ALU_REPITE,
                
                
                a.ALU_NUEVO,
                
                a.ALU_NOMPDR,
                a.ALU_DIRPDR,
                a.ALU_NACPDR,
                a.ALU_PROPDR,
                
                a.ALU_NOMMDR,
                a.ALU_DIRMDR,
                a.ALU_NACMDR,
                a.ALU_PROMDR,

                f.FCU_DESCRI,
                c.CIC_NOMB AS CICLO,
                s.SEC_NOMBRE AS SECCION,

                r.REP_APENOM,
                r.REP_CEDULA,
                r.REP_DOMICI,
                r.REP_FECNAC,
                r.REP_PARENT,
                r.REP_TELDOM
            FROM snp_alum a
            LEFT JOIN snp_fcur f ON a.ALU_MATRIC = f.FCU_COD
            LEFT JOIN snp_cicl c ON f.FCU_COD = c.CIC_CODI
            LEFT JOIN snp_secc s ON f.FCUR_SEC = s.SEC_CODIGO
            LEFT JOIN snp_repr r ON a.ALU_NMATRI = r.REP_CODALU
            WHERE TRIM(a.ALU_CEDULA) = :cedula";

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function obtenerEstudiantesPorRepresentante($cod_representante) {
    $sql = "SELECT 
                a.ALU_NMATRI,
                a.ALU_CEDULA,
                a.ALU_NOMBRE,
                a.ALU_APELLI,
                a.ALU_TELEDO,
                a.ALU_EMAEST,
                a.ALU_CODCUR
            FROM snp_alum a
            WHERE a.ALU_CODRPR = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$cod_representante]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function obtenerBoletinPorCedula($cedula) {
    $cedula = trim($cedula);

    $sql = "SELECT 
                a.ALU_NOMBRE,
                a.ALU_APELLI,
                a.ALU_CEDULA,
                a.ALU_NMATRI,
                a.ALU_CODCUR,
                f.FIC_TURNO,
                f.FIC_SECCIO,
                f.FIC_PARALE,
                f.FIC_NIVEL,
                f.FIC_PERIODO
            FROM snp_alum a
            INNER JOIN snp_ficha_matricula f ON a.ALU_NMATRI = f.FIC_CODALU
            WHERE a.ALU_CEDULA = ?";

    $stmt = $this->db->prepare($sql);
    $stmt->execute([$cedula]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


}
