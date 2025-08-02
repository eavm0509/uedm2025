<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_materias
{   private $db;
    public $vl_id;
    public $vl_codcur;
    public $vl_codper;
    public $vl_codasi;
    public $vl_areid;
    public $vl_tipo;
    public $vl_orden;
    public $vl_resalt;
    public $vl_oculta;
    public $vl_ambito;
    public $vl_ponder;
    public $vl_destreza;
    public $vl_nhoras;
    public $vl_observ;
    
    public function __construct()
    {
        $this->vl_id=0;
        $this->vl_codcur=0;
        $this->vl_codper=0;
        $this->vl_codasi=0;
        $this->vl_areid=0;
        $this->vl_tipo=0;
        $this->vl_orden=0;
        $this->vl_resalt=0;
        $this->vl_oculta=0;
        $this->vl_ambito=0;
        $this->vl_ponder=0;
        $this->vl_destreza=0;
        $this->vl_nhoras=0;
        $this->vl_observ='';
        $this->db = (new Conexion())->getConexion();
    }
    public function _insertar($vl_codcur, $vl_codper,$vl_codasi, $vl_areid,$vl_tipo, $vl_orden,
    $vl_resalt, $vl_oculta,$vl_ambito, $vl_ponder,$vl_destreza,$vl_nhoras,$vl_observ){
        
        $dmlsentencia="insert into snp_mate(MAT_CODCUR,MAT_CODPER,MAT_CODASI,MAT_AREID,MAT_TIPO,MAT_ORDEN,
        MAT_RESALT,MAT_OCULTA,MAT_AMBITO,MAT_PONDER,MAT_DESTREZA,MAT_NHORAS,MAT_OBSERV)
         values(" . $vl_codcur . ",
                " . $vl_codper . ",
                " . $vl_codasi . ",
                " . $vl_areid . ",
                " . $vl_tipo . ",
                " . $vl_orden . ",
                " . $vl_resalt . ",
                " . $vl_oculta . ",
                " . $vl_ambito . ",
                " . $vl_ponder . ",
                " . $vl_destreza . ",
                " . $vl_nhoras . ",
                '". $vl_observ . "')";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _consultartodo($valor){
        
        if($valor=='')
        {
            $dmlsentencia="select * from snp_mate";
        }
        else
        {
            $dmlsentencia="select * from snp_mate where MAT_NOMBRE like '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _consultartodovista($valor){
            
            if($valor=='')
            {
                $dmlsentencia="select * from vis_materias";
            }
            else
            {
                $dmlsentencia="select * from vis_materias where ASIG_NOMBRE like '%".$valor."%' 
                                OR PER_APENOM like '%".$valor."%' 
                                OR FCU_DESCRI like '%".$valor."%' 
                                OR ARE_NOMBRE like '%".$valor."%'" ;
            }
            $registros = $this->db->query($dmlsentencia);
            return $registros;
        }

    public function _consultarcodigo_person_vista($valor){
        
        $dmlsentencia="SELECT * FROM vis_materias WHERE PER_CODIGO = " . $valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo_materi_vista($valor){
        
        $dmlsentencia="SELECT * FROM vis_materias WHERE MAT_CODIGO = " . $valor ;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor){
        
        $dmlsentencia="SELECT * FROM snp_mate WHERE MAT_CODIGO = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }



    public function _eliminar($valor){
        
        $dmlsentencia="DELETE FROM snp_mate WHERE MAT_CODIGO= " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _actualizar($vl_codcur, $vl_codper,$vl_codasi, $vl_areid,$vl_tipo, $vl_orden,
    $vl_resalt, $vl_oculta,$vl_ambito, $vl_ponder,$vl_destreza,$vl_nhoras,$vl_observ,$id)
    { 
     
     $dmlsentencia="UPDATE snp_mate SET  
                    MAT_CODCUR = " . $vl_codcur . " , 
                    MAT_CODPER = " . $vl_codper . ", 
                    MAT_CODASI = " . $vl_codasi . ", 
                    MAT_AREID  = " . $vl_areid . ",
                    MAT_TIPO = " . $vl_tipo . ",
                    MAT_ORDEN = " . $vl_orden . ",
                    MAT_RESALT = " . $vl_resalt . ",
                    MAT_OCULTA = " . $vl_oculta . ",
                    MAT_AMBITO = " . $vl_ambito . ", 
                    MAT_PONDER = " . $vl_ponder . ",
                    MAT_DESTREZA = " . $vl_destreza . ",
                    MAT_NHORAS = " . $vl_nhoras . ",
                    MAT_OBSERV = '" . $vl_observ .  "'
                    WHERE MAT_CODIGO=" . $id;
     $registros = $this->db->query($dmlsentencia);
     return $registros;
 }

}
?>