
<?php require ("header2.php"); ?>
<body>
<div id="box0">
<div style="border:1px solid black;width:770px;height:450px;overflow:scroll;">
<?php
require("conexion.php");
$result = mysql_query("SELECT * FROM downstreams");
echo "<table width='auto' border='0' cellspacing='0' cellpadding='0'>
<tr>
<th>Plataforma</th>
<th>#</th>
<th>Nodo</th>
<th>Colonia</th>
<th>CH14</th>
<th>CH15</th>
<th>CH99</th>
<th>CH98</th>
<th>CH16</th>
<th>Retorno</th>
</tr>";

while($row = mysql_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" . $row['plataforma'] . "</td>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['nodo'] . "</td>";
echo "<td>" . $row['colonia'] . "</td>";
echo "<td>" . $row['ch14'] . "</td>";
echo "<td>" . $row['ch15'] . "</td>";
echo "<td>" . $row['ch99'] . "</td>";
echo "<td>" . $row['ch98'] . "</td>";
echo "<td>" . $row['ch16'] . "</td>";
echo "<td>" . $row['retorno'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysql_close($con);
?>
</div>
<br>
<?php
echo "Nodo ID: ",$_GET['id'];
?>
<select name="id"type="number">
<option><?php echo $_POST['id'];?></option>
</select>
<br><br>
<a  href="../crc/docs/update09-04-14Downstream.pdf"><input type="submit" name="Submit" id="btregistro" value="Descargar"></a>
</div>
<?php require ("footer.php"); ?>
