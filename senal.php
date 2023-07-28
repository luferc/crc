<?php
$criterio = getParam($_GET["criterio"], "");
$total = 0;
if ($criterio != "") {
	$query = "SELECT * FROM receptores WHERE senal like ".sqlValue($criterio."%", "text", "radio")." ORDER BY senal ASC";
	$queAlu = mysql_query($query, $conexion);
	$total = mysql_num_rows($queAlu);
}

?>
