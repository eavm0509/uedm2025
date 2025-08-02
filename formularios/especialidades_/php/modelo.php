<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_especialidades
{   private $db;
    public $vl_id;
    public $vl_nombre;
    public $vl_titulo;
    public $vl_titulo1;
    public $vl_observ;
    
    public function __construct()
    {
        $this->vl_id="";
        $this->vl_nombre="";
        $this->vl_titulo="";
        $this->vl_titulo1="";
        $this->vl_observ="";
        $this->db = (new Conexion())->getConexion();
    }
    
    public function _consultartodo($valor){
       
        if($valor=='')
        {
            $dmlsentencia="select * from snp_espe";
        }
        else
        {
            $dmlsentencia="select * from snp_espe where ESP_NOMBRE like '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor){
        
        $dmlsentencia="SELECT * FROM snp_espe WHERE ESP_CODIGO = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _insertar($vl_nombre, $vl_titulo, $vl_titulo1, $vl_observ)
{
    $dmlsentencia = "INSERT INTO snp_espe (ESP_NOMBRE, ESP_TITULO, ESP_TITULO1, ESP_OBSERV)
                     VALUES ('" . $vl_nombre . "', '" . $vl_titulo . "', '" . $vl_titulo1 . "', '" . $vl_observ . "')";
    $registros = $this->db->query($dmlsentencia);
    return $registros;
}

public function _actualizar($id, $nombre, $titulo, $titulo1, $observ)
{
    $dmlsentencia = "UPDATE snp_espe
                     SET ESP_NOMBRE = '" . $nombre . "',
                         ESP_TITULO = '" . $titulo . "',
                         ESP_TITULO1 = '" . $titulo1 . "',
                         ESP_OBSERV = '" . $observ . "'
                     WHERE ESP_CODIGO = " . $id;
    $registros = $this->db->query($dmlsentencia);
    return $registros;
}

public function _eliminar($id)
{
    $dmlsentencia = "DELETE FROM snp_espe WHERE ESP_CODIGO = " . $id;
    $registros = $this->db->query($dmlsentencia);
    return $registros;
}

}
?>