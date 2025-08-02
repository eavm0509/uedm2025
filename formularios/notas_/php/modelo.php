<<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
require_once("../../../conexion/conexion.php");
class clase_notas_registro
{  private $db;
   public $vl_id;
   public $vl_fecha;
   public $vl_codmat;
   public $vl_descri;
   public $vl_ingnot;
   public $vl_porcen;
   public $vl_mpadre;

   public function __construct()
    {   
        $this->vl_id=0;
        $this->vl_fecha="";
        $this->vl_codmat=0;
        $this->vl_descri="";
        $this->vl_ingnot=0;
        $this->vl_porcen=0;
        $this->vl_mpadre=0;
        $this->db = (new Conexion())->getConexion();
    }
    public function _insertar($vl_codmat, $vl_descri, $vl_ingnot, $vl_porcen)
    {      
        $fecha_actual = date('Y-m-d H:i:s'); 
        $dmlsentencia="insert into snp_notas_registros(REG_FECHA,  REG_CODMAT, REG_DESCRI, REG_INGNOT, REG_PORCEN) 
                       values('" . $fecha_actual . "'," 
                                 . $vl_codmat . ",'" 
                                 . $vl_descri . "','" 
                                 . $vl_ingnot . "',"
                                 . $vl_porcen .")";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    
    public function _consultartodo($valor){
        if($valor=='')
        {
            $dmlsentencia="SELECT * FROM snp_notas_registros 
                        LEFT JOIN snp_mate 
                            ON REG_CODMAT=MAT_CODIGO 
                        LEFT JOIN snp_pers 
                            ON MAT_CODPER=PER_CODIGO
                        LEFT JOIN snp_fcur 
                            ON MAT_CODCUR=FCU_COD
                        LEFT JOIN snp_asig 
                            ON MAT_CODASI=ASIG_CODIGO";
        }

       
        else
        {
            $dmlsentencia="SELECT * FROM  snp_notas_registros 
                            LEFT JOIN snp_mate 
                                ON REG_CODMAT=MAT_CODIGO 
                            LEFT JOIN snp_pers 
                                ON MAT_CODPER=PER_CODIGO
                            LEFT JOIN snp_fcur 
                                ON MAT_CODCUR=FCU_COD
                            LEFT JOIN snp_asig 
                                ON MAT_CODASI=ASIG_CODIGO
                            WHERE REG_CODMAT = " . $valor;
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor)
    {
        $dmlsentencia="SELECT * FROM snp_notas_registros 
                    LEFT JOIN snp_mate 
                       ON REG_CODMAT=snp_mate.MAT_CODIGO 
                    LEFT JOIN snp_pers 
                       ON MAT_CODPER=snp_pers.PER_CODIGO
                    LEFT JOIN snp_fcur 
                       ON MAT_CODCUR=snp_fcur.FCU_COD
                    LEFT JOIN snp_asig 
                       ON MAT_CODASI=snp_asig.ASIG_CODIGO
                    WHERE REG_ID = " . $valor ;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _eliminar($valor)
    {
        $dmlsentencia="DELETE FROM snp_notas_registros WHERE REG_ID= " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _actualizar($vl_descri, $vl_ingnot, $vl_porcen, $id)
    { 
     $dmlsentencia="update snp_notas_registros SET 
                    REG_DESCRI = '" . $vl_descri . "',
                    REG_INGNOT = " . $vl_ingnot . ", 
                    REG_PORCEN = " . $vl_porcen . " 
                    WHERE REG_ID=" . $id;
     $registros = $this->db->query($dmlsentencia);
     return $registros;
 }

    public function _insertar_notas($not_nota, $not_nmatri, $not_regist)
    {      
        $fecha_actual = date('Y-m-d H:i:s'); 
        $dmlsentencia="insert into snp_notas(NOT_FECHA,  NOT_NMATRI, NOT_NOTA, NOT_REGIST) 
                       values('" . $fecha_actual . "'," 
                                 . $not_nmatri . ",'" 
                                 . $not_nota . "'," 
                                 . $not_regist .")";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _actualizar_notas($not_nota, $not_nmatri, $not_regist)
    { 
    $fecha_actual = date('Y-m-d H:i:s');
     $dmlsentencia="update snp_notas SET 
                    NOT_FECHA = '" . $fecha_actual . "',
                    NOT_NOTA = '" . $not_nota . "'  
                    WHERE NOT_NMATRI = " . $not_nmatri . " 
                      AND NOT_REGIST = " . $not_regist ;
     $registros = $this->db->query($dmlsentencia);
     return $registros;
    }
    public function _consultar_notas($not_nmatri, $not_regist)
    {
        $dmlsentencia="SELECT * FROM snp_notas 
                       WHERE NOT_NMATRI = " . $not_nmatri . " 
                         AND NOT_REGIST = " . $not_regist ;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }


}