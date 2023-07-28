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
	$query = "SELECT * FROM downstreams WHERE nodo like ".sqlValue($criterio."%", "text")." ORDER BY colonia ASC";
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
echo strtoupper("Consulta de transmision por nodo en retorno");
?>
    </div>
</div>

<ul>
<li>Buscar por: </li>
<li><a href="consultas.php">Colonia</a></li>
<li>|</li>
<li><a href="consultas-interface-downstreams.php">Interface</a></li>
<li>|</li>
<li><a href="consultas-nodo-downstreams.php">Nodo</a></li>
<li>|</li>
<li><a href="consultas-qam-downstreams.php">QAM</a></li>
<li>||</li>
<li><a href="inicio.php">Updates</a></li>
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
<table width="auto" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <th>#</th>
   <th>Interface</th>
   <th>QAM</th>
   <th>Nodo</th>
   <th>Colonia</th>
   <th>ch14</th>
   <th>ch15</th>
   <th>ch98</th>
   <th>ch99</th>
   <th>ch16</th>
   <th>Retorno</th>
   <th>Plataforma</th>
   <th>Ver</th>
  </tr>
  <?php while ($rsAlu = mysql_fetch_assoc($queAlu)) { ?>
  <tr class="indicador">
    <td><?php echo $rsAlu['id']; ?></td>
    <td><?php echo $rsAlu['interface']; ?></td>
    <td><?php echo $rsAlu['qam']; ?></td>
    <td><?php echo $rsAlu['nodo']; ?></td>
    <td><?php echo $rsAlu['colonia']; ?></td>
    <td><?php echo $rsAlu['ch14']; ?></td>
    <td><?php echo $rsAlu['ch15']; ?></td>
    <td><?php echo $rsAlu['ch98']; ?></td>
    <td><?php echo $rsAlu['ch99']; ?></td>
    <td><?php echo $rsAlu['ch16']; ?></td>
    <td><?php echo $rsAlu['retorno']; ?></td>
    <td><?php echo $rsAlu['plataforma']; ?></td>
    <td><a class="activator"id="activator"href="#"onclick="javascript:window.open('detalle.php', 'noimporta', 'width=800, height=550, scrollbars=NO')">Detalle ></a></td>
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
