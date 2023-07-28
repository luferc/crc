<?php
/**
 * Register.php
 * 
 * Displays the registration form if the user needs to sign-up,
 * or lets the user know, if he's already logged in, that he
 * can't register another name.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
include("include/classes/session.php");
?>

<?php
/**
 * The user is already logged in, not allowed to register.
 */
if($session->logged_in){
 
?>

<?php require ("header.php"); ?>
<body>
<?php require ("container-header.php"); ?>
<?php require ("container-menu.php"); ?>
<div id="content">
    <div class="pagename">
<?php
echo strtoupper("::detalle de racks planta alta hub vallarta::");
?>
    </div>
</div>

  <div class="package-description2">
    <strong>Sumario</strong> : Distribución de nodos en combinadora SST    <br />
    <strong>Opciones de visualización</strong> <a  target="_blank" href="../crc/docs/Combinadora-SST_Vallarta.pdf">  <img src="../crc/imag/info.gif" alt="Info" width="auto" height="auto"> PDF</a>
     <?php
// Muestra, p.ej., fichero.txt: 1024 bytes
    $file = "../crc/docs/Combinadora-SST_Vallarta.pdf";
    $fsize = filesize($file);
    echo '('.($fsize) . 'bytes)';
    ?>
    <br />
    
    <?php 

$db = dbase_open('./docs/racks-PB.dbf', 0); //dbase_open — Abre una base de datos en 0 solo lectura.

if ($db) {
$numero_registros = dbase_numrecords($db);
for ($i = 1; $i <= $numero_registros; $i++) {
// procesar cada uno de los registros
$temp = dbase_get_record($db, $i);
$id_ch=$temp[0];
echo"
  <div class='img'>
  <div class='desc-freq'>
  <form action='check-ch.php' method='POST'>
  <table>
  <td>
  <font size='0'color='#00CC00'>$id_ch</font>
  <input type='radio' name='ch' value='$id_ch' checked>
  <font size='0'>$temp[1]</font>
  </td>
  <td><input type='image' src='../crc/imag/plus.png' alt='Submit' width=7 height=7'>
  <font size='0'>$temp[2]</font>
  </td>
  </table>
  </form>

  </div>
     </div>
  ";  //fin de echo.

}//fin ciclo for.

}//fin de condición.

?>

</div>

<div class='main-screenshot'>
    <a target="_blank" href="../crc/imag/CRCVTA-DW.png">
  <img src="../crc/imag/CRCVTA-DW.png" alt="Trilithics" width="450" height="500"> </a>
  </div>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>
