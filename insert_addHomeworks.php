<?php
/**
 * UserInfo.php
 *
 * This page is for users to view their account information
 * with a link added for them to edit the information.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/classes/session.php");
?>
<?php require ("header.php"); ?>
<meta http-equiv="Refresh" content="7;url=homeworks_CRC.php">
<body>
<div id="boxHomeWork">
	<?php
/**
 * The user is already logged in, not allowed to register.
 */
if($session->logged_in){
 
?>
<header>

</header>
<?php
$con = mysql_connect("localhost","root","231044");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("crc", $con);


  //hacemos una consulta para ver nuestro numero de folio 
 $folio_consulta="SELECT folio_reg_id  FROM notificador";
  $resultado=mysql_query($folio_consulta,$con);
  
  while ($mostrar=mysql_fetch_array($resultado))
    {
    $folio_reg_id=$mostrar['folio_reg_id'];
    }
      if (@$folio_reg_id=="")//si el folio esta en 0 o vacio entonces valdra xcantidad
        {
        $folio_reg_id=30000;
        }
        else {$folio_reg_id++;} // si vale por lo menos uno sumale uno

if (!mysql_query($folio_consulta,$con))
  {
  die('<code>Error FOLIOS!!!</code> ' . mysql_error());
  }        

$sql1="INSERT INTO notificador (titulo, StartDay, StartMonth, StartYear, EndDay, EndMonth, EndYear, total_dias, observacion, crc_id, folio_reg_id, ip, username, fecha_registro, status)
VALUES
('$_POST[titulo]','$_POST[StartDay]','$_POST[StartMonth]','$_POST[StartYear]','$_POST[EndDay]','$_POST[EndMonth]','$_POST[EndYear]','$_POST[total_dias]','$_POST[observacion]','$_POST[crc_id]','$folio_reg_id','$_SERVER[REMOTE_ADDR]','$_SESSION[username]',NOW(), '$_POST[status]')";


$sql2 = "UPDATE grupoCRC SET status_actividad='iniciada' WHERE crc_nombre='$_POST[crc_id]'";

$sql3 = "SELECT * FROM notificador";


echo "Registro almacenado correctamente <img src='../crc/imag/ok.gif'width=20 height=20> <br/>";
    
    echo "<br />";  
    printf("FOLIO: %d\n", mysql_insert_id($con). $folio_reg_id);
    echo "<br />";  
    
echo "<table width='auto' border='0' cellspacing='0' cellpadding='0'>";
  echo "<tr>";
//  echo "<th class='stl1'>Folio</th>";
   echo "<th class='stl1'>titulo</th>";
   echo "<th class='stl1'>Inicio</th>";
   echo "<th class='stl1'>Total_dias</th>";
   echo "<th class='stl1'>status</th>";
   echo "<th class='stl1'>Hub</th>";
  
  echo "<tr class='indicador'>";
   // echo "<td class='stl1'>$folio_reg_id</td>";
    echo "<td class='stl1'>$_POST[titulo]</td>";
    echo "<td class='stl1'>$_POST[StartDay].$_POST[StartMonth].$_POST[StartYear]</td>";
    echo "<td class='stl1'>$_POST[total_dias]</td>";
    echo "<td class='stl1'>$_POST[observacion]</td>";
    echo "<td class='stl1'>$_POST[status]</td>";
  echo "</tr>";


if (!mysql_query($sql1,$con))
  {
  die('<code>Error data insert!!!</code> ' . mysql_error());
  }

if (!mysql_query($sql2,$con))
  {
  die('<code>Error update!!!</code> ' . mysql_error());
  }

  if (!mysql_query($sql3,$con))
  {
  die('<code>Error slect!!!</code> ' . mysql_error());
  }

mysql_close($con);
?> 

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>