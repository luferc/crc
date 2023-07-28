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
echo strtoupper("::Actualizacion-downstreams::");
?>
    </div>
</div>
<ul>
<li>Updates: </li>
<li><a href="#"> Alta de Nodo</a></li>
<li>|</li>
<li><a href="bajas.php">Eliminar</a></li>
<li>|</li>
<li><a href="consultas.php"><img src="../crc/imag/undo.png"width=25 height=25 border=0 alt="back"></a></li>
</ul>
<?php require ("asistencia.php"); ?>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
<?php require ("footer.php"); ?>
