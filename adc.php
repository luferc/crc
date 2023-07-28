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
echo strtoupper("::Combinadora ADC/Sistema:Pto. Vallarta::");
?>
    </div>
</div>

  <div class="package-description">
    <strong>Sumario</strong> : Distribución de nodos en combinadora ADC    <br />
    <br />
    <strong>Opciones de visualización</strong>    <br />
<a  target="_blank" href="../crc/docs/Combinadora-ADC_Vallarta.pdf">  <img src="../crc/imag/info.gif" alt="Info" width="auto" height="auto"> PDF</a>
 <?php
// Muestra, p.ej., fichero.txt: 1024 bytes
    $file = "../crc/docs/Combinadora-ADC_Vallarta.pdf";
    $fsize = filesize($file);
    echo '('.($fsize) . 'bytes)';
    ?>

<?php require ("lista_ADC.php"); ?>     </div>

<div class='main-screenshot'>
    <a target="_blank" href="../crc/imag/ADC_VTA.png">
  <img src="../crc/imag/ADC_VTA.png" alt="Básico" width="450" height="500"> </a>
  </div>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>
