<?php require_once('../../Connections/paginalocal.php'); ?>

<?php
// Verifica si los datos fueron enviados correctamente por POST
if (!isset($_POST['txtclave']) || !isset($_POST['txtcodalu']) || empty($_POST['txtcodalu'])) {
    echo "<font face='arial' size='3' color='#0096c7'><b>POR FAVOR REVISE EL NOMBRE DEL ESTUDIANTE</b></font><br>";
    exit;
}

$codigoa = $_POST['txtclave'];
$codigo1 = $_POST['txtcodalu'];
if (!$codigo1) {
	echo "<font face=arial size ='3' color='#0096c7'><b>POR FAVOR REVISE EL NOMBRE DEL ESTUDIANTE </b></font>\n<br>";
	exit;
}
echo "<center>";
echo "<font face=arial size ='3' color='#0096c7'><b>ESTUDIANTE : " . $_POST['buscar_alumno'] . "</b></font>\n<br>";


if ($codigo1 == $codigoa) {
	// mysql_select_db($database_paginalocal, $paginalocal);

	//    $query_cont = "SELECT snp_cont.con_hastapen, snp_cont.con_hastanot, snp_cont.con_titul1, snp_cont.con_titul2, snp_cont.con_titul3 from snp_cont";
	//   $querycont=mysql_query($query_cont); 
	//   $row_cont =mysql_fetch_array($querycont);	


	$querycont = $pdo->query("SELECT snp_cont.con_hastapen, snp_cont.con_hastanot, snp_cont.con_titul1, snp_cont.con_titul2, snp_cont.con_titul3 from snp_cont");
	$row_cont = $querycont->fetch();

	$querycur = $pdo->query("SELECT snp_alum.alu_nmatri, snp_alum.alu_codcur, snp_fcur.fcu_cod, snp_curs.cur_codigo, snp_curs.cur_nombre as curso ,  snp_fcur.fcur_sec, snp_secc.sec_nombre as seccion, snp_fcur.fcu_tipcon, snp_fcur.fcu_cic, snp_cicl.cic_nomb as ciclo, snp_fcur.fcu_par, snp_para.par_nombre as paralelo, snp_fcur.fcu_esp, snp_espe.esp_nombre as especialidad  FROM snp_alum INNER join snp_fcur on snp_alum.alu_codcur = snp_fcur.fcu_cod left join snp_curs on snp_fcur.fcu_cur = snp_curs.cur_codigo left join snp_secc on snp_fcur.fcur_sec = snp_secc.sec_codigo left join snp_cicl on snp_cicl.cic_codi = snp_fcur.fcu_cic left join snp_para on snp_para.par_codigo=snp_fcur.fcu_par left join snp_espe on snp_espe.esp_codigo=snp_fcur.fcu_esp WHERE snp_alum.alu_nmatri=" . $codigoa . " ORDER BY alu_nmatri");
	//print_r($pdo->errorinfo());
	// $querycur=mysql_query($query_curso);

	$row_curso = $querycur->fetch();


	
	
    echo "<center>";
    echo  "<table  color='#333893' border='0' cellpadding='0' cellspacing='10'>";
    
    echo "<tr>";
    echo "<th>AÑO</th>";
    echo "<th>SECCIÓN</th>";
    echo "<th>CICLO</th>";
    echo "<th>PARALELO</th>";
    echo "<th>ESPECIALIDAD</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $row_curso['curso'] . "</td>";
    echo "<td>" . $row_curso['seccion'] . "</td>";
    echo "<td>" . $row_curso['ciclo'] . "</td>";
    echo "<td>" . $row_curso['paralelo'] . "</td>";
    echo "<td>" . $row_curso['especialidad'] . "</td>";
    echo "</tr>";
    echo "</table>";
	?>	


  <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Portal Estudiantil</title>
      <link rel="icon" href="../../js/css/ui-lightness/images/logo_uedm.png" type="image/x-icon">
      
  </head>
  <body>
      <style>
          body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #ffff;
  }
  
  .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      max-width: 1000px;
  }
  
  .welcome-panel {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      background: rgba(255, 255, 255, 0.9);
      padding: 0px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      width: 45%;
      text-align: center;
  }
  
  
  .welcome-image {
     
      top: 0;
      left: 0;
      width: 80%;
      height: 80%;
      object-fit: cover;
      border-radius: 10px;
    
  }
  
  
  .welcome-text {
     
      top: 50%;
      left: 50%;
     
     
  }
  
  .login-panel {
   background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      width: 50%;
      height: 320px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center; /* Centra verticalmente */
      align-items: center; /* Centra horizontalmente */
  }
  
  h1 {
      margin: 0;
      color: #101010;
  }
  
  h2 {
      margin: 0;
      color: #333;
  }
  
  button {
      background-color: #002fff;
      color: rgb(254, 254, 255);
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
  }
  
  button:hover {
      background-color: #000d5a;
  }
  
  .date-slider {
      display: flex;
      overflow: hidden;
      white-space: nowrap;
      margin-top: 20px;
  }
  
  .date-item {
      display: inline-block;
      padding: 10px;
      background: rgba(0, 21, 255, 0.733);
      margin-right: 10px;
      border-radius: 5px;
      text-align: center;
      min-width: 120px;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);

      .welcome-text span {
        color: #666; /* Cambia el color del texto a gris */
      }
      
      .welcome-text span:nth-child(2) {
        color: #0096c7; /* Cambia el color del segundo texto a azul */
      }
  }
  
      </style>
      <div class="container">
          
          <div class="login-panel">
          <div class="welcome-text">
                  <h1>Bienvenido</h1>
                  <h1>Portal Estudiantil</h1>
              </div>
          
              <p>Seleccione opción para continuar</p>

<!-- Botón Ficha de datos -->
<button id="btn-ficha-datos">Ficha de datos</button>
<script>
  document.getElementById("btn-ficha-datos").addEventListener("click", function() {
    var baseUrl = window.location.origin;
    var url = baseUrl + "/notas2024/Formularios/estudiantes/ficha.php?codiunico=<?php echo $codigoa; ?>";
    window.location.href = url;
  });
</script>

<!-- Botón Boletín de calificaciones -->
<button id="btn-boletin">Boletín de calificaciones</button>
<script>
  document.getElementById("btn-boletin").addEventListener("click", function() {
    var baseUrl = window.location.origin;
    var url = baseUrl + "/notas2024/boletin/index2.php?codiunico=<?php echo $codigo1; ?>";
    window.location.href = url;
  });
</script>

<!-- Nuevo botón Formar año nuevo 
<button id="btn-formar-ano-nuevo">Formar año nuevo</button>
<script>
  document.getElementById("btn-formar-ano-nuevo").addEventListener("click", function() {
    var baseUrl = window.location.origin;
    var url = baseUrl + "/notas2024/formaranio/formarnuevo.php";
    window.location.href = url;
  });
</script>-->

              
              

          </div>
  
          <div class="welcome-panel">
              <img src="../../js/css/ui-lightness/images/logo_uedm.png" class="welcome-image">
             
          </div>
      </div>
  </body>
  </html>
  

<?php

} else {
	echo "Contraseña Incorrecta. Intente nuevamente por favor";
}
//}
?>