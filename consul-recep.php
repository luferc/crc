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

<!-- Codigo para busqueda-->
<?php
require("conexion.php");
require("funciones.php");

$criterio = getParam($_GET["criterio"], "");
$total = 0;
if ($criterio != "") {
	$query = "SELECT * FROM receptores WHERE modelo like ".sqlValue($criterio."%", "text", "radio")." ORDER BY modelo ASC";
	$queAlu = mysql_query($query, $conexion);
	$total = mysql_num_rows($queAlu);
}
?>
<!-- \\\\\\\\\\\\\\\\\\\\\\\\ -->
<?php require ("header.php"); ?>
<body>
<?php require ("container-header.php"); ?>
<?php require ("container-menu.php"); ?>
<div id="content">
    <div class="pagename">
<?php
echo strtoupper("Address: colombia #1418, puerto vallarta, Latitude: 20.6218° Longitude: -105.2294°");
?>
    </div>
</div>

<!-- MULTI OPCION BUSQUEDA MEDIANTE LINKS -->
<ul>
<li>Buscar por: </li>
<li><a href="consul-recep.php"> Receptor</a></li>
<li>|</li>
<li><a href="consul-senal.php"> Señal</a></li>
<li>||</li>
<li><a href="updates-senal.php"> Updates</a></li>
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
<!-- buscador de coolroms
<form name="form1" method="post" action="/srv" id="searchform">
        <div><input name="field" type="radio" value="rom" checked selected>
        Roms</div>
        <div><input type="radio" name="field" value="emulator">
        Emulators</div>
        <div><input name="searchquery" type="text" size="15" id="searchtext"><input type="hidden" name="search" value="1"> </div><div><input name="Submit" type="submit" value="Search" id="searchbutton"></div>
	</form>
-->
<div id="box0">
<div style="width:auto;height:475px;overflow:scroll;">
<!-- ///////////////////////////////////////////////////////////// -->
<!-- Este codigo es para mostrar el resultado de la busqueda de datos -->
<?php if ($total > 0) { ?>
<p><em>Total de Resultados: <?php echo $total; ?></em></p>
<table>
  <tr>
   <th>#</th>
   <th>Estatus</th>
   <th>Modelo</th>
   <th>UA</th>
   <th>Señal</th>
   <th>PGM</th>
   <th>Satelite</th>
   <th>Parametros</th>
   <th>LastUpdate</th>
   <th>Actions</th>
  </tr>
  <?php while ($rsAlu = mysql_fetch_assoc($queAlu)) { ?>
  <tr class="indicador">
    <td><?php echo $rsAlu['id_receptor']; ?></td>
    <td><?php echo $rsAlu['estatus']; ?></td>
    <td><?php echo $rsAlu['modelo']; ?></td>
    <td><?php echo $rsAlu['ua']; ?></td>
    <td><?php echo $rsAlu['senal']; ?></td>
    <td><?php echo $rsAlu['pgm']; ?></td>
    <td><?php echo $rsAlu['sat']; ?></td>
    <td><?php echo $rsAlu['parametros']; ?></td>
    <td><?php echo $rsAlu['last_update']; ?></td>
	<td>
	<form action="updates-senal.php" method="post">
	<input type="radio" name="id_receptor" value="<?php echo $rsAlu['id_receptor']; ?>" checked>
	<input type="image" src="../crc/imag/edit.png" alt="Submit" width=20 height=20">	
	</form>
	</td>
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
