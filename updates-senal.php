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

<?php require("conexion.php");?>
<?php require ("header.php"); ?>
<body>
<?php require ("container-header.php"); ?>
<?php require ("container-menu.php"); ?>
<div id="content">
    <div class="pagename">
<?php
echo strtoupper("update item: ").$_POST['id_receptor'];
?>
    </div>
</div>
    <a class="activator"id="activator"href="#"onclick="javascript:window.open('nuevo.php', 'noimporta', 'width=600, height=600, scrollbars=NO')">add +</a>
<div id="box0">
<div style="width:auto;height:600px;overflow:scroll;">

<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<?php
include_once ("updates-senal-clase.php"); //incluimos las clases.
	$nointerno="";
	$estatus="";
	$marca="";
	$modelo="";
	$producid="";
	$producn="";
	$sn="";
	$rn="";
	$tid="";
	$acp="";
	$pe="";
	$services="";
	$ua="";
	$pgm="";
	$senal="";
	$programador="";
	$sat="";
	$parametros="";
	$id_receptor="";

if (isset($_GET['md']))//si el valor es modificar, este vine seteado (arreglo"establecido") y ejecuta el siguiente codigo:
{
  	$receptores=new Receptores($_GET['md']); // instancio la clase cliente pasandole el nro de cliente, de esta forma lo busca
	$nointerno=$receptores->getNOinterno();
	$estatus=$receptores->getEstatus();
	$marca=$receptores->getMarca();
	$modelo=$receptores->getModelo();
	$producid=$receptores->getProducid();
	$producn=$receptores->getProducn();
	$sn=$receptores->getSN();
	$rn=$receptores->getRN();
	$tid=$receptores->getTID();
	$acp=$receptores->getACP();
	$pe=$receptores->getPE();
	$services=$receptores->getServices();
	$ua=$receptores->getUA();
	$pgm=$receptores->getPGM();
	$senal=$receptores->getSenal();
	$programador=$receptores->getProgramador();
	$sat=$receptores->getSat();
	$parametros=$receptores->getParametros();
	$id_receptor=$receptores->getID_receptor(); //obtengo id
}
?>
<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->


<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<div style="width:auto;height:auto;overflow:scroll;">
<?php

// ****************************************************************************************************************************
// ****************************************************************************************************************************

/*
if (isset($_POST['submit'])&&!is_numeric($_POST['id_receptor'])) // si presiono el boton ingresar
{
	$receptores=new Receptores();
	//print_r($_POST);
	$receptores->setSenal($_POST['senal']); // setea los datos
	$receptores->setPGM($_POST['pgm']);	
	$receptores->setSat($_POST['sat']);
	$receptores->setParametros($_POST['parametros']);
	$receptores->setEstatus($_POST['estatus']);
	print " Consulta ejecutada: ". $receptores->insertReceptores(); // inserta y muestra el resultado
}
*/

// ****************************************************************************************************************************
// ****************************************************************************************************************************

if (isset($_POST['submit'])&&is_numeric($_POST['id_receptor'])) // si presiono el boton y es modificar
{
	$receptores=new Receptores($_POST['id_receptor']);  // instancio la clase pasandole el nro de cliente para cargar los datos
		$receptores->setNOinterno($_POST['nointerno']);
		$receptores->setEstatus($_POST['estatus']);
		$receptores->setMarca($_POST['marca']);
		$receptores->setModelo($_POST['modelo']);
		$receptores->setProducid($_POST['producid']);
		$receptores->setProducn($_POST['producn']);
		$receptores->setSN($_POST['sn']);
		$receptores->setRN($_POST['rn']);
		$receptores->setTID($_POST['tid']);
		$receptores->setACP($_POST['acp']);
		$receptores->setPE($_POST['pe']);
		$receptores->setServices($_POST['services']);
		$receptores->setUA($_POST['ua']);
		$receptores->setPGM($_POST['pgm']);
		$receptores->setSenal($_POST['senal']);
		$receptores->setProgramador($_POST['programador']);
		$receptores->setSat($_POST['sat']);
		$receptores->setParametros($_POST['parametros']);
		print " Consulta ejecutada: ". $receptores->updateReceptores(); // inserta y muestra el resultado
		$receptores="INSERT INTO receptores(last_update) VALUES (NOW())";
}


/*
if (isset($_GET['br'])&&is_numeric($_GET['br'])) // si presiono el boton y es eliminar
{
	$receptores=new Receptores();
	print " Consulta ejecutada: ". $receptores->deleteReceptores($_GET['br']); // elimina el cliente y muestra el resultado
}
*/

// ****************************************************************************************************************************
// ****************************************************************************************************************************

$receptores=new Receptores();
$receptores= $receptores->getReceptores(); // obtiene todos los clientes para despues mostrarlos

$receptores = mysql_query("SELECT * FROM receptores WHERE id_receptor='$_POST[id_receptor]'");

print '<br/><br/><table>'
		  .'<tr><td>#</td>'
		  .'<td>nointerno</td>'
		  .'<td>estatus</td>'	
		  .'<td>marca</td>'
		  .'<td>modelo</td>'
		  .'<td>producid</td>'
		  .'<td>producn</td>'	
		  .'<td>sn</td>'
		  .'<td>rn</td>'
		  .'<td>tid</td>'
		  .'<td>acp</td>'	
		  .'<td>pe</td>'
		  .'<td>services</td>'
		  .'<td>ua</td>'
		  .'<td>pgm</td>'
		  .'<td>senal</td>'
		  .'<td>programador</td>'
		  .'<td>sat</td>'	
		  .'<td>parametros</td>'
		  .'<td>Modificar</td>';

while ($row=mysql_fetch_Array($receptores)) // recorre los clientes uno por uno hasta el fin de la tabla
{
	print '<tr class="indicador">'
		  .'<td>'.$row['id_receptor'] .'</td>'
		  .'<td>'.$row['nointerno'] .'</td>'
		  .'<td>'.$row['estatus'] .'</td>'
		  .'<td>'.$row['marca'] .'</td>'
		  .'<td>'.$row['modelo'] .'</td>'
		  .'<td>'.$row['producid'] .'</td>'
		  .'<td>'.$row['producn'] .'</td>'
		  .'<td>'.$row['sn'] .'</td>'
		  .'<td>'.$row['rn'] .'</td>'
		  .'<td>'.$row['tid'] .'</td>'
		  .'<td>'.$row['acp'] .'</td>'
		  .'<td>'.$row['pe'] .'</td>'
		  .'<td>'.$row['services'] .'</td>'
		  .'<td>'.$row['ua'] .'</td>'
		  .'<td>'.$row['pgm'] .'</td>'
		  .'<td>'.$row['senal'] .'</td>'
		  .'<td>'.$row['programador'] .'</td>'
		  .'<td>'.$row['sat'] .'</td>'
		  .'<td>'.$row['parametros'] .'</td>'
		  .'<td><a href="updates-senal.php?md='.$row['id_receptor'].'">Modificar</a></td>'// en este ejemplo para simplificar se envian los parametros por get utilizando un href
		  .'</tr>';
}
print '</table>';
?>
</div>
<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->


<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<div id="box3">
<form method="POST" action="updates-senal.php"> 
<input type="hidden" name="id_receptor" value="<?php print $id_receptor ?>">
<table>

<th>DATOS EQUIPO</th>
<tr>
	<td>nointerno
	<input type="text" name="nointerno" required autofocus onblur="upperCase()" value = "<?php print $nointerno ?>">
	</td>

	<td>Estatus
	<select name="estatus" type="text" value = "<?php print $estatus ?>">
        <option value="<?php print $estatus ?>" selected><?php print $estatus ?></option>
        <option value="activo">Activo</option>
	<option value="disponible">Disponible</option>
        <option value="baja">Baja</option>
        <option value="tramite">Tramite</option>
        <option value="danado">Dañado</option>
        </select>
	</td>

	<td>marca
	<input type="text" name="marca" required autofocus onblur="upperCase()" value = "<?php print $marca ?>">
	</td>

	<td>modelo
	<input type="text" name="modelo" required autofocus onblur="upperCase()" value = "<?php print $modelo ?>">
	</td>

	<td>tid
	<input type="text" name="tid" required autofocus onblur="upperCase()" value = "<?php print $tid ?>">
	</td>

	<td>programador
	<input type="text" name="programador" required autofocus onblur="upperCase()" value = "<?php print $programador ?>">
	</td>

</tr>

<tr>

	<td>producid
	<input type="text" name="producid" required autofocus onblur="upperCase()" value = "<?php print $producid ?>">
	</td>
	
	<td>producn
	<input type="text" name="producn" required autofocus onblur="upperCase()" value = "<?php print $producn ?>">
	</td>

	<td>sn
	<input type="text" name="sn" required autofocus onblur="upperCase()" value = "<?php print $sn ?>">
	</td>
	
	<td>rn
	<input type="text" name="rn" required autofocus onblur="upperCase()" value = "<?php print $rn ?>">
	</td>

	<td>ua
	<input type="text" name="ua" required autofocus onblur="upperCase()" value = "<?php print $ua ?>">
	</td>

	<td>acp
	<input type="text" name="acp" required autofocus onblur="upperCase()" value = "<?php print $acp ?>">
	</td>

</tr>

<th>DATOS SEÑAL</th>

<tr>
	<td>pe
	<input type="text" name="pe" required autofocus onblur="upperCase()" value = "<?php print $pe ?>">
	</td>

	<td>PGM
	<input type="text" name="pgm" required autofocus onblur="upperCase()" value = "<?php print $pgm ?>">
	</td>

	<td>Satelite
	<input type="text" name="sat" required autofocus onblur="upperCase()" value = "<?php print $sat ?>">
	</td>

</tr>

<tr>
	<td>services
	<input type="text" name="services" required autofocus onblur="upperCase()" value = "<?php print $services ?>">
	</td>

	<td>Señal
	<input type="text" name="senal" required autofocus onblur="upperCase()" value = "<?php print $senal ?>">
	</td>

	<td>Parametros
	<input type="text" name="parametros" required autofocus onblur="upperCase()" value = "<?php print $parametros ?>">
	</td>

</tr>


</table>

<input type="submit"  name="submit" id="btregistro" value ="<?php if(is_numeric($id_receptor)) print "Modificar"; else print "actualizar";?>">
</form>
</div>
<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
</div>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>

