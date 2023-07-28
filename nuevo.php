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
var x=document.getElementById("modelo").value
document.getElementById("modelo").value=x.toUpperCase()
var x=document.getElementById("ua").value
document.getElementById("ua").value=x.toUpperCase()
}
</script>

<script>
function revisar() {
	if(formulario.modelo.value.length < 5) {
		alert('Error.') ;
		return false ;
	}
	
}
</script>

<body>


<div id="content">
    <div class="pagename">
<?php
echo strtoupper("alta de receptor satelital db crc vallarta");
?>
    </div>
</div>
<a class="activator"id="activator"href="#"onclick="javascript:window.open('updates-senal-baja.php', 'noimporta', 'width=600, height=600, scrollbars=NO')">Bajas > </a>
<!-- 
<a href="updates-senal.php"> <img src="../crc/imag/undo.png"width=25 height=25 border=0 alt="back"></a>
-->
<div id="box1">
<form name="formulario" action="insert.php" method="post"onsubmit="return revisar()">
<p>Estatus
<label>
<select name="estatus">
<option value="disponible" selected>Disponible</option>
<option value="activo">Activo</option>
<option value="tramite">Tramite</option>
<option value="baja">Baja</option>
<option value="danado">Dañado</option>
</select>
</label>
</p>
<br>
<p>Modelo<br>
<label>
<input name="modelo" type="text" id="modelo" required autofocus>
</label>
</p>
<p>UA<br>
<label>
<input name="ua" type="text" id="ua" required autofocus onblur="upperCase()">
</label>
</p>
<p>TID<br>
<label>
<input name="tid" type="text" id="tid" required autofocus onblur="upperCase()">
</label>
</p>
<p>
<ul>
<li><label>Señales</label><br>
<textarea rows="2" cols="20" name="senal" wrap="hard">

</textarea></li>
</ul>
</p>
<p>
<ul>

<li><label>Program</label><br>
<textarea rows="2" cols="20" name="pgm" wrap="hard">

</textarea></li>
</ul>
</p>
<p>
<ul>

<li><label>Satelite</label><br>
<textarea rows="2" cols="20" name="sat" wrap="hard">

</textarea></li>
</ul>
</p>
<p>
<ul>

<li><label>Parametros</label><br>
<textarea rows="2" cols="20" name="parametros" wrap="hard">

</textarea></li>
</ul>
</p>
<p>
<label>
<ul>
<br>
<li><input type="submit"  name="Submit" id="btregistro" value="Registrar"></li>
</ul>
</label>
</p>
</form>
</div>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
