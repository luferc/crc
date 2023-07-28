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
	$query = "SELECT * FROM downstreams WHERE colonia like ".sqlValue($criterio."%", "text")." ORDER BY colonia ASC";
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
   <th>Forward</th>
   <th>Narrowcast</th>
   <th>Upstream</th>
   <th>SST</th>
   <th>ADC</th>
   <th>Plataforma</th>
   <th>LastUpdate</th>
   <th>Actions</th>
  </tr>

  <?php while ($rsAlu = mysql_fetch_assoc($queAlu)) { ?>
  <tr class="indicador">
    <td><?php echo $rsAlu['id']; ?></td>
    <td><?php echo $rsAlu['interface']; ?></td>
    <td><?php echo $rsAlu['qam']; ?></td>
    <td><?php echo $rsAlu['nodo']; ?></td>
    <td><?php echo $rsAlu['colonia']; ?></td>

<!-- ##################### FORWARD   ##### -->
    <td><?php echo 
       'ch03='.$rsAlu['ch03'].'<br>'.
       'ch94='.$rsAlu['ch94'].'<br>'.
       'RX nodo ATT='.$rsAlu['rxnodoatt'].'<br>'.
       'offset TX='.$rsAlu['offset'].'<br>'.
       'TX crc ATT='.$rsAlu['txattop'].'<br>'
        ; ?>
	</td>
<!-- ##################### NARROWCAST   ##### -->
    <td><?php echo 
       'DSFAM= '.$rsAlu['dsfam'].'<br>'.
       'ch14= '.$rsAlu['ch14'].' => '.'mer= '.$rsAlu['mer14'].'<br>'.
       'ch15= '.$rsAlu['ch15'].' => '.'mer= '.$rsAlu['mer15'].'<br>'.
       'ch98= '.$rsAlu['ch98'].' => '.'mer= '.$rsAlu['mer98'].'<br>'.
       'ch99= '.$rsAlu['ch99'].' => '.'mer= '.$rsAlu['mer99'].'<br>'
        ; ?>
	</td>
<!-- ##################### UPSTREAM   ##### -->
    <td><?php echo 
       'P.O.= '.$rsAlu['po'].' => '.'OP-ATT= '.$rsAlu['poatt'].'<br>'.
       'TX-nodo-ATT= '.$rsAlu['txnodoatt'].'<br>'.
       'RX-crc-ATT= '.$rsAlu['rxatt'].'<br>'.
       'USFAM= '.$rsAlu['usfam'].'<br>'.
       'SNR38mhz= '.$rsAlu['snr38mhz'].' => '.'TX38mhz= '.$rsAlu['txnodo38mhz'].'<br>'.
       'SNR31mhz= '.$rsAlu['snr31mhz'].' => '.'TX31mhz= '.$rsAlu['txnodo31mhz'].'<br>'.
       'SNR25mhz= '.$rsAlu['snr25mhz'].' => '.'TX25mhz= '.$rsAlu['txnodo25mhz'].'<br>'
        ; ?>
	</td>
<!-- ##################### SST       ##### -->

    <td><?php echo
	 $rsAlu['sst'].'<br>'.
	 'SSTFAM= '.$rsAlu['sstfam']
	; ?>
	</td>

<!-- ########################################################## -->
    <td><?php echo $rsAlu['']; ?></td>
    <td><?php echo
	'Modelo: '.$rsAlu['modelo'].'<br>'.
	'Plataforma: '.$rsAlu['plataforma'].'<br>'.
	 'TXLM= '.$rsAlu['tipotx']
	; ?>
	</td>

<td><?php echo $rsAlu['last_update']; ?></td>
<!-- ######################## SELECT MODIFICA   ##### -->
    <td>
	<form action="updates-nodo.php" method="post">
	<input type="radio" name="id" value="<?php echo $rsAlu['id']; ?>" checked>
	<input type="image" src="../crc/imag/edit.png" alt="Submit" width=20 height=20">
	</form>
  </td>

<!--    <td><a class="activator"id="activator"href="#"onclick="javascript:window.open('detalle.php', 'noimporta', 'width=800, height=550, scrollbars=NO')">Detalle ></a></td> -->

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

