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
echo strtoupper(" archivos dbf");
?>
    </div>
</div>
<ul>
<li><a href="consultas-dbf.php"> ConsultarDato</a></li>
</ul>
<center>
<p>agregar los siguientes datos:</p>

<html>
<body>
<form action="agregadatosDBF.php" method="post">
<table>
<tr>
<td>CODIGO_USUARIO:</td>
<td><input type="number" name="COD_USR"></td>
</tr>
<tr>
<td>NOMBRE_USUARIO:</td>
<td><input type="text" name="NOM_USR"></td>
</tr>
<tr>
<td>USERNAME:</td>
<td><input type="text" name="ENT_USR"></td>
</tr>
<tr>
<td>PASSWORD_USUARIO:</td>
<td><input type="password" name="PSW_USR"></td>
</tr>
<tr>
<td>NIVEL_USUARIO:</td>
<td><input type="number" name="NIV_USR"></td>
</tr>
<tr>
<td>FECHA_REGISTRO:</td>
<td><input type="date" name="FEC_ULT"></td>
</tr>
<tr>
<td>DC:</td>
<td><input type="text" name="DC"></td>
</tr>
</table>
<input type="submit"  name="Submit" value="Agregar">
</body>
</html>
</center> 

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
<?php require ("footer.php"); ?>
