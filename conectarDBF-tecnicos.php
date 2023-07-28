<div style="width:auto;height:475px;overflow:scroll;">
<?php
echo "<table width='auto' border='0' cellspacing='0' cellpadding='0'>
<th>#</th>
<th>TECNICO</th>
<th>MAC</th>
<th>TELEFONO</th>
<th>UPDATE</th>
</table";

$db = dbase_open('./docs/tecnicos.dbf', 0); //dbase_open — Abre una base de datos en 0 solo lectura.

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
</tr>
</table"
;


}//fin ciclo for.

}
?> 
</div>
