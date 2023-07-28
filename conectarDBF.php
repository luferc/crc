<div style="width:auto;height:475px;overflow:scroll;">
<?php
echo "<table width='auto' border='0' cellspacing='0' cellpadding='0'>
<th>#</th>
<th>TX</th>
<th>RX</th>
<th>R1</th>
<th>UPS</th>
<th>R2</th>
<th>TOTAL</th>
<th>31MHz</th>
<th>38MHz</th>
<th>SNR1</th>
<th>SNR2</th>
<th>Nodo</th>
<th>P.O.</th>
<th>Interfaz</th>
<th>MAC</th>
<th>Tecnico</th>
<th>Telefono</th>
<th>Fecha</th>
</table";

$db = dbase_open('./docs/TABLA DE BALANCEO.dbf', 0); //dbase_open — Abre una base de datos en 0 solo lectura.

if ($db) {
$numero_registros = dbase_numrecords($db);
for ($i = 1; $i <= $numero_registros; $i++) {
// procesar cada uno de los registros
$temp = dbase_get_record($db, $i);


echo 
"<table width='auto' border='0' cellspacing='0' cellpadding='0'>
<tr>
<td>$temp[0]</td>
<td>$temp[1]</td>
<td>$temp[2]</td>
<td>$temp[3]</td>
<td>$temp[4]</td>
<td>$temp[5]</td>
<td>$temp[6]</td>
<td>$temp[7]</td>
<td>$temp[8]</td>
<td>$temp[9]</td>
<td>$temp[10]</td>
<td>$temp[11]</td>
<td>$temp[12]</td>
<td>$temp[13]</td>
<td>$temp[14]</td>
<td>$temp[15]</td>
<td>$temp[16]</td>
<td>$temp[17]</td>
</tr>
</table"
;


}//fin ciclo for.

}
?> 
</div>
