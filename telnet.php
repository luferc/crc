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
echo strtoupper("Conect to: 192.168.16.252");
?>
    </div>
</div>

<div id="box0">
<?php
require_once "PHPTelnet.php";

$telnet = new PHPTelnet();
$telnet->show_connect_error=0;

// if the first argument to Connect is blank,
// PHPTelnet will connect to the local host via 127.0.0.1
$result = $telnet->Connect('192.168.16.252','oper','oper');

switch ($result) {
case 0:
$telnet->DoCommand('scm 0023.ed68.2f21', $result);
//$telnet->DoCommand('scms', $result);
// NOTE: $result may contain newlines
echo $result;
echo "<br>";
$telnet->DoCommand('scm 0023.ed68.2f21 phy', $result);
//$telnet->DoCommand('scms', $result);
echo $result;
echo "<br>";
// say Disconnect(0); to break the connection without explicitly logging out
$telnet->Disconnect();
break;
case 1:
echo '[PHP Telnet] Connect failed: Unable to open network connection';
break;
case 2:
echo '[PHP Telnet] Connect failed: Unknown host';
break;
case 3:
echo '[PHP Telnet] Connect failed: Login failed';
break;
case 4:
echo '[PHP Telnet] Connect failed: Your PHP version does not support PHP Telnet';
break;
}
?> 

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>
