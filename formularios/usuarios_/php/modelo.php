<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_usuarios
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
    public function _insertar($nombre, $tipo, $clave, $usuario, $observ, $codper)
{
    $sql = "INSERT INTO snp_user 
            (USE_APNO, USE_TIPO, USE_CLAV, USE_USER, USE_OBSERV, USE_CODPER)
            VALUES (:nombre, :tipo, :clave, :usuario, :observ, :codper)";

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_INT);
    $stmt->bindParam(':clave', $clave, PDO::PARAM_STR);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':observ', $observ, PDO::PARAM_STR);
    $stmt->bindParam(':codper', $codper, PDO::PARAM_INT);

    return $stmt->execute();
}


 public function _consultartodovista($valor){
        if($valor=='')
        {
            $dmlsentencia="SELECT * FROM vis_usurol";
        }
        else
        {
            $dmlsentencia="SELECT * FROM  vis_usurol WHERE USE_APNO LIKE '%".$valor."%' OR USE_USER LIKE '%" . $valor . "%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
     public function _consultarcodigovista($valor){
        
        $dmlsentencia="SELECT * FROM vis_usurol WHERE id = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultartodo($valor){
        
        if($valor=='')
        {
            $dmlsentencia="select * from snp_roles";
        }
        else
        {
            $dmlsentencia="select * from snp_roles where ROL_NOMBRE like '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultartodo1($valor){
        
        if($valor=='')
        {
            $dmlsentencia="select * from snp_user";
        }
        else
        {
            $dmlsentencia="select * from snp_user where USE_APNO like '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor){
        
        $dmlsentencia="SELECT * FROM snp_user WHERE USE_CODI = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _eliminar($valor) {
    $sql = "DELETE FROM snp_user WHERE USE_CODI = :valor";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':valor', $valor, PDO::PARAM_INT);
    return $stmt->execute();
}



    /*public function _actualizar($nombre, $observ, $id)
    { 
     
     $dmlsentencia="UPDATE snp_user SET USE_APNO = '" . $nombre . "', USE_TIPO = '" . $observ ."' WHERE USE_CODI=".$id;
     $registros = $this->db->query($dmlsentencia);
     return $registros;
 }*/
public function _actualizar_usuario_completo($codigo, $nombre, $tipo, $usuario, 
                $observacion, $claveHash, $actualizarClave, $percod)
{
    if ($actualizarClave) {
        $sql = "UPDATE snp_user SET 
                    USE_APNO = :nombre,
                    USE_TIPO = :tipo,
                    USE_USER = :usuario,
                    USE_OBSERV = :observacion,
                    USE_CLAV = :clave,
                    USE_CODPER = :percod 
                WHERE USE_CODI = :codigo";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':clave', $claveHash, PDO::PARAM_STR);
    } else {
        $sql = "UPDATE snp_user SET 
                    USE_APNO = :nombre,
                    USE_TIPO = :tipo,
                    USE_USER = :usuario,
                    USE_OBSERV = :observacion,
                    USE_CODPER = :percod
                WHERE USE_CODI = :codigo";
        $stmt = $this->db->prepare($sql);
    }

    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_INT);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':observacion', $observacion, PDO::PARAM_STR);
    $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
    $stmt->bindParam(':percod', $percod, PDO::PARAM_INT);

    return $stmt->execute();
}


     
/*public function _actualizar_usuario_completo($codigo, $nombre, $tipo, $usuario, $observacion, $claveHash, $actualizarClave) {
    $conexion = $this->conectar(); // Esto debe devolver un objeto PDO

    if ($actualizarClave) {
        $sql = "UPDATE usuarios SET 
                    USE_APNO = :nombre, 
                    USE_TIPO = :tipo, 
                    USE_USER = :usuario, 
                    USE_OBSERV = :observacion, 
                    USE_CLAV = :clave
                WHERE USE_CODI = :codigo";

        $stmt = $conexion->prepare($sql);
        return $stmt->execute([
            ':nombre'      => $nombre,
            ':tipo'        => $tipo,
            ':usuario'     => $usuario,
            ':observacion' => $observacion,
            ':clave'       => $claveHash,
            ':codigo'      => $codigo
        ]);
    } else {
        $sql = "UPDATE usuarios SET 
                    USE_APNO = :nombre, 
                    USE_TIPO = :tipo, 
                    USE_USER = :usuario, 
                    USE_OBSERV = :observacion
                WHERE USE_CODI = :codigo";

        $stmt = $conexion->prepare($sql);
        return $stmt->execute([
            ':nombre'      => $nombre,
            ':tipo'        => $tipo,
            ':usuario'     => $usuario,
            ':observacion' => $observacion,
            ':codigo'      => $codigo
        ]);
    }
}*/
}
?>