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
<li><a href="consultas-dbf.php"> ConsultarDato</a></li>
<br>
<left>
<?php>
//abir en modo lectura-escritura
$db = dbase_open ('./docs/ejemplo.dbf', 2);

$numero_registros = array ("$_POST[COD_USR]", "$_POST[NOM_USR]", "$_POST[ENT_USR]", "$_POST[PSW_USR]", "$_POST[NIV_USR]", "$_POST[FEC_ULT]", "$_POST[DC]");


dbase_add_record($db, $numero_registros);
dbase_close ($db);

 echo '<code><font color="orange">se agrego 1 registro!!!</font></code>';
?>
</left> 

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
<?php require ("footer.php"); ?>

