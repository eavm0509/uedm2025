<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
require_once("../../../conexion/conexion.php");
class clase_cursos
{   private $db;
    public $vl_id;
    public $vl_nombre;
    public $vl_observ;
   public function __construct()
    {   
        $this->vl_id="";
        $this->vl_nombre="";
        $this->vl_observ="";
        $this->db = (new Conexion())->getConexion();
    }
    public function _insertar($vl_nombre, $vl_observ)
{
    $dmlsentencia = "INSERT INTO snp_curs (CUR_NOMBRE, CUR_OBSERV)
                     VALUES ('" . $vl_nombre . "', '" . $vl_observ . "')";
    $registros = $this->db->query($dmlsentencia);
    return $registros;
}
    public function _consultartodo($valor){
       
        if($valor=='')
        {
            $dmlsentencia="SELECT * FROM snp_curs";
        }
        else
        {
            $dmlsentencia="SELECT * FROM  snp_curs WHERE CUR_NOMBRE LIKE '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor){
        
        $dmlsentencia="SELECT * FROM snp_curs WHERE CUR_CODIGO = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _actualizar($nombre, $observ, $id)
{
    $dmlsentencia = "UPDATE snp_curs
                     SET CUR_NOMBRE = '" . $nombre . "',
                         CUR_OBSERV = '" . $observ . "'
                     WHERE CUR_CODIGO = " . $id;
    $registros = $this->db->query($dmlsentencia);
    return $registros;
}

public function _eliminar($valor)
{
    $dmlsentencia = "DELETE FROM snp_curs WHERE CUR_CODIGO = " . $valor;
    $registros = $this->db->query($dmlsentencia);
    return $registros;
}
}