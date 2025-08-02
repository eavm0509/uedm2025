<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_paginalocal = "localhost";
$database_paginalocal = "4532449_school2025";
$username_paginalocal = "root";
$password_paginalocal = "";
// $paginalocal = mysql_connect($hostname_paginalocal, $username_paginalocal, $password_paginalocal) or trigger_error(mysql_error(),E_USER_ERROR); 

try {
    $pdo = new PDO('mysql:host=localhost;dbname=4532449_school2025;charset=utf8',$username_paginalocal, $password_paginalocal );
    $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    print "¡Error en las credenciales al establecer una conexión con la base de datos!";
    die();
     }	

?>