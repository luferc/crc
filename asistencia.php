
<?php
include_once ("clase.php"); //incluimos las clases.
  $colonia="";
  $ch14="";
  $ch15="";
  $ch98="";
  $ch99="";
  $ch16="";
  $retorno="";
  $plataforma="";
  $id="";

if (isset($_GET['md']))//si el valor es modificar, este vine seteado (arreglo"establecido") y ejecuta el siguiente codigo:
{
  $downstream=new Downstream($_GET['md']); // instancio la clase cliente pasandole el nro de cliente, de esta forma lo busca
  $colonia=$downstream->getColonia();     // obtengo el nombre
  $ch14=$downstream->getCH14();//obtengo la asistencia
  $ch15=$downstream->getCH15();//obtengo la asistencia
  $ch98=$downstream->getCH98();//obtengo la asistencia
  $ch99=$downstream->getCH99();//obtengo la asistencia
  $ch16=$downstream->getCH16();//obtengo la asistencia
  $retorno=$downstream->getRETORNO();//obtengo la asistencia
  $plataforma=$downstream->getPlataforma();
  $id=$downstream->getID(); //obtengo id
}
?>
<div id="box3">
<form method="POST" action="inicio.php"> 
<input type="hidden" name="id" value="<?php print $id ?>">
<table>

<tr>
	<td>Colonia</td>
	<td><input type="text" name="colonia" required autofocus onblur="upperCase()" value = "<?php print $colonia ?>"></td>
</tr>
<tr>
	<td>CH14</td>
	<td><input type="text" name="ch14" required autofocus onblur="upperCase()" value = "<?php print $ch14 ?>"></td>
</tr>
<tr>
	<td>CH15</td>
	<td><input type="text" name="ch15" required autofocus onblur="upperCase()" value = "<?php print $ch15 ?>"></td>
</tr>
<tr>
	<td>CH99</td>
	<td><input type="text" name="ch99" required autofocus onblur="upperCase()" value = "<?php print $ch99 ?>"></td>
</tr>
<tr>
	<td>CH98</td>
	<td><input type="text" name="ch98" required autofocus onblur="upperCase()" value = "<?php print $ch98 ?>"></td>
</tr>
<tr>
	<td>CH16</td>
	<td><input type="text" name="ch16" required autofocus onblur="upperCase()" value = "<?php print $ch16 ?>"></td>
</tr>
<tr>
	<td>RETORNO</td>
	<td><input type="text" name="retorno" required autofocus onblur="upperCase()" value = "<?php print $retorno ?>"></td>
</tr>
<tr>
	<td>Plataforma</td>
	<td><select name="plataforma" type="text" value = "<?php print $plataforma ?>">
        <option value="">---</option>
        <option value="Plataforma1">1</option>
        <option value="Plataforma2">2</option>
        <option value="Plataforma3">3</option>
        <option value="Plataforma5">5</option>
        <option value="Plataforma6">6</option>
        <option value="Plataforma7">7</option>
        <option value="Plataforma8">8</option>
        </select></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit"  name="submit" id="btregistro" value ="<?php if(is_numeric($id)) print "Modificar"; else print "actualizar";?>"></td>
</tr>
</table>
</form>
</div>

<p>Scrolled <span>0</span> times.</p>
<div style="width:auto;height:480px;overflow:scroll;">
<?php

if (isset($_POST['submit'])&&!is_numeric($_POST['id'])) // si presiono el boton ingresar
{
	$downstream=new Downstream();
	//print_r($_POST);
	$downstream->setColonia($_POST['colonia']); // setea los datos
	$downstream->setCH14($_POST['ch14']);	
	$downstream->setCH15($_POST['ch15']);
	$downstream->setCH99($_POST['ch99']);
	$downstream->setCH98($_POST['ch98']);	
	$downstream->setCH16($_POST['ch16']);
	$downstream->setRETORNO($_POST['retorno']);
	$downstream->setPlataforma($_POST['plataforma']);
	print " Consulta ejecutada: ". $downstream->insertDownstream(); // inserta y muestra el resultado
}
if (isset($_POST['submit'])&&is_numeric($_POST['id'])) // si presiono el boton y es modificar
{
	$downstream=new Downstream($_POST['id']);  // instancio la clase pasandole el nro de cliente para cargar los datos
	$downstream->setColonia($_POST['colonia']); // setea los datos nuevos
	$downstream->setCH14($_POST['ch14']);	
	$downstream->setCH15($_POST['ch15']);
	$downstream->setCH99($_POST['ch99']);
	$downstream->setCH98($_POST['ch98']);	
	$downstream->setCH16($_POST['ch16']);	
	$downstream->setRETORNO($_POST['retorno']);
	$downstream->setPlataforma($_POST['plataforma']);
	print " Consulta ejecutada: ". $downstream->updateDownstream(); // inserta y muestra el resultado
}
if (isset($_GET['br'])&&is_numeric($_GET['br'])) // si presiono el boton y es eliminar
{
	$downstream=new Downstream();
	print " Consulta ejecutada: ". $downstream->deleteDownstream($_GET['br']); // elimina el cliente y muestra el resultado
}

$downstream=new Downstream();
$downstreams= $downstream->getDownstreams(); // obtiene todos los clientes para despues mostrarlos

print '<br/><br/><table>'
		  .'<tr><td>#</td>'
		  .'<td>Colonia</td>'
		  .'<td>CH14</td>'
		  .'<td>CH15</td>'
		  .'<td>CH99</td>'
		  .'<td>CH98</td>'
		  .'<td>CH16</td>'
		  .'<td>Retorno</td>'
		  .'<td>Plataforma</td>'
		  .'<td>Modificar</td>';

while ($row=mysql_fetch_Array($downstreams)) // recorre los clientes uno por uno hasta el fin de la tabla
{
	print '<tr class="indicador">'
		  .'<td>'.$row['id'] .'</td>'
		  .'<td>'.$row['colonia'] .'</td>'
		  .'<td>'.$row['ch14'] .'</td>'
		  .'<td>'.$row['ch15'] .'</td>'
		  .'<td>'.$row['ch99'] .'</td>'
		  .'<td>'.$row['ch98'] .'</td>'
		  .'<td>'.$row['ch16'] .'</td>'
		  .'<td>'.$row['retorno'] .'</td>'
		  .'<td>'.$row['plataforma'] .'</td>'
		  .'<td><a href="inicio.php?md='.$row['id'].'">Modificar</a></td>'// en este ejemplo para simplificar se envian los parametros por get utilizando un href
		  .'</tr>';
}
print '</table>';
?>
</div>

