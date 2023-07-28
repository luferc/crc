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
echo strtoupper(" lista tecnicos activos ");
?>
    </div>
</div>
<ul>
<li><a href="consultas-dbf.php"> [BITACORA]</a></li>
<li><a href="datoDBF-tecnicos.php"> [TECNICOS]</a></li>
</ul>
<br>
<div id="box0">
<?php require ("conectarDBF-tecnicos.php"); ?>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>
