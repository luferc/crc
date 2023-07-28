<?php require ("header.php"); ?>
<meta http-equiv="Refresh" content="1;url=nuevo.php">
<body>

<div id="content">
    <div class="pagename">
<?php
echo strtoupper("alta de receptor satelital db crc vallarta");
?>
    </div>
</div>
<!--
<a href="nuevo.php"> <img src="../crc/imag/undo.png"width=25 height=25 border=0 alt="back"></a>
-->
<div id="box1">
<?php
$con = mysql_connect("localhost","root","231044");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("crc", $con);

$sql="INSERT INTO receptores (estatus, modelo, ua, tid, senal, pgm, sat, parametros, id_receptor)
VALUES
('$_POST[estatus]','$_POST[modelo]','$_POST[ua]','$_POST[tid]','$_POST[senal]','$_POST[pgm]','$_POST[sat]','$_POST[parametros]','$id_receptor')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "El registro se almaceno correctamente  
<br />
1 record<img src='../crc/imag/ok.gif'width=25 height=25>";

mysql_close($con);
?> 
</div>

