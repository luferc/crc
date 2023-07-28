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
echo strtoupper("::Bajas-downstreams::");
?>
    </div>
</div>

<div id="box0">
<a href="inicio.php"> <img src="../crc/imag/undo.png"width=25 height=25 border=0 alt="back"></a>

<?php
include_once ("clase.php"); //incluimos las clases.
  $colonia="";
  $plataforma="";
  $id="";

if (isset($_GET['md']))//si el valor es modificar, este vine seteado (arreglo"establecido") y ejecuta el siguiente codigo:
{
  $downstream=new Downstream($_GET['md']); // instancio la clase cliente pasandole el nro de cliente, de esta forma lo busca
  $colonia=$downstream->getColonia();     // obtengo el nombre
  $plataforma=$downstream->getPlataforma();//obtengo la asistencia
  $id=$downstream->getID(); //obtengo id
}
?>


<div style="width:auto;height:480px;overflow:scroll;">
<?php

if (isset($_POST['submit'])&&!is_numeric($_POST['id'])) // si presiono el boton ingresar
{
	$downstream=new Downstream();
	//print_r($_POST);
	$downstream->setColonia($_POST['colonia']); // setea los datos
	$downstream->setPlataforma($_POST['plataforma']);	
	print " Consulta ejecutada: ". $downstream->insertDownstream(); // inserta y muestra el resultado
}
if (isset($_POST['submit'])&&is_numeric($_POST['id'])) // si presiono el boton y es modificar
{
	$downstream=new Downstream($_POST['id']);  // instancio la clase pasandole el nro de cliente para cargar los datos
	$downstream->setColonia($_POST['colonia']); // setea los datos nuevos
	$downstream->setPlataforma($_POST['Plataforma']);	
	print " Consulta ejecutada: ". $downstream->updateDownstream(); // inserta y muestra el resultado
}
if (isset($_GET['br'])&&is_numeric($_GET['br'])) // si presiono el boton y es eliminar
{
	$downstream=new Downstream();
	print " Consulta ejecutada: ". $downstream->deleteDownstream($_GET['br']); // elimina el cliente y muestra el resultado
}

$downstream=new Downstream();
$downstreams= $downstream->getDownstreams(); // obtiene todos los clientes para despues mostrarlos

print '<br/><table border=0>'
		  .'<tr><th>#</th>'
		  .'<th>Colonia</th>'
		  .'<th>Plataforma</th>'
		  .'<th>Borrar</th></tr>';

while ($row=mysql_fetch_Array($downstreams)) // recorre los clientes uno por uno hasta el fin de la tabla
{
	print '<tr class="indicador">'
		  .'<td>'.$row['id'] .'</td>'
		  .'<td>'.$row['colonia'] .'</td>'
		  .'<td>'.$row['plataforma'] .'</td>'
		 // .'<td><a href="bajas.php?br='.$row['id'].'">Borrar</a></td>'// lo correcto seria enviarlos por post con un submit por ejem.
		  .'</tr>';
}
print '</table>';
?>
</div>
<p>Scrolled <span>0</span> times.</p>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>
