<?php
require_once("conexion.php");
class _consultartodoclase_
{   private $db;
    public function __construct()
    {   
        $this->db = (new Conexion())->getConexion();
    }
    public function _limpiar_()
    {
        $dmlsentencia="delete  from snp_curs" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_curs AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);
    
        $dmlsentencia="delete  from snp_cicl" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_cicl AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);

        $dmlsentencia="delete  from snp_para" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_para AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);

        $dmlsentencia="delete  from snp_espe" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_espe AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);

        $dmlsentencia="delete  from snp_secc" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_secc AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);

        $dmlsentencia="delete  from snp_fcur" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_fcur AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);

        $dmlsentencia="delete  from snp_pers" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_pers AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);
        
        $dmlsentencia="delete  from snp_repr" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_repr AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);
        
        $dmlsentencia="delete  from snp_asig" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_asig AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);

        $dmlsentencia="delete  from snp_areas" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_areas AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);
        
        $dmlsentencia="delete  from snp_mate" ;
        $registros = $this->db->query($dmlsentencia);
        $dmlsentencia = "ALTER TABLE snp_mate AUTO_INCREMENT = 1";
        $registros = $this->db->query($dmlsentencia);




    }
    

}



// Verificar si el usuario confirmó el borrado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirmar']) && $_POST['confirmar'] === 'si') {
        $limpiar = new _consultartodoclase_();
        $limpiar->_limpiar_();
        echo "<p style='color: green;'>¡Datos eliminados y contador reiniciado!</p>";
    } else {
        echo "<p style='color: blue;'>Acción cancelada. No se realizaron cambios.</p>";
    }
} else {
    // Mostrar formulario de confirmación con dos botones
    ?>
    <h3 style="color: red;">¿Estás seguro de que deseas eliminar todos los registros de la tabla <code> todas</code>?</h3>
    <form method="POST">
        <button type="submit" name="confirmar" value="si" style="padding: 10px; background-color: red; color: white; border: none;">
            Sí, eliminar todo
        </button>
        <button type="submit" name="confirmar" value="no" style="padding: 10px; background-color: gray; color: white; border: none;" autofocus>
            No, cancelar
        </button>
    </form>
    <?php
}

?>