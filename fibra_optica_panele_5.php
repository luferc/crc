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

<div id="box2">

<code>PANEL #5</code>
<br>
<?php 

$db = dbase_open('./docs/PANEL5.dbf', 0); //dbase_open — Abre una base de datos en 0 solo lectura.

if ($db) {
$numero_registros = dbase_numrecords($db);
for ($i = 1; $i <= $numero_registros; $i++) {
// procesar cada uno de los registros
$temp = dbase_get_record($db, $i);

echo"
	<div class='img'>
  <a href='#''> 
  <div class='desc'>
  <b><font size='0'>$temp[0]</font></b>
  <br>
  <font size='0'>$temp[1]</font>
  <br>
  <b><font size='1'color='#00CC00'>$temp[2]</font></b>
  </div>
  </a>
     </div>
	";	//fin de echo.

}//fin ciclo for.

}//fin de condición.

?>

</div>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
