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
<script>
function upperCase()
{
var x=document.getElementById("titulo").value
document.getElementById("titulo").value=x.toUpperCase()
var x=document.getElementById("observacion").value
document.getElementById("observacion").value=x.toUpperCase()
}
</script>

<script>
function revisar() {
	if(formulario.modelo.value.length < 7) {
		alert('Error.') ;
		return false ;
	}
	
}
</script>

<body>


<div id="content">
    <div class="pagename">
<?php
echo strtoupper("alta de actividades crc region occidente");
?>
    </div>
</div>

<!-- 
<a class="activator"id="activator"href="#"onclick="javascript:window.open('updates-senal-baja.php', 'noimporta', 'width=600, height=600, scrollbars=NO')">Bajas > </a>
<a href="updates-senal.php"> <img src="../crc/imag/undo.png"width=25 height=25 border=0 alt="back"></a>
-->
<div id="boxHomeWork">
<form name="formulario" action="insert_addHomeworks.php" method="post"onsubmit="return revisar()">

<fieldset>
<legend class="form">Tareas</legend>
<table>
	<tr>
		<th class="tab2">Titulo</th>
		<td>
            <input name="titulo" type="text" id="titulo" maxlength="70" required autofocus onblur="upperCase()">
		</td>
	</tr>

	<tr>
		<th class="tab3">Estatus</th>
		<td>            
            <select name="status">
			<option value="iniciada" selected>Iniciada</option>
			<option value="finalizada">Finalizada</option>
			<option value="cambio">Cambio</option>
			<option value="continua">Continua</option>
			<option value="cancelada">Cancelada</option>
</select>
		</td>
	</tr>

</table>
</fieldset>

<fieldset>
<?php require ("calendario2.php"); ?>
</fieldset>

<fieldset>
<table>
	<tr>
		<th class="tab4">Detalle Actividad</th>
		<td>            
	        <textarea rows="10" cols="32" name="observacion" wrap="hard" required></textarea>
		</td>
	</tr>
</table>
</fieldset>


<p>
<label>
<ul>
<br>
<li><input type="submit"  name="Submit" id="btregistro" value="O K"></li>
</ul>
</label>
</p>
</form>
</div>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
