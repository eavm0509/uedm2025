<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_paralelos
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
    public function _insertar($vl_nombre, $vl_observ)
{
    $stmt = $this->db->prepare("INSERT INTO snp_para (PAR_NOMBRE, PAR_OBSERV) VALUES (:nombre, :observ)");
    return $stmt->execute([
        ':nombre' => $vl_nombre,
        ':observ' => $vl_observ
    ]);
}

    
    public function _consultartodo($valor){
        if($valor=='')
        {
            $dmlsentencia="SELECT * FROM snp_para";
        }
        else
        {
            $dmlsentencia="SELECT * FROM  snp_para WHERE PAR_NOMBRE LIKE '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor)
    {
        $dmlsentencia="SELECT * FROM snp_para WHERE PAR_CODIGO = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

   public function _eliminar($valor)
{
    $stmt = $this->db->prepare("DELETE FROM snp_para WHERE PAR_CODIGO = :id");
    return $stmt->execute([':id' => $valor]);
}


    public function _actualizar($nombre, $observ, $id)
{
    $stmt = $this->db->prepare("UPDATE snp_para SET PAR_NOMBRE = :nombre, PAR_OBSERV = :observ WHERE PAR_CODIGO = :id");
    return $stmt->execute([
        ':nombre' => $nombre,
        ':observ' => $observ,
        ':id' => $id
    ]);
}


}