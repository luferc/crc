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
echo strtoupper("::detalle de racks hub vallarta::");
?>
    </div>
</div>

<div id="sfcontent">

  <div class='img'>
  <div class='desc-vs'>
  <a href="racks-PA.php">
    <img src="../crc/imag/CRC-UP.png" alt="::#::" width="250" height="300">
  </a>
  <div class="desc-vs">CRC-PLANTA ALTA</div>
  </div>
     </div>

     <div class='img'>
  <div class='desc-vs'>
  <a href="racks-PB.php">
    <img src="../crc/imag/CRC-DW.png" alt="::#::" width="250" height="300">
  </a>
  <div class="desc-vs">CRC-PLANTA BAJA</div>
  </div>
     </div>


   </div>


<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>
