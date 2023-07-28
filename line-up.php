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
<?php
require("conexion.php");
require("funciones.php");

$criterio = getParam($_GET["criterio"], "");
$total = 0;
if ($criterio != "") {
  $query = "SELECT * FROM basico WHERE senal like ".sqlValue($criterio."%", "text", "radio")." ORDER BY id ASC";
  $queAlu = mysql_query($query, $conexion);
  $total = mysql_num_rows($queAlu);
}
?>
<?php require ("header.php"); ?>
<body>
<?php require ("container-header.php"); ?>
<?php require ("container-menu.php"); ?>
<div id="content">
    <div class="pagename">
<?php
echo strtoupper("::Line-Up/Sistema:Pto. Vallarta:: update:31-julio-2015");
?>
    </div>
</div>
<!-- 
<div id="box2">
<div class="img">
  <a  target="_blank" href="../crc/docs/LINE-UP-VALLARTA BASICO.pdf">
  <img src="../crc/imag/tv.png" alt="Básico" width="20" height="20">

  <div class="desc">TV Básico PDF</div>  </a>
</div>
<div class="img">
  <a  target="_blank" href="../crc/docs/LINE-UP-VALLARTA DIGITAL.pdf">
  <img src="../crc/imag/tv.png" alt="Digital" width="20" height="20">

  <div class="desc">TV Digital PDF</div> </a>
</div>
<div class="img">
  <a  target="_blank" href="../crc/docs/LINE-UP-VALLARTA SEÑAL AEREA.pdf">
  <img src="../crc/imag/tv.png" alt="Aerea" width="20" height="20">

  <div class="desc">TV Aerea PDF</div> </a>
</div>
</div>
-->
<ul>
<li>Legacy: </li>
<li><a href="line-up.php"> Basico</a></li>
<li><a href="line-up-canalB.php"> (#)</a></li>
<li>|</li>
<li><a href="line-up-digi.php"> Digital</a></li>
<li><a href="line-up-canalD.php"> (#)</a></li>
<li>|</li>
<li>izzi: </li>
<li><a href="#"> Digital</a></li>
<li><a href="#"> (#)</a></li>
<li>|</li>
<li><a href="espectro.php">Espectro</a></li>
</ul>
<!-- <form id="frbuscar" name="frbuscar" method="get" action="">
<input name="criterio" type="text" id="criterio" size="25" value="<?php echo $criterio; ?>" /> &nbsp;
<input type="submit" id="btregistro" value="Buscar" />
</form> -->

<div id="content">
<section class="webdesigntuts-workshop">
        <form id="frbuscar" name="frbuscar" method="get" action=""> 
                <input name="criterio" type="text" id="criterio" size="25" placeholder="Ingresar consulta" value="<?php echo $criterio; ?>" />  
    <button>Search</button>
  </form>
</section>
</div>
<div id="box0">
<div style="width:auto;height:475px;overflow:scroll;">
<!-- ///////////////////////////////////////////////////////////// -->
<!-- Este codigo es para mostrar el resultado de la busqueda de datos -->
<?php if ($total > 0) { ?>
<p><em>Total de Resultados: <?php echo $total; ?></em></p>
<table>
  <tr>
   <th>Frecuencia</th>
   <th>Canal</th>
   <th>Categoría</th>
   <th>Señal</th>
   <th>Programador</th>
   <th>Equipo</th>
   <th>UA</th>
   <th>Servicio</th>
   <th>SAP</th>
  </tr>
  <?php while ($rsAlu = mysql_fetch_assoc($queAlu)) { ?>
  <tr class="indicador">
    <td><?php echo $rsAlu['frecuencia']; ?></td>
    <td><?php echo $rsAlu['canal']; ?></td>
    <td><?php echo $rsAlu['categoria']; ?></td>
    <td><?php echo $rsAlu['senal']; ?></td>
    <td><?php echo $rsAlu['programador']; ?></td>
    <td><?php echo $rsAlu['equipo']; ?></td>
    <td><?php echo $rsAlu['ua']; ?></td>
    <td><?php echo $rsAlu['servicio']; ?></td>
    <td><?php echo $rsAlu['sap']; ?></td>
  </tr>
  <?php } ?>
</table>
<?php } ?>
<p>&nbsp;</p>
<!-- ///////////////////////////////////////////////////////////// -->
</div>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>

