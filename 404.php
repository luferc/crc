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
echo strtoupper(" not found");
?>
    </div>
</div>

<body bgcolor="#fff" onLoad="Mensaje='[crcserver.com]~# cd ../solicitud/ -name \'file.php\'\n\nError 404 \'file.php\' not found in requests/';TipeodeMaquina(35);" onUnload="clearTimeout(Fin)">

<center>
<h1 style="color:#FF0000">Objeto no encontrado</h1>
<FORM NAME="form"> 
<TEXTAREA NAME="caja" COLS="40"" ROWS="10" style="background-color:#000;color:#04B404; font-size: 20px"></TEXTAREA> 
</FORM>
</center> 

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
<?php require ("footer.php"); ?>
