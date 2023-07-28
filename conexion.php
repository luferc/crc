<?php
$conexion = mysql_connect("localhost", "root", "231044") or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db("crc", $conexion);
?>
