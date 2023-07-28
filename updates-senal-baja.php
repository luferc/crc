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

<div id="content">
    <div class="pagename">
<?php
echo strtoupper(":::bajas receptor satelital db crc vallarta:::");
?>
    </div>
</div>

<div id="box0">
<a href="nuevo.php"> <img src="../crc/imag/undo.png"width=25 height=25 border=0 alt="back"></a>

<?php
include_once ("updates-senal-clase.php"); //incluimos las clases.
  $senal="";
  $sat="";
  $id_receptor="";

if (isset($_GET['md']))//si el valor es modificar, este vine seteado (arreglo"establecido") y ejecuta el siguiente codigo:
{
  $receptores=new Receptores($_GET['md']); // instancio la clase cliente pasandole el nro de cliente, de esta forma lo busca
  $senal=$receptores->getSenal();     // obtengo el nombre
  $sat=$receptores->getSat();//obtengo la asistencia
  $id_receptor=$receptores->getID_receptor(); //obtengo id
}
?>


<div style="width:auto;height:480px;overflow:scroll;">
<?php

if (isset($_POST['submit'])&&!is_numeric($_POST['id_receptor'])) // si presiono el boton ingresar
{
	$receptores=new Receptores();
	//print_r($_POST);
	$receptores->setSenal($_POST['senal']); // setea los datos
	$receptores->setSat($_POST['sat']);	
	print " Consulta ejecutada: ". $receptores->insertReceptores(); // inserta y muestra el resultado
}
if (isset($_POST['submit'])&&is_numeric($_POST['id_receptor'])) // si presiono el boton y es modificar
{
	$receptores=new Receptores($_POST['id_receptor']);  // instancio la clase pasandole el nro de cliente para cargar los datos
	$receptores->setSenal($_POST['senal']); // setea los datos nuevos
	$receptores->setSat($_POST['sat']);	
	print " Consulta ejecutada: ". $receptores->updateReceptores(); // inserta y muestra el resultado
}
if (isset($_GET['br'])&&is_numeric($_GET['br'])) // si presiono el boton y es eliminar
{
	$receptores=new Receptores();
	print " Consulta ejecutada: ". $receptores->deleteReceptores($_GET['br']); // elimina el cliente y muestra el resultado
}

$receptores=new Receptores();
$receptores= $receptores->getReceptores(); // obtiene todos los clientes para despues mostrarlos

print '<br/><table border=0>'
		  .'<tr><th>#</th>'
		  .'<th>Señal</th>'
		  .'<th>Satelite</th>'
		  .'<th>Borrar</th></tr>';

while ($row=mysql_fetch_Array($receptores)) // recorre los clientes uno por uno hasta el fin de la tabla
{
	print '<tr class="indicador">'
		  .'<td>'.$row['id_receptor'] .'</td>'
		  .'<td>'.$row['senal'] .'</td>'
		  .'<td>'.$row['sat'] .'</td>'
		  .'<td><a href="updates-senal-baja.php?br='.$row['id_receptor'].'">Borrar</a></td>'// lo correcto seria enviarlos por post con un submit por ejem.
		  .'</tr>';
}
print '</table>';
?>
</div>
<p>Scrolled <span>0</span> times.</p>
</div>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
