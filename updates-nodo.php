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

<?php require("conexion.php"); ?>
<?php require ("header.php"); ?>
<body>
<?php require ("container-header.php"); ?>
<?php require ("container-menu.php"); ?>
<div id="content">
    <div class="pagename">
<?php
echo strtoupper("update item: ").$_POST['id'];
?>
    </div>
</div>

<div id="box0">
<div style="width:auto;height:600px;overflow:scroll;">

<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<?php
include_once ("clase.php"); //incluimos las clases.
  $colonia="";
  $nodo="";
  $interface="";
  $ch14="";
  $ch15="";
  $ch98="";
  $ch99="";
  $mer14="";	
  $mer15="";
  $mer99="";
  $mer98="";
  $dsfam="";
  $plataforma="";
  $tipotx="";
  $modelo="";
  $sst="";
  $sstfam="";
  $snr38mhz="";
  $snr31mhz="";
  $snr25mhz="";
  $txnodo38mhz="";
  $txnodo31mhz="";
  $txnodo25mhz="";
  $txnodoatt="";
  $po="";
  $poatt="";
  $usfam="";
  $rxatt="";
  $ch03="";
  $ch94="";
  $rxnodoatt="";
  $offset="";
  $txattop="";
  $id="";

if (isset($_GET['md']))//si el valor es modificar, este vine seteado (arreglo"establecido") y ejecuta el siguiente codigo:
{
  $downstream=new Downstream($_GET['md']); // instancio la clase cliente pasandole el nro de cliente, de esta forma lo busca
  $colonia=$downstream->getColonia();     // obtengo el nombre
  $nodo=$downstream->getNodo();     //
  $interface=$downstream->getInterface();     //
  $ch14=$downstream->getCH14();//obtengo la asistencia
  $ch15=$downstream->getCH15();//obtengo la asistencia
  $ch98=$downstream->getCH98();//obtengo la asistencia
  $ch99=$downstream->getCH99();//obtengo la asistencia
  $mer14=$downstream->getMER14();
  $mer15=$downstream->getMER15();
  $mer99=$downstream->getMER99();
  $mer98=$downstream->getMER98();
  $dsfam=$downstream->getDSfam();//obtengo la asistencia
  $plataforma=$downstream->getPlataforma();
  $tipotx=$downstream->getTipotx();
  $modelo=$downstream->getModelo();
  $sst=$downstream->getSST();
  $sstfam=$downstream->getSSTfam();
  $snr38mhz=$downstream->getSnr38mhz();
  $snr31mhz=$downstream->getSnr31mhz();
  $snr25mhz=$downstream->getSnr25mhz();
  $txnodo38mhz=$downstream->getTxnodo38mhz();
  $txnodo31mhz=$downstream->getTxnodo31mhz();
  $txnodo25mhz=$downstream->getTxnodo25mhz();
  $txnodoatt=$downstream->getTxnodoatt();
  $po=$downstream->getPO();
  $poatt=$downstream->getPOatt();
  $usfam=$downstream->getUSfam();
  $rxatt=$downstream->getRXatt();
  $ch03=$downstream->getCH03();	
  $ch94=$downstream->getCH94();	
  $rxnodoatt=$downstream->getRXnodoatt();	
  $offset=$downstream->getOFFset();	
  $txattop=$downstream->getTXattop();	
  $id=$downstream->getID(); //obtengo id
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

*/

// ****************************************************************************************************************************
// ****************************************************************************************************************************

if (isset($_POST['submit'])&&is_numeric($_POST['id'])) // si presiono el boton y es modificar
{
	$downstream=new Downstream($_POST['id']);  // instancio la clase pasandole el nro de cliente para cargar los datos
	//$downstream->setColonia($_POST['colonia']); // setea los datos nuevos
	$downstream->setCH14($_POST['ch14']);	
	$downstream->setCH15($_POST['ch15']);
	$downstream->setCH99($_POST['ch99']);
	$downstream->setCH98($_POST['ch98']);
	$downstream->setMER14($_POST['mer14']);	
	$downstream->setMER15($_POST['mer15']);	
	$downstream->setMER99($_POST['mer99']);	
	$downstream->setMER98($_POST['mer98']);	
	$downstream->setDSfam($_POST['dsfam']);
	//$downstream->setPlataforma($_POST['plataforma']);
	$downstream->setTipotx($_POST['tipotx']);
	$downstream->setModelo($_POST['modelo']);
	$downstream->setSST($_POST['sst']);
	$downstream->setSSTfam($_POST['sstfam']);
	$downstream->setSnr38mhz($_POST['snr38mhz']);
	$downstream->setSnr31mhz($_POST['snr31mhz']);
	$downstream->setSnr25mhz($_POST['snr25mhz']);
	$downstream->setTxnodo38mhz($_POST['txnodo38mhz']);
	$downstream->setTxnodo31mhz($_POST['txnodo31mhz']);
	$downstream->setTxnodo25mhz($_POST['txnodo25mhz']);
	$downstream->setTxnodoatt($_POST['txnodoatt']);
	$downstream->setPO($_POST['po']);
	$downstream->setUSfam($_POST['usfam']);
	$downstream->setRXatt($_POST['rxatt']);
	$downstream->setPOatt($_POST['poatt']);
	$downstream->setCH03($_POST['ch03']);
	$downstream->setCH94($_POST['ch94']);
	$downstream->setRXnodoatt($_POST['rxnodoatt']);
	$downstream->setOFFset($_POST['offset']);
	$downstream->setTXattop($_POST['txattop']);
	print " Consulta ejecutada: ". $downstream->updateDownstream(); // inserta y muestra el resultado
  $downstream="INSERT INTO downstreams(last_update) VALUES (NOW())";
}

// ****************************************************************************************************************************
// ****************************************************************************************************************************

/*
if (isset($_GET['br'])&&is_numeric($_GET['br'])) // si presiono el boton y es eliminar
{
	$downstream=new Downstream();
	print " Consulta ejecutada: ". $downstream->deleteDownstream($_GET['br']); // elimina el cliente y muestra el resultado
}

*/

// ****************************************************************************************************************************
// ****************************************************************************************************************************

$downstream=new Downstream();
$downstream= $downstream->getDownstream(); // obtiene todos los clientes para despues mostrarlos

$downstream = mysql_query("SELECT * FROM downstreams WHERE id='$_POST[id]'");

print '<br/><br/><table>'
		  .'<tr><td>#</td>'
		  .'<td>Colonia</td>'
		  .'<td>Nodo</td>'
		  .'<td>Modificar</td>';

while ($row=mysql_fetch_Array($downstream)) // recorre los clientes uno por uno hasta el fin de la tabla
{
	print '<tr class="indicador">'
		  .'<td>'.$row['id'] .'</td>'
		  .'<td>'.$row['colonia'] .'</td>'
		  .'<td>'.$row['nodo'] .'</td>'
		  .'<td><a href="updates-nodo.php?md='.$row['id'].'">Modificar</a></td>'// en este ejemplo para simplificar se envian los parametros por get utilizando un href
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
<form method="POST" action="updates-nodo.php"> 
<input type="hidden" name="id" value="<?php print $id ?>">
<table>
	<h4><?php print "$nodo".'<font color=OrangeRed>'.$colonia.'</font>'.$interface?></h4>
<th>NARROWCAST</th>
<tr>
	<td>Tipo
	<select name="modelo" type="text" value = "<?php print $modelo ?>">
        <option value="<?php print $modelo ?>" selected><?php print $modelo ?></option>
	<option value="gx2motorola">GX2-MOTOROLA</option>
        <option value="gs7000">GS7000</option>
       </select>  
	</td>
	<td>	
	Plataforma:
	<?php print $plataforma ?>
	</td>

        <td>TXLM
	<select name="tipotx" type="text" value = "<?php print $tipotx ?>">
        <option value="<?php print $tipotx ?>" selected><?php print $tipotx ?></option>
	<option value="especial">Especial</option>
        <option value="hdtxm06">HDTXM06</option>
        <option value="txlm6">TXLM6</option>
        <option value="txlm8">TXLM8</option>
        <option value="txlm13">TXLM13</option>
       </select>        
	</td>

        <td>DS-FAM
	<input type="text" name="dsfam" required autofocus onblur="upperCase()" value = "<?php print $dsfam ?>">
	</td>
</tr>
<tr>
	<td>
	CH14<input type="text" name="ch14" required autofocus onblur="upperCase()" value = "<?php print $ch14 ?>">
	MER14 <br/>
	<input type="text" name="mer14" required autofocus onblur="upperCase()" value = "<?php print $mer14 ?>">
	</td>

	<td>
	CH15<input type="text" name="ch15" required autofocus onblur="upperCase()" value = "<?php print $ch15 ?>">
	MER15 <br/>
	<input type="text" name="mer15" required autofocus onblur="upperCase()" value = "<?php print $mer15 ?>">
	</td>

	<td>
	CH99<input type="text" name="ch99" required autofocus onblur="upperCase()" value = "<?php print $ch99 ?>">
	MER99 <br/>
	<input type="text" name="mer99" required autofocus onblur="upperCase()" value = "<?php print $mer99 ?>">
	</td>

	<td>
	CH98<input type="text" name="ch98" required autofocus onblur="upperCase()" value = "<?php print $ch98 ?>">
	MER98 <br/>
	<input type="text" name="mer98" required autofocus onblur="upperCase()" value = "<?php print $mer98 ?>">
	</td>
	
</tr>

</table>

<table>
<th>UPSTREAM</th>

<tr>
	<td>
	SNR38mhz<input type="text" name="snr38mhz" required autofocus onblur="upperCase()" value = "<?php print $snr38mhz ?>">
	TX38mhz<br/>
	<input type="text" name="txnodo38mhz" required autofocus onblur="upperCase()" value = "<?php print $txnodo38mhz ?>">
	</td>

	<td>
	SNR31mhz<input type="text" name="snr31mhz" required autofocus onblur="upperCase()" value = "<?php print $snr31mhz ?>">
	TX31mhz <br/>
	<input type="text" name="txnodo31mhz" required autofocus onblur="upperCase()" value = "<?php print $txnodo31mhz ?>">
	</td>

	<td>
	SNR25mhz<input type="text" name="snr25mhz" required autofocus onblur="upperCase()" value = "<?php print $snr25mhz ?>">
	TX25mhz <br/>
	<input type="text" name="txnodo25mhz" required autofocus onblur="upperCase()" value = "<?php print $txnodo25mhz ?>">
	</td>

	<td>
	US-FAM<input type="text" name="usfam" required autofocus onblur="upperCase()" value = "<?php print $usfam ?>">
	RX-CRC-Atenuador <br/>
	<input type="text" name="rxatt" required autofocus onblur="upperCase()" value = "<?php print $rxatt ?>">
	</td>
	
</tr>

<tr>
	<td>
	TX-Nodo-Atenuador
	<input type="text" name="txnodoatt" required autofocus onblur="upperCase()" value = "<?php print $txnodoatt ?>">
	</td>
	<td>P.O. <br/>
	<input type="text" name="po" required autofocus onblur="upperCase()" value = "<?php print $po ?>">
	</td>

	<td>RX-P.O.ATT<br/>
	<input type="text" name="poatt" required autofocus onblur="upperCase()" value = "<?php print $poatt ?>">
	</td>

	<td>SST
	<select name="sst" type="text" value = "<?php print $sst ?>">
        <option value="<?php print $sst ?>" selected><?php print $sst ?></option>

	<option value="">SST---> 1</option>
        <option value="SST1/1A">SST1/1A</option>
        <option value="SST1/2A">SST1/2A</option>
        <option value="SST1/3A">SST1/3A</option>
        <option value="SST1/4A">SST1/4A</option>
        <option value="SST1/5A">SST1/5A</option>
        <option value="SST1/6A">SST1/6A</option>
        <option value="SST1/7A">SST1/7A</option>
        <option value="SST1/8A">SST1/8A</option>
        <option value="SST1/1B">SST1/1B</option>
        <option value="SST1/2B">SST1/2B</option>
        <option value="SST1/3B">SST1/3B</option>
        <option value="SST1/4B">SST1/4B</option>
        <option value="SST1/5B">SST1/5B</option>
        <option value="SST1/6B">SST1/6B</option>
        <option value="SST1/7B">SST1/7B</option>
        <option value="SST1/8B">SST1/8B</option>

	<option value="">SST---> 2</option>
        <option value="SST2/1A">SST2/1A</option>
        <option value="SST2/2A">SST2/2A</option>
        <option value="SST2/3A">SST2/3A</option>
        <option value="SST2/4A">SST2/4A</option>
        <option value="SST2/5A">SST2/5A</option>
        <option value="SST2/6A">SST2/6A</option>
        <option value="SST2/7A">SST2/7A</option>
        <option value="SST2/8A">SST2/8A</option>
        <option value="SST2/1B">SST2/1B</option>
        <option value="SST2/2B">SST2/2B</option>
        <option value="SST2/3B">SST2/3B</option>
        <option value="SST2/4B">SST2/4B</option>
        <option value="SST2/5B">SST2/5B</option>
        <option value="SST2/6B">SST2/6B</option>
        <option value="SST2/7B">SST2/7B</option>
        <option value="SST2/8B">SST2/8B</option>

	<option value="">SST---> 3</option>
 	<option value="SST3/1A">SST3/1A</option>
        <option value="SST3/2A">SST3/2A</option>
        <option value="SST3/3A">SST3/3A</option>
        <option value="SST3/4A">SST3/4A</option>
        <option value="SST3/5A">SST3/5A</option>
        <option value="SST3/6A">SST3/6A</option>
        <option value="SST3/7A">SST3/7A</option>
        <option value="SST3/8A">SST3/8A</option>
        <option value="SST3/1B">SST3/1B</option>
        <option value="SST3/2B">SST3/2B</option>
        <option value="SST3/3B">SST3/3B</option>
        <option value="SST3/4B">SST3/4B</option>
        <option value="SST3/5B">SST3/5B</option>
        <option value="SST3/6B">SST3/6B</option>
        <option value="SST3/7B">SST3/7B</option>
        <option value="SST3/8B">SST3/8B</option>

	<option value="">SST---> 4</option>
 	<option value="SST4/1A">SST4/1A</option>
        <option value="SST4/2A">SST4/2A</option>
        <option value="SST4/3A">SST4/3A</option>
        <option value="SST4/4A">SST4/4A</option>
        <option value="SST4/5A">SST4/5A</option>
        <option value="SST4/6A">SST4/6A</option>
        <option value="SST4/7A">SST4/7A</option>
        <option value="SST4/8A">SST4/8A</option>
        <option value="SST4/1B">SST4/1B</option>
        <option value="SST4/2B">SST4/2B</option>
        <option value="SST4/3B">SST4/3B</option>
        <option value="SST4/4B">SST4/4B</option>
        <option value="SST4/5B">SST4/5B</option>
        <option value="SST4/6B">SST4/6B</option>
        <option value="SST4/7B">SST4/7B</option>
        <option value="SST4/8B">SST4/8B</option>
 	
	<option value="">SST---> 5</option>
	<option value="SST5/1A">SST5/1A</option>
        <option value="SST5/2A">SST5/2A</option>
        <option value="SST5/3A">SST5/3A</option>
        <option value="SST5/4A">SST5/4A</option>
        <option value="SST5/5A">SST5/5A</option>
        <option value="SST5/6A">SST5/6A</option>
        <option value="SST5/7A">SST5/7A</option>
        <option value="SST5/8A">SST5/8A</option>
        <option value="SST5/1B">SST5/1B</option>
        <option value="SST5/2B">SST5/2B</option>
        <option value="SST5/3B">SST5/3B</option>
        <option value="SST5/4B">SST5/4B</option>
        <option value="SST5/5B">SST5/5B</option>
        <option value="SST5/6B">SST5/6B</option>
        <option value="SST5/7B">SST5/7B</option>
        <option value="SST5/8B">SST5/8B</option>

	<option value="">SST---> 6</option>
	<option value="SST6/1A">SST6/1A</option>
        <option value="SST6/2A">SST6/2A</option>
        <option value="SST6/3A">SST6/3A</option>
        <option value="SST6/4A">SST6/4A</option>
        <option value="SST6/5A">SST6/5A</option>
        <option value="SST6/6A">SST6/6A</option>
        <option value="SST6/7A">SST6/7A</option>
        <option value="SST6/8A">SST6/8A</option>
        <option value="SST6/1B">SST6/1B</option>
        <option value="SST6/2B">SST6/2B</option>
        <option value="SST6/3B">SST6/3B</option>
        <option value="SST6/4B">SST6/4B</option>
        <option value="SST6/5B">SST6/5B</option>
        <option value="SST6/6B">SST6/6B</option>
        <option value="SST6/7B">SST6/7B</option>
        <option value="SST6/8B">SST6/8B</option>
       </select><br/>
	SST-FAM
	<input type="text" name="sstfam" required autofocus onblur="upperCase()" value = "<?php print $sstfam ?>">
	</td>
</tr>
</table>

<table>

<th>FORWARD</th>

<tr>
	<td>
	OFFSET<br/>
	<input type="text" name="offset" required autofocus onblur="upperCase()" value = "<?php print $offset ?>">
	</td>

	<td>
	TX-P.O.ATT<br/>
	<input type="text" name="txattop" required autofocus onblur="upperCase()" value = "<?php print $txattop ?>">
	</td>

	<td>
	CH03<br/>
	<input type="text" name="ch03" required autofocus onblur="upperCase()" value = "<?php print $ch03 ?>">
	CH94 <br/>
	<input type="text" name="ch94" required autofocus onblur="upperCase()" value = "<?php print $ch94 ?>">
	</td>

	<td>
	RX-Nodo-Atenuador<input type="text" name="rxnodoatt" required autofocus onblur="upperCase()" value = "<?php print $rxnodoatt ?>">
	</td>

</tr>

</table>

<input type="submit"  name="submit" id="btregistro" value ="<?php if(is_numeric($id)) print "Modificar"; else print "actualizar";?>">
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
